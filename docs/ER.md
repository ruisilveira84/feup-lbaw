# ER: Requirements Specification Component

* **Project vision:**

The primary objective of this project is to facilitate interactions between buyers and sellers, providing a platform for auctions and bidding on various products. Users can create product listings for auction, place bids, or comment on listings from other users and establish connections through virtual friendships.

In summary, DibsOnBids aims to promote interaction and information exchange between buyers and sellers, enabling auctions, bidding, and discussions in a friendly and connected environment.

## A1: *DibsOnBids*

The primary objective of the *DibsOnBids* project is to create an online platform for conducting auctions and building a community of auction enthusiasts. This platform is intended for a wide range of users interested in participating in various auctions. Users will need to register and verify their credentials to ensure their eligibility for using the platform effectively.

The project also entails the establishment of an administrative team responsible for the platform's smooth operation. Administrators will oversee content moderation, ensuring that illegal or unauthorized material is promptly removed.

Key features of the platform include the ability for users to join auction-themed groups, follow other users with interesting auction listings, and create their own auctions. This functionality enhances the user experience by facilitating resource sharing and interaction among users with shared interests.

The website will host two different types of users: administrators, who can oversee any and all bids for content moderation, being able to close any auction deemed unfit for the website, and provide appropriate action on registered users, and normal users, who can register on the platform, participate on and create bids.

The website aims to provide a simple and intuitive user interface easily accessible on any modern device that allows a smooth experience for our users in their bidding endeavors.

### Main features

* **Login/Logout**
* **User Registration**
* **Authentication and Security System**
* **Auction Listings**
* **Auction Details**
* **Filtering and Search**
* **Product Listing for Auction**
* **Bidding System**
* **Auction Timer**
* **Payment System**
* **Account Management**
* **Admin Panel**
* **Responsiveness and Attractive Design**
* **Privacy Policy and Terms of Use**
* **Customer Support / Help**
* **FAQ**
* **Make an offer**
* **Messaging**
* **Purchases history**
* **Bookmarking**
* **Trendings**


## A2: Actors and User stories

Actors and user stories contain specifications about the individuals who will utilize BidsOnDibs in various capacities and how they will interact with the platform. 

### 2.1 Actors

![actorsDibsOnBids](uploads/29cc6f14d62c29f24680899543c4233e/actorsDibsOnBids.png)

The actors are represented below:

| Actors | Description |
|--------|-------------|
| User | A registered individual who has created an account on the site. Users can browse, bid on auctions, create their own listings, and manage their account settings. |
| Guest | A visitor who has not yet registered or logged in. Guests can typically view public content but may have limited access to certain features or actions. |
| Authenticated User | A registered user who has logged into their account. Authenticated users have full access to the site's features, including bidding, creating listings, and managing their account. |
| Administrator | A privileged user with special access rights. Administrators have the highest level of authority and can manage users, listings, auctions, and site settings. They may also have the ability to resolve disputes and enforce policies. |
| Support | A designated user or team responsible for providing assistance and customer support to other users. They help with inquiries, resolve issues, and ensure a smooth user experience. |
| Auction Creator | A registered user who initiates the auction process by listing an item for sale. They provide details about the item, set the starting price, and determine the auction duration. |
| Auction Participant | A registered user who actively engages in the auction process by placing bids on items of interest. Auction participants compete against each other to secure the winning bid for a specific item. |
        
Table 1: DibsOnBids actors and description.

### 2.2 User Stories

For the DibsOnBids system, the user stories are presented in the following sections.

#### 2.2.1 User

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US01 | View Auction Listings | high | I want to view available auction listings to explore products of interest. |
| US02 | Search Auction Items | high | I want to search for specific auction items by category, keyword or other criteria. |
| US03 | View Auction Details | high | I want to see detailed information about a specific auction item. |

Table 2: User Stories for an Auction Site

#### 2.2.2 Guest

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US04 | Register | high | As a Guest, I want to register an account, so that I can participate in auctions and track my activity. |

Table 3: Guest User Stories for an Auction Site


#### 2.2.3 Authenticated User

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US05 | Sign In | high | As an Authenticated User, I want to be able to login to my account |
| US06 | Sign Out | high | As an Authenticated User, I want to be able to sign out when I want to. |
| US07 | Edit Profile | high | As an Authenticated User, I want to be able to edit my profile data, including username, profile picture and short description. |
| US08 | Payment Setup | medium | As an Authenticated User, I want to be able to set up my payment process which will be used for my bids. |
| US09 | Shipping Setup | medium | As an Authenticated User, I want to be able to set up my shipping information for the items to be shipped to when I win an auction. |

Table 4: Authenticated User User Stories for an Auction Site

#### 2.2.4 Administrator

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US10 | Special Search Privileges | high | As an Administrator, I want to have special search privileges, allowing me to search for user profiles and auction listings even if they are private, so that I can investigate any violations of site policies or guidelines. |
| US11 | Admnisitrator Account | medium | As an Administrator, I want to have an administrator account, granting me access to the auction site with administrative privileges, allowing me to manage and oversee the platform effectively. |
| US12 | Manage User Accounts | medium | As an Administrator, I want to administer user accounts, including the ability to investigate reports, review user activities, and take necessary actions to ensure compliance with site policies. |
| US13 | Account Blocking | medium | As an Administrator, I want to have the authority to block or unblock user accounts, enabling me to enforce penalties for users who do not adhere to the site's rules and guidelines. |
| US14 | Account Deletion | medium | As an Administrator, I want to have the ability to delete auction listings, giving me the power to remove listings that contain prohibited content or violate site policies. |
| US15 | Delete Auction Bids | low | As an Administrator, I want to have the authority to delete auction bids, allowing me to address situations where bidding activity violates site rules or guidelines. |
| US16 | Manage User Roles | low | As an Administrator, I want the ability to assign and revoke specific roles and permissions to users, such as support team or administrator status. |
| US17 | Emergency Notifications | low | As an Administrator, I want the ability to send emergency notifications to all users in case of critical issues, such as security breaches or system outages. |

Table 5: Administrator User Stories for an Auction Site

#### 2.2.5 Support Team

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US16 | Receive and Respond to Support Requests | high | As a Support Team member, I want to receive and respond to support requests from users, including inquiries, issues, and requests for assistance, in order to ensure a smooth user experience on the auction site. |
| US17 | Provide Assistence with Account Issues | high | As a Support Team member, I want to assist users with account-related issues, such as login problems, password recovery, and account settings adjustments, to help users resolve these issues promptly. |
| US18 | Address Payment and Transaction Concerns | high | As a Support Team member, I want to address payment-related concerns and transaction issues reported by users, ensuring that payments are processed correctly and resolving disputes when necessary. |
| US19 | Resolve Listing and Bidding Problems | medium | As a Support Team member, I want to assist users in resolving issues related to auction listings and bidding, including technical problems, item descriptions, and bid disputes, to maintain fair and smooth auctions. |
| US20 | Provide Guidance on Site Usage | medium | As a Support Team member, I want to provide guidance and instructions to users on how to effectively use the auction site, including searching for items, placing bids, and managing their accounts. |
| US21 | Investigate Reports of Violations | medium | As a Support Team member, I want to investigate and take appropriate actions on reports of violations of site policies, ensuring that the auction site maintains a safe and compliant environment. |
| US22 | Communicate Policy Updates | medium | As a Support Team member, I want to communicate updates to site policies and guidelines to users, ensuring that they are aware of any changes that may affect their use of the platform. |
| US23 | Collaborate with Admins for Issue Resolution | medium | As a Support Team member, I want to collaborate with administrators to resolve complex issues and violations, ensuring a coordinated approach to maintaining a high-quality auction site.
| US24 | Maintain Support Documentation | low | As a Support Team member, I want to maintain documentation and FAQs to provide users with self-help resources and reduce the volume of support requests. |

Table 6: Support Team User Stories for an Auction Site

#### 2.2.6 Auction Creator

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US25 | Create Auction Listing | high | As an Auction Creator, I want to create an auction listing by providing details about the item, setting the starting price, and determining the auction duration, in order to initiate the auction process. |
| US26 | Specify Item Details | high | As an Auction Creator, I want to specify detailed information about the item I'm listing, including its name, description, category, and uploading images, to provide potential bidders with comprehensive information. |
| US27 | Set Starting Price | high | As an Auction Creator, I want to specify detailed information about the item I'm listing, including its name, description, category, and uploading images, to provide potential bidders with comprehensive information. |
| US28 | Determine Auction Duration | high | As an Auction Creator, I want to determine the duration of the auction, specifying the start and end times, to establish a clear timeline for bidding. |
| US29 | Preview Auction Listing | medium | As an Auction Creator, I want to preview my auction listing before it goes live, ensuring that all details are accurate and that the listing meets my expectations. |
| US29 | Manage Active Auctions | medium | As an Auction Creator, I want the ability to view and manage my active auctions, including tracking bid activity, responding to bidder inquiries, and making adjustments if necessary. |
| US30 | Set Buyout Price | medium | As an Auction Creator, I want to set a buyout price for my auction listings, allowing buyers to purchase the item immediately at a predefined price without waiting for the auction to end. |
| US31 | Receive Bid Notifications | medium | As an Auction Creator, I want to receive notifications when my auction receives new bids, keeping me informed about bidding activity. | 
| US32 | Relist Unsold Items | low | As an Auction Creator, I want the option to relist items that did not sell in a previous auction, simplifying the process of re-listing items for sale. |
| US33 | Access Auction History | low | As an Auction Creator, I want to access the history of my past auctions, including details on winning bidders and final prices, for record-keeping and reference. |
| US34 | Schedule Auction Promotion | low | As an Auction Creator, I want to schedule the promotion of my auctions. |

#### 2.2.7 Auction Participant

| **Identifier** | **Action** | **Priority** | **Description** |
| -------------- | ---------- | ------------ | --------------- |
| US34 | Place Bids on Items | high | As an Auction Participant, I want to place bids on items I'm interested in, competing against other participants to secure the winning bid for a specific item. |
| US35 | Track Auction Activity | high | As an Auction Participant, I want to track the progress of auctions I've participated in, including the current highest bid and time remaining, to stay informed. |
| US36 | Rate Seller | high | As an Auction Participant, I want the option to rate and provide feedback on sellers' performance after completing a successful transaction, enhancing the trust and transparency of the platform. |
| US37 | View Auction History | medium | As an Auction Participant, I want to access the history of auctions I've participated in, including details on my bidding activity, winning bids, and past auctions. |
| US38 | Add Items to Watchlist | medium | As an Auction Participant, I want to add items I'm interested in to my watchlist, making it easier to keep track of auctions without immediately placing a bid. |
| US39 | View Item Reviews | medium | As an Auction Participant, I want to read reviews and ratings for items listed in auctions, helping me make informed decisions about whether to place a bid. |
| US40 | Receive Outbid Notifications | low | As an Auction Participant, I want to receive notifications when I've been outbid in an auction, prompting me to place a higher bid if desired. |
| US41 | Set Auto Bidding | low | As an Auction Participant, I want the option to set auto-bidding rules for specific auctions, allowing the system to automatically place bids on my behalf up to a certain limit. |
| US42 | View Auction Winners | low | As an Auction Participant, I want to view the winners of completed auctions, providing transparency into the outcome of previous auctions. |

Table 8: Auction Participant User Stories for an Auction Site

## 3. Supplementary Requirements

### 3.1 Business rules

| **Identifier** | **Name** | **Description** |
| -------------- | -------- | --------------- |
| BR01 | Item History Retention | The history of an auction item must be maintained even if the item is removed from the platform to preserve the bidding records and transaction history. This includes items tied to deleted user accounts. |
| BR02 | Access Restricted to Registered Users | Access to the bidding is restricted to registered users only, ensuring that it is accessible to individuals who have an account on the platform. |
| BR03 | Accepted Media Types | Accepted media types for item listings and product descriptions include: *.jpg*, *.png*, *.jpeg*, .*gif*. These formats are chosen for their compactness, ensuring efficient storage and retrieval. |
| BR04 | Date Validity | The auction start and end dates must always be less than or equal to the current date and time, ensuring the validity of auction timelines. |
| BR05 | Restrictions on Self-Interaction | A user cannot bid on their own auctions, as it would increase the price unfairly and aritficially. |

Table 10: Auction Site Business Rules

### 3.2 Technical Requirements

| **Identifier** | **Name** | **Description** |
| -------------- | -------- | --------------- |
| **TR01** | **Security** | **The auction site must implement robust security measures to protect user information from unauthorized access. Only authorized users, individuals with shared access, and administrators should be able to access data, and even then, only as necessary.** |
| **TR02** | **Availability** | **The auction site must be available and accessible to users 99 percent of the time to ensure uninterrupted service.** |
| **TR03** | **Robustness** | **The auction site should be designed to handle errors gracefully and recover from failures to ensure uninterrupted service availability.** |
| TR04 | Compatibility | The auction site should be compatible with various hardware and software configurations, ensuring accessibility to a wide range of users, including those with older or less common hardware/software. |
| TR05 | Usability | The auction site should prioritize simplicity and ease of use, providing an intuitive user experience for both buyers and sellers. |
| TR06 | Performance | The auction site must deliver reasonably fast response times to ensure efficient user interactions without causing usability issues. |
| TR07 | Web Technologies | The auction site should be implemented using web technologies such as HTML, CSS, JavaScript, and PHP to ensure cross-browser and cross-platform compatibility. |
| TR08 | Portability | The server-side components of the auction site should be platform-independent, allowing it to function seamlessly across different hardware and software environments to accommodate potential changes and upgrades. |
| TR09 | Database | The auction site should utilize a reliable and non-redundant database system to store and manage data efficiently. |
| TR10 | Scalability | The auction site should be scalable to accommodate an increasing number of users, auction listings, and stored data as the platform grows. |
| TR11 | Compliance and Ethics | The auction site must comply with the relevant legislation of the operating region (e.g., legal requirements in Portugal) and respect user preferences and privacy to maintain ethical and lawful operation. |

The three following requirements were chosen as the most imporant ones:
- **Security**: In a service where user's funds are at stake, security is of utmost importance in maintaning a favorable and trustworthy service and ensuring compliance with privacy regulations.
- **Availabiliy**: As auctions are time-critical, maximizing the website uptime will greatly amplify user experience, providing a frictionless bidding environment.
- **Robustness**: To ensure the correct functioning of the website, and a fair auctioning experience, the website must be robust so as to not introduce errors that may cause loss of data, wrong winners, mishandling of user funds, among others.

Table 11: Auction Site Technical Requirements

### 3.3 Restrictions

#### 2.3.3. Restrictions

| **Identifier** | **Name** | **Description** |
| -------------- | -------- | --------------- |
| R01 | Deadline | The system should be fully operational and available for use by the conclusion of the semester. |
| R02 | Database | The database should utilize PostgreSQL. |

Table 12: DibsOnBids restrictions


## A3: Information Architecture

### 1. Sitemap

### 2.4.2 Site Structure

The structure diagram below outlines the pages and their accessibility within our auction site, detailing how users can navigate and interact with the platform.

![sitemapDibsOnBids](uploads/b82a9cbce5ec5d70c4af2f4369da8687/sitemapDibsOnBids.png)

Figure 1: Auction Site Sitemap

This schematic representation provides a clear overview of the site's organization, helping users understand the layout and flow of our auction platform.

### 2. Wireframes

The wireframes presented below depict the layout and placement of essential interactive components within our auction site. While the home page holds paramount importance, we have also designed wireframes for the profile page and groups page to ensure usability and clarity in these key sections.

#### UI01: Home Page

![image](uploads/c9fce8216e3534bfe18bef949f6c012e/image.png)

Figure 2: *DibsOnBids* HomePage

1. Menu with many options
2. Access to search feature
3. Access to trending, ending soon and sell button. 


#### UI02: Profile Page

![image](uploads/fce902f91e2492dcba00583d25d9e96d/image.png)

Figure 3: *DibsOnBids* Profile Page

1. Reset password
2. Check account e-mail
3. Log Out
4. Private Profile
5. Items bought
6. Ability to change profile picture 

## Revision history

### Artifacts: A1

#### Editor: André Relva
**September 28:** \
  Project vision, Main features, Actors \
**by:** \
  Gonçalo Matias
  André Relva
  Diogo Pintado
  Rui Silveira

### Artifacts: A2

#### Editor: Gonçalo Matias
**September 29:** \
  User Stories \
**by:** \
  Gonçalo Matias, Diogo Pintado

**September 30:** \
  Sup. Requirements, Business Rules, Technical Requirements, Restrictions \
**by:** \
  Gonçalo Matias

**October 2:**
  Thorough A2 revision and finalization \
**by:** \
  André Relva

**October 2:**
  Added actors graphic \
**by:** \
  Rui Silveira


### Artifacts: A3

#### Editor: Rui Silveira
**October 1:** \
First wireframe \
**by:** \
  Gonçalo Matias

**October 2:** \
Second wireframe \
**by:**\
  Gonçalo Matias

**October 2:** \
Added sitemap \
**by:**\
  Rui Silveira





Authors:
- André Relva    - up202108695
- Rui Silveira   - up202108878
- Gonçalo Matias - up202108703
- Diogo Pintado  - up202108875


Date: 28/09/2023