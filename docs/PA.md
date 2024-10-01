# PA - Product and Presentation

DibsonBids is the premier online auction platform, offering users an unparalleled experience in bidding and acquiring unique items. With DibsonBids, participants can effortlessly navigate through a wide range of products, place bids in real-time, and experience the thrill of winning auctions from the comfort of their homes. This platform is designed to revolutionize the traditional auction process, making it more accessible, transparent, and user-friendly for everyone.

## A9: *Product*

DibsOnBids stands out for its robust implementation of the information system designed in the previous artifacts. Using PHP in conjunction with the Laravel Framework, the platform offers dynamic and interactive web pages. The integration of AJAX enhances the user experience, providing interactivity and agility. In addition, DibsOnBids is based on PostgreSQL as its solid database, guaranteeing reliability and efficiency in information management.

At the heart of the DibsOnBids project is the aim of providing an innovative online auction platform. Developed as an interactive tool, it aims to connect auction enthusiasts, allowing them to create and participate in exciting events. Whether you're an avid seller or a buyer looking for exclusive offers, DibsOnBids offers an engaging and accessible experience for everyone. Sign up, explore, and immerse yourself in the exciting world of online auctions with DibsOnBids!

### 1 . Installation

The source code for our web application is available for cloning here. After obtaining the repository, you can launch the application by executing the following command in your command line interface:

`docker run -it -p 8000:80 -e DB_DATABASE="lbaw2332" -e DB_USERNAME="lbaw2332" -e DB_PASSWORD="NekBYRGG"`

### 2. Usage

URL: http://lbaw2332.lbaw.fe.up.pt

#### 2.1 User Credentials

<table>
<tr>
<td>

**Email**
</td>
<td>

**Password**
</td>
</tr>
<tr>
<td>apresentacaolbaw2332@fe.up.pt</td>
<td>lbaw2332</td>
</tr>
</table>

*Table 1: DibsOnBids User Credentials*

### 3. Application Help

The Help features have been integrated alongside the primary functionalities of the application. Assistance is available through alert messages during certain actions, as well as on dedicated static pages such as "About Us", "Contacts", "TermsOfService", "FAQ"...

These informative pages are accessible via their specific URL paths, namely `/aboutus`,`/contacts`, `/terms`, `/faq` ... Additionally, for ease of navigation, we have implemented buttons in the sidebar of the application. These buttons provide direct access to the respective help and information pages.

![image](uploads/6778d2abd23543bb42b6591d5f2c56cf/image.png)

*Figure 1: DibsOnBids static pages*

The "About Us" page on 'Dibs on Bids' serves as a comprehensive guide to understanding our website's purpose, features, and the unique value it offers to its users.

![image](uploads/7b4aabaa2997078f98a80b0f83d85abb/image.png)
![image](uploads/d839f3126612b1bd1f3850349d7a8c3c/image.png)
![image](uploads/1861d598cebb2746156ef9c6c736e03e/image.png)

*Figure 2: DibsOnBids About Us Page*

The "Contacts" section offers comprehensive information about the administrators, including their contact details, making it simple for users to reach out and connect with them for any inquiries or assistance they may need.

![image](uploads/11e331b753b4ea585f1bd36a92ba101b/image.png)
![image](uploads/96fc26860240a2cc7869cf70ed861b14/image.png)

*Figure 3: DibsOnBids Contacts Page*

The "Terms of Service" section presents a detailed explanation of the rules and guidelines governing the use of the platform, ensuring users are well-informed about their rights and responsibilities while interacting with the service.

![image](uploads/8422a2ba14bfa4a33e9024df5908b15d/image.png)
![image](uploads/ccef76db4a66fd02a3c4adc6e315be93/image.png)
![image](uploads/c97544ba09ff6049efd3b116695ec772/image.png)

*Figure 4: DibsOnBids Terms Of Service Page*

Finally, the "Frequently Asked Questions" section addresses common queries with detailed responses, while the "Contacts" section provides information about the administrators, enabling users to easily get in touch with them.

![image](uploads/4ec4d70f3c2d4cb782568f954e3b265e/image.png)
![image](uploads/52895edcc14b5ca068ea63306b367fd5/image.png)

*Figure 5: DibsOnBids FAQ page*

### 4. Input Validation

For the purpose of validating data on the server side, we employed the Request, which provides a method named offering a range of validation options. This functionality was utilized to ensure the integrity of data entered into various forms on our platform, such as those for user registration and login.The following instances illustrate how this was implemented:~

In the provided image, there is an example of client-side form validation within the login page. The validation mechanism has detected that the entered email address is missing the required '@' character, which is a fundamental part of a valid email format. A warning message is also displayed directly below the email input field. 

![loginvalidation](uploads/loginvalidation.png)

Validation by presenting an error message when a user attempts to place a bid that does not meet the minimum required amount

![bidvalidation](uploads/bid.png)

### 5. Check Accessibility and Usability

[Accessibility](https://git.fe.up.pt./lbaw/lbaw2324/lbaw2332/-/blob/main/docs/acessibilidade.pdf?ref_type=heads)
[Usability](https://git.fe.up.pt./lbaw/lbaw2324/lbaw2332/-/blob/main/docs/usabilidade.pdf?ref_type=heads)

### 6. HTML and CSS Validation

HTML:

[HTML Validation - AboutUs](https://drive.google.com/file/d/1Z0nIDepr7JUcwA_kxYtIj9AmAiyQo3cH/view?usp=sharing)

[HTML Validation  - Contacts](https://drive.google.com/file/d/19Iv88gJSCfJgpuk9M8WI6-ND5ttwVzjV/view?usp=sharing)

[HTML Validation - Terms](https://drive.google.com/file/d/1L4dTyyxtk6TWjw1pt9HBmiFEOB9h74MR/view?usp=sharing)

CSS:

[Terms](https://drive.google.com/file/d/1AGKwmsn5TCAqCrY4WMdL38tmaywWw59b/view?usp=sharing)

[Contacts](https://drive.google.com/file/d/19YIlgNN4F5lSKvywkyEBMyJ8gDfrKGVI/view?usp=sharing)

### 7. Revisions of the Project

Since the requirements specification stage, the project has undergone numerous revisions and updates, reflecting changes in project scope, technological advancements, and user feedback. These modifications have been essential in ensuring that the final product aligns with evolving user needs.

#### Routes

* **/faq**, to view frequently asked questions;
* **/api/cards/{card_id}** and **/api/item/{id}**, for managing auction item listings;
* **/login**, **/logout**, and **/register**, for user authentication;
* **/aboutus**, to learn about the website;
* **/contacts**, for contact information;
* **/support**, for user support queries;
* **/profile**, to view and manage user profiles;
* **/auction/{id}** and **/createauction**, for viewing and creating auctions;
* **/search**, for auction search functionality;
* **/auction/{id}/bid**, to place a bid on an auction;
* **/cart**, for viewing the user's cart;
* **/user/add-credit**, to add credit to the user's account;
* **/terms**, to view the terms of service;
* **/delete-account**, for account deletion;
* **/category/{category}**, for filtering auctions by category;
* **/art-auctions**, to view all art-related auctions;
* **/collectibles-auctions**, for collectibles auctions;
* **/category/books**, (commented out) for book-related auctions.

#### Database Schema for DibsOnBids

* **Types**:
  * `ITEM_TYPE`: Enum for item categories.
  * `AUCTION_STATUS`: Enum for auction status.
  * `NOTIFICATION_TYPE`: Enum for notification types.
  * `COUNTRY_ENUM`: Enum for country names.

* **Users Table**:
  * Attributes include `user_id`, `username`, `email`, `password`, `is_banned`, `remember_token`, `credit`.
  * Passwords encrypted with bcrypt.

* **Administrator Table**:
  * Links administrators to users.

* **Address Table**:
  * Contains address details like `street`, `city`, `zipcode`, `country`.

* **FAQ Table**:
  * Stores frequently asked questions and answers.

* **Bidder/Seller Table**:
  * Manages bidder and seller details, including addresses and ratings.

* **Auction Table**:
  * Handles auction details like `current_bid`, `bidder_seller_id`, `initial_date`, `final_date`, `initial_bid`, `status`.

* **Item Table**:
  * Contains details of items being auctioned.

* **Bid Table**:
  * Manages bids placed in auctions.

* **Payment Method Table**:
  * Stores different types of payment methods.

* **Card Table**:
  * Manages details for card payments.

* **PayPal Table**:
  * Handles PayPal account details for payments.

* **Transfer Table**:
  * Manages details for bank transfers.

* **Comment Table**:
  * For user comments on auction items.

* **Notification Table**:
  * Manages notifications for users.

* **Message Table**:
  * Handles private messaging between users.

* **Indexes**:
  * Various indexes for optimizing database queries.

* **Triggers**:
  * Several triggers for maintaining data integrity and enforcing business rules.


#### Pages
- Developed new pages for enhanced user experience:
  - `aboutus.blade.php`: About Us page
  - `add-credit.blade.php`: Add Credit functionality
  - `antiques.blade.php`: Antiques category auctions
  - `art.blade.php`: Art category auctions
  - `auction.blade.php`: Auction detail view
  - `books.blade.php`: Book category auctions
  - `cards.blade.php`: Payment cards management
  - `category.blade.php`: Auction category listings
  - `clothes.blade.php`: Clothes category auctions
  - `collectibles.blade.php`: Collectibles category auctions
  - `contacts.blade.php`: Contact information page
  - `createauction.blade.php`: Auction creation page
  - `deleteaccount.blade.php`: User account deletion
  - `electronics.blade.php`: Electronics category auctions
  - `faq.blade.php`: Frequently Asked Questions
  - `home.blade.php`: Homepage
  - `jewelry.blade.php`: Jewelry category auctions
  - `memorabilia.blade.php`: Memorabilia category auctions
  - `profile.blade.php`: User profile management
  - `shoppingcart.blade.php`: Shopping cart page
  - `sidebars.blade.php`: Sidebar components
  - `vehicles.blade.php`: Vehicles category auctions


#### Controllers
- Expanded the Controller layer with new components for handling specific logic:
  - `AddressController`
  - `AdministratorController`
  - `BidController`
  - `BidderSellerController`
  - `CartController`
  - `CommentController`
  - `FAQController`
  - `ItemController`
  - `MessageController`
  - `NotificationController`
  - `UserController`

#### Database Enhancements
- Refined the database schema with new enumerations and structures for a robust data model.

#### Models
- Introduced new Models corresponding to the database schema for MVC architecture compliance:
  - `Address`
  - `Administrator`
  - `Auction`
  - `Bid`
  - `BidderSeller`
  - `Card`
  - `Comment`
  - `FAQ`
  - `Item`
  - `Message`
  - `Notification`
  - `PaymentMethod`
  - `Paypal`
  - `User`

#### Front-end Enhancements
- Improved the website's front-end with dedicated styling and scripts:
  - CSS: `app.css`, `categories.css`
  - JavaScript: `app.js`

#### Security Measures
- Implemented security features like `remember_token` for secure authentication.

Each revision aims to improve functionality, security, and the user interface, ensuring a comprehensive and efficient online auction experience.

#### Web Resources Specification

#### Implemented Web Resources

##### User Authentication

| Web Resource Reference | URL |
|------------------------|-----|
| R1: Login Form       | GET /login |
| R2: Login Submission | POST /login |
| R3: Logout Process   | GET /logout |
| R4: Registration Form| GET /register |
| R5: Registration Submission | POST /register |

*Table 2: Authentication implementation*

##### User Management

| Web Resource Reference       | URL                    |
|------------------------------|------------------------|
| R6: User Profile      | GET /user/profile         |
| R7: User Home Page         | GET /user/home              |
| R8: Profile Delete Account       | POST /user/delete-account |
| R9: Profile Add Credit       | POST /user/add-credit |
| R10: User Shopping Cart       | GET /user/cart |
| R11: About Us Page             | GET /aboutus             |
| R12: Contacts Page              | GET /Contacts              |
| R13: Terms Of Service Page          | GET /terms         |
| R14: Faq Page        | GET /faq     |

*Table 3: User Management Implementation*

##### Module M3: Auction Management

| Web Resource Reference       | URL                       |
|------------------------------|---------------------------|
| R13: Create Auction Action  | POST /createauction      |
| R14: Delete Auction Action  | POST /deleteauction      |
| R15: Bid on Auction Action  | POST /auction/1         |

*Table 4: Auction Management Implementation*

##### Module 4: Auction Search

| Web Resource Reference           | URL              |
|----------------------------------|------------------|
| R16: Search Auctions Page       | GET /auctions/search      |
| R17: Search Auctions by Name    | GET /api/auction/search?query=     |

*Table 5: Auction Search Implementation*

### 8. Implementation Details

#### 8.1. Libraries Used

This project used these Libraries and Frameworks:
* [Laravel](https://laravel.com/) - for server-side management

#### 8.2. User Stories

| **Identifier** | **Action** | **Priority** | **Team Members** | **State** |
| -------------- | ---------- | ------------ | ---------------- | --------- |
| US01 | View Auction Listings | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US02 | Search Auction Items | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US03 | View Auction Details | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US04 | Register | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US05 | Sign In | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US06 | Sign Out | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US07 | Edit Profile | high | - | 0% |
| US08 | Payment Setup | medium | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US09 | Shipping Setup | medium | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US10 | Special Search Privileges | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US11 | Adminisitrator Account | medium | - | 0% |
| US12 | Manage User Accounts | medium | - | 0% |
| US13 | Account Blocking | medium | - | 0% |
| US14 | Account Deletion | medium | - | 0% |
| US15 | Delete Auction Bids | low | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US16 | Manage User Roles | low | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US17 | Emergency Notifications | low | - | 0% |
| US16 | Receive and Respond to Support Requests | high | - | 0% |
| US17 | Provide Assistence with Account Issues | high | - | 0% |
| US18 | Address Payment and Transaction Concerns | high | -| 0% |
| US19 | Resolve Listing and Bidding Problems | medium | - | 0% |
| US20 | Provide Guidance on Site Usage | medium | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US21 | Investigate Reports of Violations | medium | - | 0% |
| US22 | Communicate Policy Updates | medium | - | 0% |
| US23 | Collaborate with Admins for Issue Resolution | medium | - | 0% |
| US24 | Maintain Support Documentation | low | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US25 | Create Auction Listing | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US26 | Specify Item Details | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US27 | Set Starting Price | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US28 | Determine Auction Duration | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US29 | Preview Auction Listing | medium | - | 0% |
| US29 | Manage Active Auctions | medium | - | 0% |
| US30 | Set Buyout Price | medium | - | 0% |
| US31 | Receive Bid Notifications | medium | - | 0% |
| US32 | Relist Unsold Items | low | - | 0% |
| US33 | Access Auction History | low | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US34 | Schedule Auction Promotion | low | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US34 | Place Bids on Items | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US35 | Track Auction Activity | high | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US36 | Rate Seller | high | - | 0% |
| US37 | View Auction History | medium | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 100% |
| US38 | Add Items to Watchlist | medium | - | 0% |
| US39 | View Item Reviews | medium | - | 0% |
| US40 | Receive Outbid Notifications | low | André Relva, Rui Silveira, Gonçalo Matias, Diogo Pintado | 0% |
| US41 | Set Auto Bidding | low | - | 0% |
| US42 | View Auction Winners | low | - | 0% |

*Table 6: DibsOnBids user stories*

## A10: *Presentation*

### 1. Product Apresentation

DibsOnBids is your go-to online marketplace for participating in or creating auctions that feature a diverse array of items, ranging from timeless antiques to the latest products. Our platform is managed by a dedicated team of administrators who ensure a secure and equitable environment for all users. Here, you can showcase your distinctive items, determine starting bids, and set auction end dates. Engage in the thrill of bidding, keep track of auction progress, and receive updates in real-time. For any queries or assistance, our FAQ page provides immediate solutions, and our responsive support team is always at your service to address your needs.

Our platform is more than just a site for online auctions; it's a vibrant community that empowers users to buy, sell, and savor the excitement of auctions with ease and excitement. Crafted using state-of-the-art web technologies like HTML5, JavaScript, CSS, and powered by the robust Laravel PHP framework, DibsOnBids delivers a seamless and adaptive user experience across all devices. The design is user-friendly with easy navigation through a sidebar interface, ensuring an intuitive user journey. We provide steadfast support with static FAQ pages and accessible contact options, while our behind-the-scenes administration vigilantly maintains the site's integrity, ensuring its continuous security and functionality. Join DibsOnBids to immerse yourself in the captivating world of online auctions and be a part of our thriving community.

*DibsOnBids URL*: https://lbaw2332.lbaw.fe.up.pt

### 2. Video Presentation

https://drive.google.com/drive/folders/1154JVu7jneHfcLRVQg2dQFuNXNBz_aLQ 

## Revision history

### Artifact: A9 
#### Editor: Rui Silveira

**December 9:**\
Initial text, User stories\
**by:** \
Rui Silveira

**December 13:**\
Admin/user credentials, application help, usage, installation\
**by:** \
Gonçalo Matias

**December 14:**\
AboutUs, contacts\
**by:** \
Gonçalo Matias

**December 19:**\
Application Help
**by:** \
Gonçalo Matias

**December 19:**\
Implementation Details
**by:** \
Rui Silveira

**December 21:**\
Input Validation, web resources 
**by:** \
Gonçalo Matias, Diogo Pintado

### Artifact: A10 
#### Editor: Rui Silveira

**December 9:**\
Presentation text, Technologies used\
**by:** \
Rui Silveira

Authors:
- André Relva    - up202108695
- Rui Silveira   - up202108878
- Gonçalo Matias - up202108703
- Diogo Pintado  - up202108875

Date: 09/12/2023