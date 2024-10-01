-----------------------------------------
-- Drop old schema, tables and types
-----------------------------------------

DROP SCHEMA IF EXISTS lbaw2332 CASCADE;
CREATE SCHEMA lbaw2332;
SET search_path TO lbaw2332;

-----------------------------------------
-- Types
-----------------------------------------

CREATE TYPE ITEM_TYPE AS ENUM (
    'antiques', 'art', 'collectibles', 'electronics', 'jewelry',
    'memorabilia', 'vehicles', 'clothes', 'books', 'other'
);

CREATE TYPE AUCTION_STATUS AS ENUM (
    'active', 'completed', 'cancelled'
);

CREATE TYPE NOTIFICATION_TYPE AS ENUM (
    'bid_placed', 'outbid', 'auction_won', 'auction_ended'
);

CREATE TYPE COUNTRY_ENUM AS ENUM (
    'Afghanistan','Albania','Algeria','Andorra','Angola','Antigua and Barbuda','Argentina','Armenia','Australia','Austria',
    'Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bhutan',
    'Bolivia','Bosnia and Herzegovina','Botswana','Brazil','Brunei','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon',
    'Canada','Cape Verde (Cabo Verde)','Central African Republic','Chad','Chile','China','Colombia','Comoros','Congo, Republic of the',
    'Congo, Democratic Republic of the','Costa Rica','Côte d''Ivoire','Croatia','Cuba','Cyprus','Czech Republic','Denmark','Djibouti',
    'Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Eswatini','Ethiopia',
    'Fiji','Finland','France','Gabon','Gambia','Georgia','Germany','Ghana','Greece','Grenada',
    'Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Honduras','Hungary','Iceland','India','Indonesia',
    'Iran','Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya',
    'Kiribati','Kosovo','Kuwait','Kyrgyzstan','Laos','Latvia','Lebanon','Lesotho','Liberia','Libya',
    'Liechtenstein','Lithuania','Luxembourg','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands',
    'Mauritania','Mauritius','Mexico','Micronesia','Moldova','Monaco','Mongolia','Montenegro','Morocco','Mozambique',
    'Myanmar','Namibia','Nauru','Nepal','Netherlands','New Zealand','Nicaragua','Niger','Nigeria','North Korea',
    'North Macedonia','Norway','Oman','Pakistan','Palau','Panama','Papua New Guinea','Paraguay','Peru','Philippines',
    'Poland','Portugal','Qatar','Romania','Russia','Rwanda','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Samoa',
    'San Marino','São Tomé and Príncipe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia',
    'Solomon Islands','Somalia','South Africa','South Korea','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Sweden',
    'Switzerland','Syria','Tajikistan','Tanzania','Thailand','Timor-Leste','Togo','Tonga','Trinidad and Tobago','Tunisia',
    'Turkey','Turkmenistan','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom','United States','Uruguay','Uzbekistan',
    'Vanuatu','Vatican City','Venezuela','Vietnam','Yemen','Zambia','Zimbabwe'
);

-----------------------------------------
-- Tables
-----------------------------------------

-- USER is a reserved keyword
CREATE TABLE users (
    user_id SERIAL UNIQUE,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(128) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    is_banned BOOLEAN NOT NULL DEFAULT FALSE,
    remember_token CHAR(100),
    credit DECIMAL(10,2) DEFAULT 0.00,
    CONSTRAINT users_pk PRIMARY KEY (user_id)
);



CREATE TABLE administrator (
    admin_id INTEGER NOT NULL UNIQUE,
    CONSTRAINT administrator_users_pk FOREIGN key (admin_id) REFERENCES users (user_id)
);

CREATE TABLE address (
    address_id serial UNIQUE,
    street VARCHAR(64) NOT NULL,
    city VARCHAR(64) NOT NULL,
    zipcode INTEGER NOT NULL,
    country country_enum NOT NULL,
    CONSTRAINT address_pk PRIMARY key (address_id),
    CONSTRAINT valid_zipcode CHECK (zipcode <= 9999999)
);

CREATE TABLE faq (
    faq_id serial UNIQUE,
    question VARCHAR(500) NOT NULL,
    answer VARCHAR(500) NOT NULL,
    CONSTRAINT faq_pk PRIMARY key (faq_id)
);

CREATE TABLE bidder_seller (
    bidder_seller_id INTEGER NOT NULL UNIQUE,
    address_id INTEGER NOT NULL,
    rating FLOAT NOT NULL,
    CONSTRAINT bidder_seller_users_fk FOREIGN key (bidder_seller_id) REFERENCES users (user_id),
    CONSTRAINT bidder_seller_address_fk FOREIGN key (address_id) REFERENCES address (address_id),
    CONSTRAINT valid_rating CHECK (
        rating >= 0.0
        AND rating <= 5.0
    )
);

CREATE TABLE auction (
    auction_id serial UNIQUE,
    current_bid FLOAT NOT NULL,
    bidder_seller_id INTEGER NOT NULL,
    initial_date TIMESTAMP NOT NULL DEFAULT now(),
    final_date TIMESTAMP NOT NULL,
    initial_bid FLOAT NOT NULL,
    status auction_status NOT NULL DEFAULT 'active',
    CONSTRAINT auction_pk PRIMARY key (auction_id),
    CONSTRAINT auction_bidder_seller_fk FOREIGN key (bidder_seller_id) REFERENCES bidder_seller (bidder_seller_id),
    CONSTRAINT valid_period CHECK (initial_date <= final_date),
    CONSTRAINT valid_initial_bid CHECK (initial_bid > 0.0),
    CONSTRAINT valid_current_bid CHECK (current_bid >= initial_bid)
);

CREATE TABLE item (
    item_id serial UNIQUE,
    auction_id INTEGER NOT NULL,
    item_name VARCHAR(128) NOT NULL,
    shipping VARCHAR(64) NOT NULL,
    description VARCHAR(512) NOT NULL,
    kind item_type NOT NULL,
    CONSTRAINT item_pk PRIMARY key (item_id),
    CONSTRAINT item_auction_fk FOREIGN key (auction_id) REFERENCES auction (auction_id)
);

CREATE TABLE bid (
    bid_id serial UNIQUE,
    bidder_seller_id INTEGER NOT NULL,
    auction_id INTEGER NOT NULL,
    bidding_date TIMESTAMP NOT NULL DEFAULT now(),
    amount FLOAT NOT NULL,
    CONSTRAINT bid_pk PRIMARY key (bid_id),
    CONSTRAINT bid_bidder_seller_fk FOREIGN key (bidder_seller_id) REFERENCES bidder_seller (bidder_seller_id),
    CONSTRAINT bid_auction_fk FOREIGN key (auction_id) REFERENCES auction (auction_id),
    CONSTRAINT valid_amount CHECK (amount > 0.0)
);

CREATE TABLE payment_method (
    payment_method_id serial UNIQUE,
    bidder_seller_id INTEGER NOT NULL,
    CONSTRAINT payment_method_pk PRIMARY key (payment_method_id),
    CONSTRAINT payment_method_bidder_seller_fk FOREIGN key (bidder_seller_id) REFERENCES bidder_seller (bidder_seller_id)
);

CREATE TABLE card (
    card_id INTEGER NOT NULL UNIQUE,
    number BIGINT NOT NULL UNIQUE,
    holder_name VARCHAR(128) NOT NULL,
    exp_date DATE NOT NULL,
    cvv INTEGER NOT NULL,
    CONSTRAINT card_payment_method_fk FOREIGN key (card_id) REFERENCES payment_method (payment_method_id),
    CONSTRAINT valid_exp_date CHECK (exp_date > CURRENT_DATE),
    CONSTRAINT valid_cvv CHECK (
        cvv >= 100
        AND cvv <= 999
    )
);

CREATE TABLE paypal (
    paypal_id INTEGER NOT NULL UNIQUE,
    email VARCHAR(128) NOT NULL UNIQUE,
    CONSTRAINT paypal_payment_method_fk FOREIGN key (paypal_id) REFERENCES payment_method (payment_method_id)
);

CREATE TABLE transfer (
    transfer_id INTEGER NOT NULL,
    reference INTEGER NOT NULL,
    entity INTEGER NOT NULL,
    amount INTEGER NOT NULL,
    CONSTRAINT transfer_payment_method_fk FOREIGN key (transfer_id) REFERENCES payment_method (payment_method_id),
    CONSTRAINT vaild_amount CHECK (amount > 0.0)
);

CREATE TABLE comment (
    comment_id serial UNIQUE,
    bidder_seller_id INTEGER NOT NULL,
    auction_id INTEGER NOT NULL,
    comment_date TIMESTAMP NOT NULL DEFAULT now(),
    contents VARCHAR(500) NOT NULL,
    CONSTRAINT comment_pk PRIMARY key (comment_id),
    CONSTRAINT comment_auction_fk FOREIGN key (auction_id) REFERENCES auction (auction_id),
    CONSTRAINT comment_bidder_seller_fk FOREIGN key (bidder_seller_id) REFERENCES bidder_seller (bidder_seller_id)
);

CREATE TABLE notification (
    notification_id serial UNIQUE,
    bidder_seller_id INTEGER NOT NULL,
    contents VARCHAR(64) NOT NULL,
    sent_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    seen BOOLEAN NOT NULL DEFAULT FALSE,
    kind notification_type NOT NULL,
    CONSTRAINT notification_pk PRIMARY key (notification_id),
    CONSTRAINT notification_bidder_seller_fk FOREIGN key (bidder_seller_id) REFERENCES bidder_seller (bidder_seller_id)
);

CREATE TABLE message (
    message_id serial UNIQUE,
    sender_id INTEGER NOT NULL,
    receiver_id INTEGER NOT NULL,
    sent_date TIMESTAMP NOT NULL DEFAULT now(),
    contents VARCHAR(255) NOT NULL,
    seen BOOLEAN NOT NULL DEFAULT FALSE,
    CONSTRAINT message_pk PRIMARY key (message_id),
    CONSTRAINT sender_fk FOREIGN key (sender_id) REFERENCES users (user_id),
    CONSTRAINT receiver_fk FOREIGN key (receiver_id) REFERENCES users (user_id),
    CONSTRAINT valid_receiver CHECK (sender_id != receiver_id)
);

-----------------------------------------
-- Indexes
-----------------------------------------

CREATE INDEX new_unread_notifications ON notification USING btree (seen ASC, sent_date DESC);
CLUSTER notification USING new_unread_notifications;

CREATE INDEX username_user ON users USING hash (username);

CREATE INDEX email_user ON users USING hash (email);

-----------------------------------------
-- FTS Indexes
-----------------------------------------

ALTER TABLE item
ADD COLUMN tsvectors TSVECTOR;

CREATE FUNCTION item_search_update() RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT'
    THEN
        NEW.tsvectors = (
            SETWEIGHT(TO_TSVECTOR('english', NEW.item_name), 'A') ||
            SETWEIGHT(TO_TSVECTOR('english', NEW.description), 'B')
        );
    END IF;
    IF TG_OP = 'UPDATE'
    THEN
        IF (OLD.item_name != NEW.item_name OR OLD.item_name != NEW.item_name)
        THEN
            NEW.tsvectors = (
                SETWEIGHT(TO_TSVECTOR('english', NEW.item_name), 'A') ||
                SETWEIGHT(TO_TSVECTOR('english', NEW.description), 'B')
        );
        END IF;
    END IF;
    RETURN NEW;
END $$
LANGUAGE plpgsql;

CREATE TRIGGER item_search_update
    BEFORE INSERT OR UPDATE ON item
    FOR EACH ROW
    EXECUTE PROCEDURE item_search_update();

CREATE INDEX search_item ON item USINg GIN (tsvectors);

-----------------------------------------
-- Triggers
-----------------------------------------

-- TRIGGER01
-- To ensure that users cannot place bids on an auction after it has ended (Business Rule BR09).
CREATE FUNCTION prevent_bidding_after_auction_end() RETURNS TRIGGER AS $BODY$
BEGIN
    IF (SELECT final_date FROM auction WHERE auction_id = NEW.auction_id) <= NEW.bidding_date
    THEN RAISE EXCEPTION 'Bidding is not allowed on a completed auction.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER prevent_bidding_after_auction_end
    BEFORE INSERT ON bid
    FOR EACH ROW
    EXECUTE PROCEDURE prevent_bidding_after_auction_end();

-- TRIGGER02
-- To prevent users from bidding on their auctions (Business Rule BR02).
CREATE FUNCTION prevent_self_bidding() RETURNS TRIGGER AS $BODY$
BEGIN
    IF EXISTS (
        SELECT bidder_seller_id
        FROM auction
        WHERE auction_id = NEW.auction_id AND bidder_seller_id = NEW.bidder_seller_id
    )
    THEN RAISE EXCEPTION 'Users cannot bid on their own auctions.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER prevent_self_bidding
    BEFORE INSERT ON bid
    FOR EACH ROW
    EXECUTE PROCEDURE prevent_self_bidding();

-- TRIGGER03
-- To prevent users from editing or deleting auctions that are currently active (Business Rule BR21).
CREATE FUNCTION prevent_editing_active_auctions() RETURNS TRIGGER AS $BODY$
BEGIN
    IF 
        OLD.status = 'active' AND (
            OLD.bidder_seller_id != NEW.bidder_seller_id OR
            OLD.initial_date != NEW.initial_date OR
            OLD.initial_bid != NEW.initial_bid
        )
    THEN RAISE EXCEPTION 'Editing or deleting an active auction is forbidden.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER prevent_editing_active_auctions
    BEFORE UPDATE OR DELETE ON auction
    FOR EACH ROW
    EXECUTE PROCEDURE prevent_editing_active_auctions();

-- TRIGGER04
-- To automatically extend the end time of auctions when a bid is placed near the original end time (Business Rule BR22).
CREATE FUNCTION auto_extend_auctions_near_end_time() RETURNS TRIGGER AS $BODY$
BEGIN
    IF (SELECT final_date FROM auction WHERE auction_id = NEW.auction_id) - NOW() <= INTERVAL '15 minutes'
    THEN
        UPDATE auction
        SET final_date = final_date + INTERVAL '30 minutes'
        WHERE auction_id = NEW.auction_id;
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER auto_extend_auctions_near_end_time
    BEFORE INSERT ON bid
    FOR EACH ROW
    EXECUTE PROCEDURE auto_extend_auctions_near_end_time();

-- TRIGGER05
-- To prevent cancelling auctions with bids (Business Rule BR23).
CREATE FUNCTION prevent_cancelling_auctions_with_bids() RETURNS TRIGGER AS $BODY$
BEGIN
    IF
        OLD.status = 'active' AND
        NEW.status = 'cancelled' AND
        EXISTS (SELECT * FROM bid WHERE auction_id = bid.auction_id)
    THEN RAISE EXCEPTION 'Cannot cancel auction unless there are no bids.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER prevent_cancelling_auctions_with_bids
    BEFORE UPDATE ON auction
    FOR EACH ROW
    EXECUTE PROCEDURE prevent_cancelling_auctions_with_bids();