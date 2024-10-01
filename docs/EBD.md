# EBD: Database Specification Component

* **Project vision:**

The primary objective of this project is to facilitate interactions between buyers and sellers, providing a platform for auctions and bidding on various products. Users can create product listings for auction, place bids, or comment on listings from other users and establish connections through virtual friendships.

In summary, DibsOnBids aims to promote interaction and information exchange between buyers and sellers, enabling auctions, bidding, and discussions in a friendly and connected environment.

## A4: Conceptual Data Model

This section encompasses the depiction of the entities and connections within the DibsOnBids project and its database specification.

### 4.1 Class diagram

The UML diagram in Figure 1 illustrates the primary organizational entities, their interconnections, attributes and their respective domains, as well as the multiplicity of relationships for the DibsOnBids website.

![image](uploads/5adbb1fe84c8bdb0f15754738695cb07/image.png)

Figure 1: DibsOnBids conceptual data model in UML

### 4.2 Additional Business Rules

Further business rules or limitations that cannot be represented within the UML class diagram of the DibsOnBids system.

| **Identifier** | **Description** |
| -------------- | --------------- |
| BR06 | Bidders must be registered users to participate in auctions. |
| BR07 | Auction listings must include a clear product description, starting price, and minimum bid increment. |
| BR08 | Each auction listing must have a defined end time. |
| BR09 | Bids can only be placed during the active phase of an auction. |
| BR10 | The highest valid bid at the end of the auction wins the item. |
| BR11 | Auction winners are obligated to complete the purchase and make payment. |
| BR12 | Auction winners have a specified timeframe to make payment for their winning item. |
| BR13 | The auction site must provide a secure payment gateway for transactions. |
| BR14 | Users can report suspicious or fraudulent activity related to auctions. |
| BR15 | Auction listings can be removed by administrators if they violate site policies. |
| BR16 | Users must agree to the terms and conditions of the auction site when registering. |
| BR17 | Auction site administrators can suspend or ban users for violations of site rules. |
| BR18 | The auction site must maintain a history of past auctions, bids, and transaction records. |
| BR19 | Auction participants must have the ability to view the bidding history of an auction. |
| BR20 | Reserve prices can be set by sellers, and auctions with reserve prices will only be successful if the reserve is met. |
| BR21 | Auctions cannot be edited or deleted while they're active. |
| BR22 | If a bid is made within 15 minutes of the scheduled end of the auction, the latter is extended by 30 minutes. |
| BR23 | Auctions can only be cancelled if no bids have been made on it. |

Table 1: Additional Business Rules

## A5: Relational Schema, validation and schema refinement

This section outlines the relational schema derived from the analysis of the conceptual data model for the DibsOnBids website. It presents each relational schema, including attributes, domains, primary keys, foreign keys, and other essential integrity rules such as unique, default, not null, and check constraints.

### 5.1 Relational Schema

| Relation reference | Relation Compact Notation |
|--------------------|---------------------------|
| R01 | user(<ins>user_id</ins> **PK**, <ins>username</ins> **NN UK**, <ins>email</ins> **NN UK**, password_hash **NN**, is_banned **NN DF** false) |
| R02 | administrator(<ins>admin_id</ins> → user **PK**) |
| R03 | bidder_seller(<ins>bidder_seller_id</ins> → user **PK**, <ins>address_id</ins> → address **PK**, rate **NN CK** rate >= 0 AND rate <= 5) |
| R04 | notification(<ins>notification_id</ins> **PK**, <ins>bidder_seller_id</ins> → bidder_seller **PK**, contents **NN**, sent_date **NN DF** NOW(), seen **NN DF** false, kind **NN**) |
| R05 | address(<ins>address_id</ins> → bidder_seller **PK**, street **NN**, city **NN**, zip_code **NN CK** LENGTH(zip_code) <= 9999999, country **NN**) |
| R06 | payment_method(<ins>payment_method_id</ins> **PK**, <ins>bidder_seller_id</ins> → bidder_seller **PK**) |
| R07 | transfer(<ins>transfer_id</ins> → payment_method **PK**, ref **NN**, entity **NN**, amount **NN CK** amount > 0.0) |
| R08 | paypal(<ins>paypal_id</ins> → payment_method **PK**, email **NN**) |
| R09 | card(<ins>card_id</ins> → payment_method **PK**, number **NN UK**, holder_name **NN**, exp_date **NN CK** exp_date > CURRENT_DATE, cvv **NN CK** 100 <= cvv AND cvv <= 999) |
| R10 | auction(<ins>auction_id</ins> **PK**, <ins>bidder_seller_id</ins> → bidder_seller **PK**, initial_bid **NN CK** initial_price > 0.0, initial_date **NN**, final_date **NN CK** final_date > initial_date, current_bid **NN CK** current_bid > 0.0 AND current_bid >= initial_bid, status **NN**) |
| R11 | bid(<ins>bid_id</ins> **PK**, <ins>bidder_seller_id</ins> → bidder_seller **PK**, <ins>auction_id</ins> → auction **NN UK**, bidding_date **NN DF** NOW(), amount **NN CK** amount > 0.0) |
| R12 | item(<ins>bid_id</ins> **PK**, <ins>auction_id</ins> → auction **PK**, item_name **NN**, shipping **NN**, description **NN**, kind **NN**) |
| R13 | comment(<ins>comment_id</ins> **PK**, <ins>user_id</ins> → bidder_seller **PK**, <ins>auction_id</ins> → auction **PK**, comment_date **NN DF** NOW(), contents **NN CK** LENGTH(text) <= 500) |
| R14 | faq(<ins>faq_id</ins> **PK**, question **NN CK** LENGTH(question) <= 500, answer **NN CK** LENGTH(answer) <= 500) |
| R15 | messages(<ins>message_id</ins> **PK**, <ins>sender_id</ins> → user **PK**, <ins>receiver_id</ins> → user **PK CK** sender_id != receiver_id, sent_date **NN DF** NOW(), SEEN **NN DF** false) |

Legend:

- UK = UNIQUE;
- NN = NOT NULL;
- DF = DEFAULT;
- CK = CHECK;

### 5.2 Domains

| Domain Name | Domain Specification |
|-------------|----------------------|
| **country_enum** | Full list [here](#annex-a-sql-code). |
| **item_type** | `ENUM ('antiques', 'art', 'collectibles', 'electronics', 'jewelry', 'memorabilia', 'vehicles', 'clothes', 'books', 'other')` |
| **auction_status** | `ENUM ('active', 'completed', 'cancelled')` |
| **notification_type** | `ENUM ('bid_placed', 'outbid', 'auction_won', 'auction_ended')` |

### 5.3 Schema validation

| TABLE NAME | Keys | Functional Dependencies | Normal Form |
|------------|------|-------------------------|-------------|
| Item (R01) | {item_id, auction_id} | {item_id, auction_id} → {item_name, shipping, description, kind} | BCNF |
| User (R02) | {user_id} | {user_id} → {username, email, password_hash, is_banned} | BCNF |
| Bid (R03) | {bid_id, bidder_seller_id, auction_id} | {bid_id, bidder_seller_id, auction_id} → {bidding_date, amount} | BCNF |
| Bidder/Seller (R04) | {bidder_seller_id, address_id} | {bidder_seller_id, address_id} → {rating} | BCNF |
| Auction (R05) | {auction_id, bidder_seller_id} | {auction_id, bidder_seller_id} → {current_bid, initial_date, final_date, initial_bid, status} | BCNF |
| Administrator (R07) | {admin_id} | *none* | BCNF |
| Address (R08) | {address_id} | {address_id} → {street, city, zipcode, country} | BCNF |
| FAQ (R09) | {faq_id} | {faq_id} → {question, answer} | BCNF |
| Payment Method (R10) | {payment_method_id, bidder_seller_id} | *none* | BCNF |
| Card (R11) | {card_id} | {card_id} → {number, holder_name, exp_date, cvv} | BCNF |
| Paypal (R12) | {paypal_id} | {paypal_id} → {email} | BCNF |
| Transfer (R13) | {transfer_id} | {transfer_id} → {reference, entity, amount} | BCNF |
| Comment (R14) | {comment_id, auction_id, bidder_seller_id} | {comment_id, auction_id, bidder_seller_id} → {comment_date, contents} | BCNF |
| Notification (R15) | {notification_id, bidder_seller_id} | {notification_id, bidder_seller_id} → {contents, sent_date, seen, kind} | BCNF |
| Message (R16) | {message_id, sender_id, receiver_id} | {message_id, sender_id, receiver_id} → {sent_date, contents, seen} | BCNF |

## A6: Database Workload, Indexes, Triggers, Transactions, and Database Population

The A6 artifact encompasses the PostgreSQL SQL code, encompassing the physical schema of the database and its population. It encompasses the enforcement of data integrity rules through triggers, identification, and characterization of indexes, and the definition of user-defined database functions.

Moreover, it provides insights into the necessary transactions for ensuring data correctness following accesses and/or modifications to the database. Additionally, it includes an explanation of the required isolation levels.

### 6.1 Database Workload

In order to develop a database with good design, it is essential to comprehend the growth of a table and how many times it will be accessed. The table below shows said predictions for the "DibsOnBids" auction website:

| Identifier | Relation Name | Order of Magnitude | Estimated Growth |
|------------|---------------|--------------------|------------------|
| RS01 | users | 10k | 10 |
| RS02 | auctions | 1k | 100 |
| RS03 | items | 10k | 1k |
| RS04 | bids | 100k | 10k |
| RS05 | sellers | 1k | 100 |
| RS06 | winners | 10k | 1k |
| RS07 | payment_transactions | 1k | 100 |
| RS08 | bids_history | 10k | 1k |
| RS09 | feedback | 1k | 100 |
| RS10 | messages | 100k | 10k |
| RS11 | notifications | 100k | 10k |
| RS12 | categories | 1k | 100 |
| RS13 | reports | 10 | 10 |
| RS14 | ratings | 10k | 1k |

Table 35: DibsOnBids Workload

## 6.2 Utilized Indexes

Indexes play a pivotal role in enhancing database performance by expediting the process of locating and retrieving specific rows. Notably, when a column involved in a join condition is indexed, it can markedly accelerate queries that involve joins. Furthermore, indexes can also prove beneficial for speeding up queries with search conditions within UPDATE and DELETE commands.

### 6.2.1 Performance indexes

Indexes are utilized to lower SELECT querying time. There are various types, each with their own advantages and drawbacks, so each one was pondered taking into account the relative frequency of each type of query that could be done on each table.

The following tables illustrate the performance indexes used:

#### Seen/Sent Date Notification Index (IDX01)

| Index | IDX01 |
|------ | ----- |
| Index Relation | notification |
| Index Attribute(s) | seen, sent_date |
| Index Type | B-tree |
| Cardinality | Low |
| Clustering | Yes |
| Justification | The 'notification table' will surely be quite large, given user activity. The table will be queried fairly frequently and will scale linearly with site usage. Since there will only ever be insertions and not modifications to columns, and that the cardinality is low, we want to optimize for search speed, so a clustered B-tree index is perfect for this situation, as we will want the most recent and unread notifications on each query. |
| SQL Code | `CREATE INDEX new_unread_notifications ON notification USING btree (seen ASC, sent_date DESC);`<br>`CLUSTER notification USING new_unread_notifications;` |

#### Username Index (IDX02)

| Index | IDX02 |
|------ | ----- |
| Index Relation | user |
| Index Attribute | username |
| Index Type | Hash |
| Cardinality | High |
| Clustering | No |
| Justification | Administrators will need to do look for users on a semi-regular basis. This will be done by exact match on either username or email. Since update frequency is low and there is a high cardinality, hash is the adequate type for this index. |
| SQL Code | `CREATE INDEX username_user ON users USING hash (username);` |

#### Email Index (IDX03)

| Index | IDX03 |
|------ | ----- |
| Index Relation | user |
| Index Attribute | email |
| Index Type | Hash |
| Cardinality | High |
| Clustering | No |
| Justification | Administrators will need to do look for users on a semi-regular basis. This will be done by exact match on either username or email. Since update frequency is low and there is a high cardinality, hash is the adequate type for this index. |
| SQL Code | `CREATE INDEX email_user ON users USING hash (email);` |

### 6.2.2 Full-text Search Indices

As required by the project’s specifications, indexes for full-text search must be developed. Hence, to improve text search time, we created Full-Text Search (FTS) indexes on the tables and attributes we thought would be queried the most. Those indexes can be found in the following tables:

#### Item FTS Index (IDX04)

- **Index Relation**: item
- **Index Attributes**: item_name, description
- **Index Type**: GIN
- **Clustering**: No
- **Justification**: We want to provide full text search features for item lookup, and as such, we're providing the following index. We're using GIN giventhe presence of multiple component values.

```sql
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

CREATE INDEX search_item ON item USING GIN (tsvectors);
```

## 6.3 Triggers

To enforce integrity rules that cannot be achieved in a simpler way, the necessary triggers are identified and described by presenting the event, the condition, and the activation code. Triggers are also used to keep the auction data consistent.

### TRIGGER01: Prevent Bidding After Auction End

**Description**:
- To ensure that users cannot place bids on an auction after it has ended (Business Rule BR09).

```sql
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
```

### TRIGGER02: Prevent Users From Bidding on Their Own Auctions

**Description**:
- To prevent users from bidding on their auctions (Business Rule BR02).

```sql
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
```

### TRIGGER03: Prevent Active Auction Editing/Deletion

**Description**:
- To prevent users from editing or deleting auctions that are currently active (Business Rule BR21).

```sql
CREATE FUNCTION prevent_editing_active_auctions() RETURNS TRIGGER AS $BODY$
BEGIN
    IF 
        OLD.status = 'active' AND (
            OLD.bidder_seller_id != NEW.seller_id OR
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
```

### TRIGGER04: Auto Extend Auctions Near End Time

**Description**:
- To automatically extend the end time of auctions when a bid is placed near the original end time (Business Rule BR22).

```sql
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
```

### TRIGGER05: Prevent Cancelling Auctions With Bids

**Description**:
- To prevent cancelling auctions with bids (Business Rule BR23).

```sql
CREATE FUNCTION prevent_cancelling_auctions_with_bids() RETURNS TRIGGER AS $BODY$
BEGIN
    IF
        OLD.status = 'open' AND
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
```

## 6.4. Transactions

The following transactions are employed to ensure data integrity when performing multiple operations.

Table 1: Create Auction Transaction

<table>
  <tr>
   <td><strong>Transaction</strong></td>
   <td>TRAN1</td>
  </tr>
  <tr>
   <td><strong>Description</strong></td>
   <td>Create Auction</td>
  </tr>
  <tr>
   <td><strong>Justification</strong></td>
   <td>The isolation level is Repeatable Read, to prevent concurrent transactions from modifying auction data inconsistently.</td>
  </tr>
  <tr>
   <td><strong>Isolation level</strong></td>
   <td>REPEATABLE READ</td>
  </tr>
  <tr>
   <td colspan="2">

  ```php
  DB::beginTransaction();
  
  Auction::create([
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'start_time' => $request->input('start_time'),
      'end_time' => $request->input('end_time'),
      'minimum_bid' => $request->input('minimum_bid'),
      'seller_id' => Auth::user()->id,
  ]);
  
  DB::commit();
  ```
  </td>
  </tr>
</table>


Table 2: Place Bid Transaction

<table>
  <tr>
   <td><strong>Transaction</strong></td>
   <td>TRAN2</td>
  </tr>
  <tr>
   <td><strong>Description</strong></td>
   <td>Place Bid</td>
  </tr>
  <tr>
   <td><strong>Justification</strong></td>
   <td>The isolation level is Repeatable Read, to prevent concurrent transactions from modifying bid data inconsistently.</td>
  </tr>
  <tr>
   <td><strong>Isolation level</strong></td>
   <td>REPEATABLE READ</td>
  </tr>
  <tr>
   <td colspan="2">

  ```php
  DB::beginTransaction();
  
  Bid::create([
      'auction_id' => $auction->id,
      'bid_amount' => $request->input('bid_amount'),
      'bidder_id' => Auth::user()->id,
  ]);
  
  DB::commit();
  ```
  </td>
  </tr>
</table>


Table 3: Close Auction Transaction

<table>
  <tr>
   <td><strong>Transaction</strong></td>
   <td>TRAN3</td>
  </tr>
  <tr>
   <td><strong>Description</strong></td>
   <td>Close Auction</td>
  </tr>
  <tr>
   <td><strong>Justification</strong></td>
   <td>The isolation level is Repeatable Read, to prevent concurrent transactions from modifying auction and bid data inconsistently.</td>
  </tr>
  <tr>
   <td><strong>Isolation level</strong></td>
   <td>REPEATABLE READ</td>
  </tr>
  <tr>
   <td colspan="2">

  ```php
  DB::beginTransaction();
  
  $auction->final = now();
  $auction->save();
  
  $winning_bid = $auction->bids->max('bid_amount');
  $winning_bidder = $auction->bids->where('bid_amount', $winning_bid)->first();
  
  // Notify the winning bidder
  Notification::create([
      'user_id' => $winning_bidder->bidder_id,
      'message' => 'Congratulations! You won the auction for ' . $auction->title,
  ]);
  
  DB::commit();
  ```
  </td>
  </tr>
</table>


Table 4: Cancel Auction Transaction

<table>
  <tr>
   <td><strong>Transaction</strong></td>
   <td>TRAN4</td>
  </tr>
  <tr>
   <td><strong>Description</strong></td>
   <td>Cancel Auction</td>
  </tr>
  <tr>
   <td><strong>Justification</strong></td>
   <td>The isolation level is Repeatable Read, to prevent concurrent transactions from modifying auction and bid data inconsistently.</td>
  </tr>
  <tr>
   <td><strong>Isolation level</strong></td>
   <td>REPEATABLE READ</td>
  </tr>
  <tr>
   <td colspan="2">

   ```php
  DB::beginTransaction();
  
  $auction->delete();
  
  // Notify all bidders that the auction has been canceled
  foreach ($auction->bids as $bid) {
      Notification::create([
          'user_id' => $bid->bidder_id,
          'message' => 'The auction for ' . $auction->title . ' has been canceled.',
      ]);
  }
  
  DB::commit();
  ```

  </td>
  </tr>
</table>


Table 5: Leave feedback Transaction

<table>
  <tr>
   <td><strong>Transaction</strong></td>
   <td>TRAN5</td>
  </tr>
  <tr>
   <td><strong>Description</strong></td>
   <td>Leave Feedback</td>
  </tr>
  <tr>
   <td><strong>Justification</strong></td>
   <td>The isolation level is Repeatable Read, to prevent concurrent transactions from modifying feedback data inconsistently.</td>
  </tr>
  <tr>
   <td><strong>Isolation level</strong></td>
   <td>REPEATABLE READ</td>
  </tr>
  <tr>
   <td colspan="2">
   
   ```php
  DB::beginTransaction();
  
  Feedback::create([
      'user_id' => $auction->seller_id,
      'feedback_text' => $request->input('feedback_text'),
      'rating' => $request->input('rating'),
  ]);
  
  DB::commit();
   ```
  </td>
  </tr>
</table>


Table 6: Add Auction to WatchList

<table>
  <tr>
   <td><strong>Transaction</strong></td>
   <td>TRAN6</td>
  </tr>
  <tr>
   <td><strong>Description</strong></td>
   <td>Add Auction to Watchlist</td>
  </tr>
  <tr>
   <td><strong>Justification</strong></td>
   <td>The isolation level is Repeatable Read to ensure that adding auctions to the watchlist does not conflict with concurrent transactions and maintains data consistency.</td>
  </tr>
  <tr>
   <td><strong>Isolation level</strong></td>
   <td>REPEATABLE READ</td>
  </tr>
  <tr>
   <td colspan="2">
      
  ```php
  DB::beginTransaction();
  
  Watchlist::create([
      'auction_id' => $auction->id,
      'user_id' => Auth::user()->id,
  ]);
  
  DB::commit();
  ```
  </td>
  </tr>
</table>


## 6.5 SQL

### 6.5.1 Database Schema

The schema for the DibsOnBids Database is provided in the annexes and is also available in the [main code repository](https://git.fe.up.pt./lbaw/lbaw2324/lbaw2332/-/blob/main/create.sql).

### 6.5.2 Database Population

The population for the DibsOnBids Database is provided in the annexes and is also available in the [main code repository](https://git.fe.up.pt./lbaw/lbaw2324/lbaw2332/-/blob/main/populate.sql).

---

## Annnexes

### A.1. Database creation ([create.sql](https://git.fe.up.pt./lbaw/lbaw2324/lbaw2332/-/blob/main/create.sql))

```sql
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
CREATE TABLE USERS (
    USER_ID SERIAL UNIQUE,
    USERNAME VARCHAR(20) NOT NULL UNIQUE,
    EMAIL VARCHAR(128) NOT NULL UNIQUE,
    PASSWORD_HASH TEXT NOT NULL,
    IS_BANNED BOOLEAN NOT NULL DEFAULT FALSE,
    CONSTRAINT USERS_PK PRIMARY KEY (USER_ID)
);

CREATE TABLE ADMINISTRATOR (
    ADMIN_ID INTEGER NOT NULL UNIQUE,
    CONSTRAINT ADMINISTRATOR_USERS_PK FOREIGN KEY (ADMIN_ID) REFERENCES USERS (USER_ID)
);

CREATE TABLE ADDRESS (
    ADDRESS_ID SERIAL UNIQUE,
    STREET VARCHAR(64) NOT NULL,
    CITY VARCHAR(64) NOT NULL,
    ZIPCODE INTEGER NOT NULL,
    COUNTRY COUNTRY_ENUM NOT NULL,
    CONSTRAINT ADDRESS_PK PRIMARY KEY (ADDRESS_ID),
    CONSTRAINT VALID_ZIPCODE CHECK (ZIPCODE <= 9999999)
);

CREATE TABLE FAQ (
    FAQ_ID SERIAL UNIQUE,
    QUESTION VARCHAR(500) NOT NULL,
    ANSWER VARCHAR(500) NOT NULL,
    CONSTRAINT FAQ_PK PRIMARY KEY (FAQ_ID)
);

CREATE TABLE BIDDER_SELLER (
    BIDDER_SELLER_ID INTEGER NOT NULL UNIQUE,
    ADDRESS_ID INTEGER NOT NULL,
    RATING FLOAT NOT NULL,
    CONSTRAINT BIDDER_SELLER_USERS_FK FOREIGN KEY (BIDDER_SELLER_ID) REFERENCES USERS (USER_ID),
    CONSTRAINT BIDDER_SELLER_ADDRESS_FK FOREIGN KEY (ADDRESS_ID) REFERENCES ADDRESS (ADDRESS_ID),
    CONSTRAINT VALID_RATING CHECK (RATING >= 0.0 AND RATING <= 5.0)
);

CREATE TABLE AUCTION (
    AUCTION_ID SERIAL UNIQUE,
    CURRENT_BID FLOAT NOT NULL,
    BIDDER_SELLER_ID INTEGER NOT NULL,
    INITIAL_DATE TIMESTAMP NOT NULL DEFAULT NOW(),
    FINAL_DATE TIMESTAMP NOT NULL,
    INITIAL_BID FLOAT NOT NULL,
    STATUS AUCTION_STATUS NOT NULL DEFAULT 'active',
    CONSTRAINT AUCTION_PK PRIMARY KEY (AUCTION_ID),
    CONSTRAINT AUCTION_BIDDER_SELLER_FK FOREIGN KEY (BIDDER_SELLER_ID) REFERENCES BIDDER_SELLER (BIDDER_SELLER_ID),
    CONSTRAINT VALID_INITIAL_DATE CHECK (INITIAL_DATE >= NOW()),
    CONSTRAINT VALID_PERIOD CHECK (INITIAL_DATE <= FINAL_DATE),
    CONSTRAINT VALID_INITIAL_BID CHECK (INITIAL_BID > 0.0),
    CONSTRAINT VALID_CURRENT_BID CHECK (CURRENT_BID >= INITIAL_BID)
);

CREATE TABLE ITEM (
    ITEM_ID SERIAL UNIQUE,
    AUCTION_ID INTEGER NOT NULL,
    ITEM_NAME VARCHAR(128) NOT NULL,
    SHIPPING VARCHAR(64) NOT NULL,
    DESCRIPTION VARCHAR(512) NOT NULL,
    KIND ITEM_TYPE NOT NULL,
    CONSTRAINT ITEM_PK PRIMARY KEY (ITEM_ID),
    CONSTRAINT ITEM_AUCTION_FK FOREIGN KEY (AUCTION_ID) REFERENCES AUCTION (AUCTION_ID)
);

CREATE TABLE BID (
    BID_ID SERIAL UNIQUE,
    BIDDER_SELLER_ID INTEGER NOT NULL,
    AUCTION_ID INTEGER NOT NULL,
    BIDDING_DATE TIMESTAMP NOT NULL DEFAULT NOW(),
    AMOUNT FLOAT NOT NULL,
    CONSTRAINT BID_PK PRIMARY KEY (BID_ID),
    CONSTRAINT BID_BIDDER_SELLER_FK FOREIGN KEY (BIDDER_SELLER_ID) REFERENCES BIDDER_SELLER (BIDDER_SELLER_ID),
    CONSTRAINT BID_AUCTION_FK FOREIGN KEY (AUCTION_ID) REFERENCES AUCTION (AUCTION_ID),
    CONSTRAINT VALID_AMOUNT CHECK (AMOUNT > 0.0)
);

CREATE TABLE PAYMENT_METHOD (
    PAYMENT_METHOD_ID SERIAL UNIQUE,
    BIDDER_SELLER_ID INTEGER NOT NULL,
    CONSTRAINT PAYMENT_METHOD_PK PRIMARY KEY (PAYMENT_METHOD_ID),
    CONSTRAINT PAYMENT_METHOD_BIDDER_SELLER_FK FOREIGN KEY (BIDDER_SELLER_ID) REFERENCES BIDDER_SELLER (BIDDER_SELLER_ID)
);

CREATE TABLE CARD (
    CARD_ID INTEGER NOT NULL UNIQUE,
    NUMBER BIGINT NOT NULL UNIQUE,
    HOLDER_NAME VARCHAR(128) NOT NULL,
    EXP_DATE DATE NOT NULL,
    CVV INTEGER NOT NULL,
    CONSTRAINT CARD_PAYMENT_METHOD_FK FOREIGN KEY (CARD_ID) REFERENCES PAYMENT_METHOD (PAYMENT_METHOD_ID),
    CONSTRAINT VALID_EXP_DATE CHECK (EXP_DATE > CURRENT_DATE),
    CONSTRAINT VALID_CVV CHECK (CVV >= 100 AND CVV <= 999)
);

CREATE TABLE PAYPAL (
    PAYPAL_ID INTEGER NOT NULL UNIQUE,
    EMAIL VARCHAR(128) NOT NULL UNIQUE,
    CONSTRAINT PAYPAL_PAYMENT_METHOD_FK FOREIGN KEY (PAYPAL_ID) REFERENCES PAYMENT_METHOD (PAYMENT_METHOD_ID)
);

CREATE TABLE TRANSFER (
    TRANSFER_ID INTEGER NOT NULL,
    REFERENCE INTEGER NOT NULL,
    ENTITY INTEGER NOT NULL,
    AMOUNT INTEGER NOT NULL,
    CONSTRAINT TRANSFER_PAYMENT_METHOD_FK FOREIGN KEY (TRANSFER_ID) REFERENCES PAYMENT_METHOD (PAYMENT_METHOD_ID),
    CONSTRAINT VAILD_AMOUNT CHECK (AMOUNT > 0.0)
);

CREATE TABLE COMMENT (
    COMMENT_ID SERIAL UNIQUE,
    BIDDER_SELLER_ID INTEGER NOT NULL,
    AUCTION_ID INTEGER NOT NULL,
    COMMENT_DATE TIMESTAMP NOT NULL DEFAULT NOW(),
    CONTENTS VARCHAR(500) NOT NULL,
    CONSTRAINT COMMENT_PK PRIMARY KEY (COMMENT_ID),
    CONSTRAINT COMMENT_AUCTION_FK FOREIGN KEY (AUCTION_ID) REFERENCES AUCTION (AUCTION_ID),
    CONSTRAINT COMMENT_BIDDER_SELLER_FK FOREIGN KEY (BIDDER_SELLER_ID) REFERENCES BIDDER_SELLER (BIDDER_SELLER_ID),
    CONSTRAINT VALID_DATE CHECK (COMMENT_DATE >= NOW())
);

CREATE TABLE NOTIFICATION (
    NOTIFICATION_ID SERIAL UNIQUE,
    BIDDER_SELLER_ID INTEGER NOT NULL,
    CONTENTS VARCHAR(64) NOT NULL,
    SENT_DATE TIMESTAMP NOT NULL DEFAULT NOW(),
    SEEN BOOLEAN NOT NULL DEFAULT FALSE,
    KIND NOTIFICATION_TYPE NOT NULL,
    CONSTRAINT NOTIFICATION_PK PRIMARY KEY (NOTIFICATION_ID),
    CONSTRAINT NOTIFICATION_BIDDER_SELLER_FK FOREIGN KEY (BIDDER_SELLER_ID) REFERENCES BIDDER_SELLER (BIDDER_SELLER_ID)
);

CREATE TABLE MESSAGE (
    MESSAGE_ID SERIAL UNIQUE,
    SENDER_ID INTEGER NOT NULL,
    RECEIVER_ID INTEGER NOT NULL,
    SENT_DATE TIMESTAMP NOT NULL DEFAULT NOW(),
    CONTENTS VARCHAR(255) NOT NULL,
    SEEN BOOLEAN NOT NULL DEFAULT FALSE,
    CONSTRAINT MESSAGE_PK PRIMARY KEY (MESSAGE_ID),
    CONSTRAINT SENDER_FK FOREIGN KEY (SENDER_ID) REFERENCES USERS (USER_ID),
    CONSTRAINT RECEIVER_FK FOREIGN KEY (RECEIVER_ID) REFERENCES USERS (USER_ID),
    CONSTRAINT VALID_RECEIVER CHECK (SENDER_ID != RECEIVER_ID)
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
            OLD.bidder_seller_id != NEW.seller_id OR
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
        OLD.status = 'open' AND
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
```


### A.2. Database population ([populate.sql](https://git.fe.up.pt./lbaw/lbaw2324/lbaw2332/-/blob/main/populate.sql))

```sql
-----------------------------------------
-- Users
-----------------------------------------

INSERT INTO users (username, password_hash, email)
VALUES ('auctioneer1', '7d8a6fbc6b7a33be8e2cb4363bf1f4b43f166798', 'auctioneer1@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('bidder2', '639e2ae94d51b7ddbea108f1200f8277e15fd5b9', 'bidder2@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('auctionguru3', '8481b0f99493bd6fe1646fb21c402a3720847d20', 'auctionguru3@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('biddingpro4', 'aa313dac5a3f5d92dbb8338316d85e16a80809a2', 'biddingpro4@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('artlover5', 'd71e50176c3343e107cf1022d698e2bf9c7da8bd', 'artlover5@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('collectibles6', 'f18acef9ac04a2df190f8549d1d0f505732295d5', 'collectibles6@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('vintagefan7', 'd973161890ef2b8aa2db4f48f32df93ceb1edc65', 'vintagefan7@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('sportscollector8', 'cc345e4542c64d4675c1294aa11a4ec4ce4907f9', 'sportscollector8@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('techgeek9', 'e71b0ec09daf99c189fd2b170f300568b40ea826', 'techgeek9@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('jewelrylover10', 'f331fdc79ddffb0449b6c680f9cb9566f8a7033b', 'jewelrylover10@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('fashionista11', '1f95791d0cfd80e6bc9ebaabc473ccbbdf264c17', 'fashionista11@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('antiques12', 'a6e8cbd1a5d3a686f60c8a1e92df7028ab90d43b', 'antiques12@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('artcollector13', 'd71e50176c3343e107cf1022d698e2bf9c7da8bd', 'artcollector13@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('bookworm14', 'e0fb51148862912dcce1e95de898d7d1e71ebbb7', 'bookworm14@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('musiclover15', 'd2463de59327ceb39538831830200b1fb00ee92a', 'musiclover15@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('outdoorenthusiast16', 'Nat355dc80b33ef3db66a557b6cf5482cb0930b57beure', 'outdoorenthusiast16@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('coincollector17', 'Coin7c9528dc24cdf3018a3e9f9a3ca9e747f51728e9', 'coincollector17@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('wineconnoisseur18', '5633084d327a5d0d3393aea051a308108fe89c87', 'wineconnoisseur18@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('gamingenthusiast19', '9ef6b1c4fefca69ca618c98e7d4742b2fd8a92d4', 'gamingenthusiast19@example.com');
INSERT INTO users (username, password_hash, email)
VALUES ('petlover20', '2f5642e5ede8b119c01cc24534611c6a6a6304c9', 'petlover20@example.com');

-----------------------------------------
-- Administrator
-----------------------------------------

INSERT INTO administrator (admin_id)
VALUES (1);
INSERT INTO administrator (admin_id)
VALUES (2);
INSERT INTO administrator (admin_id)
VALUES (3);
INSERT INTO administrator (admin_id)
VALUES (4);

-----------------------------------------
-- Address
-----------------------------------------

INSERT INTO address (street, city, zipcode, country)
VALUES ('123 Auction Ave', 456, 5432129, 'Portugal');
INSERT INTO address (street, city, zipcode, country)
VALUES ('456 Bidding Blvd', 789, 9838765, 'New Zealand');
INSERT INTO address (street, city, zipcode, country)
VALUES ('789 Auction Lane', 1011, 761543, 'United States');
INSERT INTO address (street, city, zipcode, country)
VALUES ('1012 Bidding Street', 1314, 6547332, 'United States');
INSERT INTO address (street, city, zipcode, country)
VALUES ('1315 Auction Road', 1516, 8357654, 'United States');
INSERT INTO address (street, city, zipcode, country)
VALUES ('123 Bidder Blvd', 111, 9876835, 'United Kingdom');
INSERT INTO address (street, city, zipcode, country)
VALUES ('456 Auction Ave', 222, 2346356, 'United Kingdom');
INSERT INTO address (street, city, zipcode, country)
VALUES ('789 Bidding Blvd', 333, 3451267, 'United Kingdom');
INSERT INTO address (street, city, zipcode, country)
VALUES ('1012 Auction Lane', 444, 4567838, 'Belgium');

-----------------------------------------
-- FAQ
-----------------------------------------

INSERT INTO faq (question, answer)
VALUES ('How do I place a bid on an auction item?', 'To place a bid on an auction item, simply click on the item you are interested in and enter your bid amount. You can increase your bid if you are outbid by another user.');
INSERT INTO faq (question, answer)
VALUES ('What happens if I win an auction?', 'If you win an auction, you will be notified, and you should proceed to complete the payment for the item. Please make sure to read and understand the auction rules and payment terms.');
INSERT INTO faq (question, answer)
VALUES ('Are there reserve prices on auction items?', 'Some auction items may have reserve prices set by the seller. If the reserve price is not met, the item will not be sold, and you will be notified if this happens.');
INSERT INTO faq (question, answer)
VALUES ('How can I contact the seller?', 'You can contact the seller by using the provided messaging system on the auction platform. This allows you to ask questions or discuss details about the auction item.');
INSERT INTO faq (question, answer)
VALUES ('What is the bidding increment?', 'Bidding increment is the minimum amount by which a bid must be increased. It ensures fair competition among bidders. The increment value is set by the auction platform and may vary.');

-----------------------------------------
-- Bidder/Seller
-----------------------------------------

INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (5, 1, 5.0);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (6, 2, 2.3);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (7, 3, 0.0);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (8, 4, 0.0);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (9, 5, 4.4);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (10, 6, 3.9);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (11, 7, 5.0);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (12, 8, 1.0);
INSERT INTO bidder_seller(bidder_seller_id, address_id, rating)
VALUES (13, 9, 0.2);

-----------------------------------------
-- Auction
-----------------------------------------

INSERT INTO auction (current_bid, bidder_seller_id, initial_date, final_date, initial_bid, status)
VALUES (20.0, 5, '2023-11-25 15:00:00', '2023-11-25 18:41:17', 5.0, 'active');
INSERT INTO auction (current_bid, bidder_seller_id, initial_date, final_date, initial_bid, status)
VALUES (1000.0, 6, '2023-11-27 12:00:00', '2023-11-29 12:00:00', 900.0, 'active');
INSERT INTO auction (current_bid, bidder_seller_id, initial_date, final_date, initial_bid, status)
VALUES (350.0, 7, '2023-11-25 14:15:00', '2023-11-26 00:00:00', 275.99, 'active');
INSERT INTO auction (current_bid, bidder_seller_id, initial_date, final_date, initial_bid, status)
VALUES (432.34, 8, '2023-11-26 08:00:00', '2023-11-26 20:00:00', 355.0, 'cancelled');
INSERT INTO auction (current_bid, bidder_seller_id, initial_date, final_date, initial_bid, status)
VALUES (502.22, 9, '2023-11-25 20:00:00', '2023-12-05 12:00:00', 500.0, 'completed');
INSERT INTO auction (current_bid, bidder_seller_id, initial_date, final_date, initial_bid, status)
VALUES (10.50, 10, '2023-12-01 12:00:00', '2023-12-30 12:00:00', 1.0, 'cancelled');

-----------------------------------------
-- Item
-----------------------------------------

INSERT INTO item (auction_id, item_name, shipping, description, kind)
VALUES (1, 'Antique Painting - Landscape', 'Worldwide', 'Beautiful antique landscape painting', 'art');
INSERT INTO item (auction_id, item_name, shipping, description, kind)
VALUES (2, 'Vintage Collector''s Watch', 'Asia', 'Rare vintage watch for collectors', 'collectibles');
INSERT INTO item (auction_id, item_name, shipping, description, kind)
VALUES (3, 'Rare Comic Book - First Edition', 'Worldwide', 'First edition of a classic comic book', 'collectibles');
INSERT INTO item (auction_id, item_name, shipping, description, kind)
VALUES (4, 'Signed Memorabilia - Musician Poster', 'Europe', 'Poster signed by a famous musician', 'collectibles');
INSERT INTO item (auction_id, item_name, shipping, description, kind)
VALUES (5, 'Limited Edition Art Print - Wildlife', 'America', 'Limited edition wildlife art print', 'art');
INSERT INTO item (auction_id, item_name, shipping, description, kind)
VALUES (6, 'Rare Coin Collection - Ancient Coins', 'US', 'Collection of ancient and rare coins', 'collectibles');

-----------------------------------------
-- Bid
-----------------------------------------

INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (6, 1, '2023-11-25 16:00:00', 20.0);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (5, 2, '2023-11-27 14:00:00', 950.0);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (7, 2, '2023-11-27 15:00:00', 1000.0);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (8, 3, '2023-11-25 18:15:00', 350.0);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (9, 4, '2023-11-26 9:25:00', 360.0);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (10, 4, '2023-11-26 11:30:00', 400.0);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (11, 4, '2023-11-26 14:00:00', 432.34);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (12, 5, '2023-11-28 03:23:00', 502.22);
INSERT INTO bid (bidder_seller_id, auction_id, bidding_date, amount)
VALUES (13, 6, '2023-12-14 08:27:00', 10.50);


-----------------------------------------
-- Payment Method
-----------------------------------------

INSERT INTO payment_method (bidder_seller_id)
VALUES (5);
INSERT INTO payment_method (bidder_seller_id)
VALUES (6);
INSERT INTO payment_method (bidder_seller_id)
VALUES (7);
INSERT INTO payment_method (bidder_seller_id)
VALUES (8);
INSERT INTO payment_method (bidder_seller_id)
VALUES (9);
INSERT INTO payment_method (bidder_seller_id)
VALUES (10);
INSERT INTO payment_method (bidder_seller_id)
VALUES (11);
INSERT INTO payment_method (bidder_seller_id)
VALUES (12);
INSERT INTO payment_method (bidder_seller_id)
VALUES (13);

-----------------------------------------
-- Card
-----------------------------------------

INSERT INTO card (card_id, number, holder_name, exp_date, cvv)
VALUES (7, 1111222233334444, 'John Doe', '2024-12-31', 123);
INSERT INTO card (card_id, number, holder_name, exp_date, cvv)
VALUES (8, 9876543210987654, 'Jane Doe', '2025-06-30', 456);
INSERT INTO card (card_id, number, holder_name, exp_date, cvv)
VALUES (9, 1234567890123456, 'Rick McArthur', '2025-09-30', 789);


-----------------------------------------
-- Paypal
-----------------------------------------

INSERT INTO paypal (paypal_id, email)
VALUES (4, 'paypaluser4@auctionsite.com');
INSERT INTO paypal (paypal_id, email)
VALUES (5, 'paypaluser5@auctionsite.com');
INSERT INTO paypal (paypal_id, email)
VALUES (6, 'paypaluser6@auctionsite.com');

-----------------------------------------
-- Transfer
-----------------------------------------

INSERT INTO transfer (transfer_id, reference, entity, amount)
VALUES (1, '123456789', 11473, 20.0);
INSERT INTO transfer (transfer_id, reference, entity, amount)
VALUES (2, '234567890', 11473, 950.0);
INSERT INTO transfer (transfer_id, reference, entity, amount)
VALUES (3, '345678901', 11473, 1000.0);

-----------------------------------------
-- Comment
-----------------------------------------

INSERT INTO comment (bidder_seller_id, auction_id, comment_date, contents)
VALUES (5, 1, '2023-11-25 15:01:00', 'Feel free to ask anything!');
INSERT INTO comment (bidder_seller_id, auction_id, comment_date, contents)
VALUES (6, 1, '2023-11-25 15:47:00', 'This is beautiful!');

-----------------------------------------
-- Notification
-----------------------------------------

INSERT INTO notification (bidder_seller_id, contents, sent_date, seen, kind)
VALUES (5, 'You were outbid by @auctioneer1: $1000.0', '2023-11-27 15:00:00', true, 'outbid');
INSERT INTO notification (bidder_seller_id, contents, sent_date, seen, kind)
VALUES (10, 'You were outbid by @collectibles6: $400.0', '2023-11-26 11:30:00', false, 'outbid');
INSERT INTO notification (bidder_seller_id, contents, sent_date, seen, kind)
VALUES (11, 'You were outbid by @vintagefan7: $432.34', '2023-11-26 14:00:00',  false, 'outbid');

-----------------------------------------
-- Message
-----------------------------------------

INSERT INTO message (sender_id, receiver_id, sent_date, contents, seen)
VALUES (6, 5, '2023-11-25 14:15:00', 'I really like the items you sell!', true);
```

## Revision history

### Artifacts: A4

#### Editor: Rui Silveira
**October 12:** \
Class Diagram \
**by:** \
Gonçalo Matias, Diogo Pintado

**October 19:** \
Additional Business Rules \
**by:** \
Gonçalo Matias

**October 24:** \
New Class Diagram \
**by:** \
Rui Silveira

**October 25:** \
Consistency between assets \
**by:** \
André Relva

### Artifacts: A5

#### Editor: André Rlva
**October 24:** \
Relational Schema\
**by:** 
Rui Silveira

**October 24:** \
Database creation code \
**by:** \
André Relva

**October 25:** \
Consistency between assets \
**by:** \
André Relva

#### Editor: Gonçalo Matias
**October 24:** \
Transactions \
**by:** \
Gonçalo Matias


### Artifacts: A6

#### Editor: Rui Silveira
**October 19:** \
Artifact \
**by:** \
Rui Silveira

#### Editor: André Relva
**October 25:** \
6 and 6.2 \
**by:** \
Gonçalo Matias

**October 25:** \
Major populate code overhaul \
**by:** \
André Relva

**October 25:** \
Triggers revised \
**by:** \
André Relva

**October 25:** \
Indexes finished \
**by:** \
André Relva

Authors:

- André Relva - up202108695
- Rui Silveira - up202108878
- Gonçalo Matias - up202108703
- Diogo Pintado - up202108875

Date: 25/10/2023