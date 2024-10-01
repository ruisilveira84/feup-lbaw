# EAP: Architecture Specification and Prototype

## A7: Web Resources Specification

This document details the proposed Web API structure, highlighting the essential resources, their specific properties, and the anticipated JSON responses. The API is intended to facilitate operations for creating, reading, updating, and potentially deleting each identified resource, if applicable.

### 1. Overview

Table 1: DibsOnBids resources overview

| Modules | Description |
| ------- | ----------- |
| M01: Authentication | Web resources associated with authenticating users in order to access the full website features. Includes user registration, login and logout. |
| M02: Users | Web resources associated with user management, be it by the user themselves, via setting up or editing a profile or by a website administrator. |
| M03: Search | Web resources related to searching for specific items, auctions, or users within the platform. May include search filters, sorting options, and result display functionalities. |
| M04: Auctions | Web resources handling auction-related functionalities, such as creating new auctions, bidding on items, monitoring ongoing auctions, and managing closed auctions. |
| M05: Comments | Web resources managing user comments on various parts of the platform, such as auction items or user profiles. May include features like posting, editing, and deleting comments. |
| M06: Messages | Web resources associated with user-to-user messaging functionalities. This module may include features like composing messages, reading received messages, and managing message history. |
| M07: Notifications | Web resources handling notifications for users. This may include functionalities such as setting notification preferences, viewing notifications, and clearing or managing notification history. |
| M08: API | Web resources providing an Application Programming Interface (API) for external integrations. This allows other applications or services to interact with DibsOnBids programmatically, enabling data exchange and integration with external systems. |

### 2. Permissions

This section delineates the permissions utilized within the previous section (modules) to establish the access conditions for resources.

| Identifier | Name | Description |
| ---------- | ---- | ----------- |
| PUB | Public | Unauthenticated users |
| USR | User | A registered user that's not banned and successfully authenticated. |
| AUC | Auctioneer | Any authenticated user currently in charge of an auction. |
| BID | Bidder | Any authenticated user currently budding in an active auction. | 
| ADM | Admin | A registered user with special site management privileges that's successfully authenticated. |

Table 2: DibsOnBids permissions

### 3. OpenAPI Specification

```yaml
openapi: 3.0.0

info:
  version: '1.0'
  title: 'LBAW DibsOnBids Web API'
  description: 'Web Resources Specification (A7) for DibsOnBids'

servers:
- url: http://lbaw2332.fe.up.pt
  description: Production server

externalDocs:
  description: Find more info here.
  url: https://git.fe.up.pt/lbaw/lbaw2324/lbaw2332/-/wikis/eap

tags:
  - name: 'M01: Authentication'
  - name: 'M02: Users'
  - name: 'M03: Search'
  - name: 'M04: Auctions'
  - name: 'M05: Comments'
  - name: 'M06: Messages'
  - name: 'M07: Notifications'
  - name: 'M08: API'

paths:
  /login:
    get:
      operationId: R101
      summary: 'R101: Login Form'
      description: 'Website login page. (PUB)'
      tags:
        - 'M01: Authentication'
      responses:
        '200':
          description: 'OK. Show page.'
    post:
      operationId: R102
      summary: 'R102: Login Action'
      description: 'Forward the login form to the backend. (PUB)'
      tags:
        - 'M01: Authentication'
        
      requestBody:
        required: true
        content:
          applicaton/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                email:
                  type: string
                password:
                  type: string
              required:
                - email
                - password
                
      responses:
        '200':
          description: 'Redirect after successful autentication.'
          headers:
            Location:
              schema:
                type: string
              examples:
                200Example:
                  description: 'Autentication successful. Redirecting to home page.'
                  value: '/home'
        '401':
          description: 'Authentication failed.'
  /logout:
    post:
      operationId: R103
      summary: 'R103: Logout Action'
      description: 'Log out the current user if authenticated. (USR;ADM)'
      tags:
        - 'M01: Authentication'
        
      responses:
        '200':
          description: 'Redirect after successful logout.'
          headers:
            Location:
              schema:
                type: string
              examples:
                200Home:
                  description: 'Sucessful logout. Redirecting to home page.'
                  value: '/home'
                200Login:
                  description: 'Sucessful logout. Redirecting to login form.'
        '401':
          description: 'Logout failed. User not logged in.'
  
  /register:
    get:
      operationId: R104
      summary: 'R104: Register Form'
      description: 'Retrieve user registration from from server. (PUB)'
      tags:
        - 'M01: Authentication'
        
      responses:
        '200':
          description: 'OK. Show page.'
    
    post:
      operationId: R105
      summary: 'R105: Register Action'
      description: 'Process user registration form. (PUB)'
      tags:
        - 'M01: Authentication'
      
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                username:
                  type: string
                email:
                  type: string
                passsword:
                  type: string
              required:
                - username
                - email
                - password

      responses:
        '200':
          description: 'Redirect after successful registration.'
          headers:
            Location:
              schema:
                type: string
              examples:
                200Example:
                  description: 'Successful registration. Redirecting to home page'
                  value: '/home'
        '401':
          description: 'Registration failed.'
  
  /users/{username}:
    get:
      operationId: R106
      summary: 'R106: View user profile'
      description: 'Show public user profile. (PUB)'
      tags:
        - 'M02: Users'

      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true

      responses:
        '200':
          description: 'OK. Show the user profile.'
        '401':
          description: 'User profile is private.'
    
  /search/{query}:
    get:
      operationId: R107
      summary: 'R107: Search for auctions/items. (PUB)'
      tags:
        - 'M03: Search'

      parameters:
        - in: path
          name: query
          schema:
            type: string
          required: true

      responses:
        '200':
          description: 'OK. Display results matching query.'
        '404':
          description: 'Auctions/items not found.'
    
  /auction/{id}:
    get:
      operationId: R108
      summary: 'R108: Display auction. (PUB)'
      tags:
        - 'M04: Auctions'

      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
      
      responses:
        '200':
          description: 'OK. Display auction.'
        '404':
          description: 'Auction corrresponding to given ID not found.'
  
  /auction/{id}#comments:
    get:
      operationId: R109
      summary: 'R109: Display auction comments. (PUB)'
      tags:
        - 'M04: Auctions'
        - 'M05: Comments'

      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
      
      responses:
        '200':
          description: 'OK. Display comments.'
        '404':
          description: 'Comments cooresponding to given auction not found.'

  /messages:
    post:
      operationId: R110
      summary: 'Display messages for currently logged-in user. (USR)'
      tags:
        - 'M02: Users'
        - 'M06: Messages'
      
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                id:
                  type: integer
              required:
                - id
      
      responses:
        '200':
          description: 'OK. Show mesages page.'
        '401':
          description: 'Not logged in as the given user.'

  /notifications:
    post:
      operationId: R111
      summary: 'Display notifications for currently logged-in user. (USR)'
      tags:
        - 'M02: Users'
        - 'M07: Notifications'
      
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                id:
                  type: integer
              required:
                - id
      
      responses:
        '200':
          description: 'OK. Show notifcations page.'
        '401':
          description: 'Not logged in as the given user.'
```

## A8: Vertical Prototype for DibsonBids Auction Platform

The Vertical Prototype for DibsonBids Auction Platform includes the implementation of the features marked as necessary in the common and theme requirements documents. By this information, we implemented all the user stories with priority high related to auction functionality, as detailed in the sections below.

The objective of this artifact is to validate the architecture designed for the auction platform and for us to gain practical experience with the technologies used in the project.

The prototype includes the implementation of auction-specific features such as viewing auction listings (home, profile, admin, and search pages), bidding, adding, editing, and removing auction listings...

## 1. Implemented Features for DibsonBids

### 1.1. Implemented User Stories

<table>
<tr>
    <td><strong>User Story</strong></td>
    <td><strong>Name</strong></td>
    <td><strong>Priority</strong></td>
    <td><strong>Description</strong></td>
</tr>
<tr>
    <td>US01</td>
    <td>See Home Page</td>
    <td>high</td>
    <td>As a visitor, I wish to view the main page to begin exploring the website.</td>
</tr>
<tr>
    <td>US02</td>
    <td>View Public Profiles</td>
    <td>high</td>
    <td>As a User, I want to be able to view public profiles so that I can see their posts and information.</td>
</tr>
<tr>
    <td>US03</td>
    <td>Sign-up</td>
    <td>high</td>
    <td>
    As a _Visitor_, I want to register myself into the system, so that I can authenticate myself into the system
    </td>
</tr>
<tr>
    <td>US04</td>
    <td>Sign-in</td>
    <td>high</td>
    <td>
    As a _Visitor_, I want to authenticate into the system, so that I can access privileged information
    </td>
</tr>
<tr>
    <td>US5</td>
    <td>Sign-out</td>
    <td>high</td>
    <td>
    As an _Authenticated User_, I want to sign out, so that I am not logged in anymore.
    </td>
</tr>
<tr>
    <td>US6</td>
    <td>Edit post</td>
    <td>high</td>
    <td>
    As a _Post Author_, I want to edit my post, so that I can correct a mistake I made.
    </td>
</tr>
<tr>
    <td>US7</td>
    <td>Delete post</td>
    <td>high</td>
    <td>
    As a _Post Author_, I want to delete a post, so that I can remove something that I put by mistake.
    </td>
</tr>
</table>




Table 64: Vertical Prototype implemented user stories

### 1.2. Implemented Web Resources

#### Module M01: Authentication

<table>
<tr>
<td>

**Web Resource Reference**
</td>
<td>

**URL**
</td>
</tr>
<tr>
<td>R101: Login Form</td>
<td>

GET 
</td>
</tr>
<tr>
<td>R102: Login Action</td>
<td>POST /login</td>
</tr>
<tr>
<td>R103: Logout Action</td>
<td>

GET 
</td>
</tr>
<tr>
<td>R104: Register Form</td>
<td>

GET 
</td>
</tr>
<tr>
<td>R105: Register Action</td>
<td>POST /register</td>
</tr>
</table>

Table 65: Authentication implementation

## 2. Changes to database

A `remember_token` column was added to the `users` table for "Remember Me" login functionality;

## 3. Prototype

In this stage of development, our primary objective was to establish the core features of the project, ensuring functional robustness and user-centric utility. While the visual design has not been our main focus and thus remains in a basic state, it effectively demonstrates the overall layout and facilitates straightforward navigation throughout the website. This approach allows us to concentrate on fine-tuning the key functionalities, laying a solid foundation for future enhancements in aesthetics and user experience.

## Revision history

### Artifacts: A7

#### Editor: André Relva
**November 16:** \
Started \
**by:** \
Rui Silveira \

**November 21:** \
Started completing tables
**by:** \
Gonçalo Matias

**November 22:** \
Completing tables and revise \
**by:** \
Rui Silveira

**November 22:**
OpenAPI specification
**by**
André Relva

### Artifacts: A8

#### Editor: Rui Silveira
**November 19:** \
Started \
**by:** \
Rui Silveira

**November 21:** \
Started implemented features
**by:** \
Gonçalo Matias

Authors:

- André Relva - up202108695
- Rui Silveira - up202108878
- Gonçalo Matias - up202108703
- Diogo Pintado - up202108875

Date: 16/11/2023