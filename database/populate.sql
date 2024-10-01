SET search_path TO lbaw2332;

-----------------------------------------
-- Users
-----------------------------------------

INSERT INTO users (username, password, email, credit)
VALUES ('auctioneer1', '7d8a6fbc6b7a33be8e2cb4363bf1f4b43f166798', 'auctioneer1@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('bidder2', '639e2ae94d51b7ddbea108f1200f8277e15fd5b9', 'bidder2@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('auctionguru3', '8481b0f99493bd6fe1646fb21c402a3720847d20', 'auctionguru3@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('biddingpro4', 'aa313dac5a3f5d92dbb8338316d85e16a80809a2', 'biddingpro4@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('artlover5', 'd71e50176c3343e107cf1022d698e2bf9c7da8bd', 'artlover5@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('collectibles6', 'f18acef9ac04a2df190f8549d1d0f505732295d5', 'collectibles6@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('vintagefan7', 'd973161890ef2b8aa2db4f48f32df93ceb1edc65', 'vintagefan7@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('sportscollector8', 'cc345e4542c64d4675c1294aa11a4ec4ce4907f9', 'sportscollector8@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('techgeek9', 'e71b0ec09daf99c189fd2b170f300568b40ea826', 'techgeek9@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('jewelrylover10', 'f331fdc79ddffb0449b6c680f9cb9566f8a7033b', 'jewelrylover10@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('fashionista11', '1f95791d0cfd80e6bc9ebaabc473ccbbdf264c17', 'fashionista11@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('antiques12', 'a6e8cbd1a5d3a686f60c8a1e92df7028ab90d43b', 'antiques12@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('artcollector13', 'd71e50176c3343e107cf1022d698e2bf9c7da8bd', 'artcollector13@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('bookworm14', 'e0fb51148862912dcce1e95de898d7d1e71ebbb7', 'bookworm14@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('musiclover15', 'd2463de59327ceb39538831830200b1fb00ee92a', 'musiclover15@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('outdoorenthusiast16', 'Nat355dc80b33ef3db66a557b6cf5482cb0930b57beure', 'outdoorenthusiast16@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('coincollector17', 'Coin7c9528dc24cdf3018a3e9f9a3ca9e747f51728e9', 'coincollector17@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('wineconnoisseur18', '5633084d327a5d0d3393aea051a308108fe89c87', 'wineconnoisseur18@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('gamingenthusiast19', '9ef6b1c4fefca69ca618c98e7d4742b2fd8a92d4', 'gamingenthusiast19@example.com', 0.00);
INSERT INTO users (username, password, email, credit)
VALUES ('petlover20', '2f5642e5ede8b119c01cc24534611c6a6a6304c9', 'petlover20@example.com', 0.00);


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