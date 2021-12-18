# Project Name: Simple Shop
## Project Summary: This project will create a simple e-commerce site for users. 
## Github Link: https://github.com/massimochen22/IT202-001/tree/prod/public_html/Project/
## Project Board Link: https://github.com/massimochen22/IT202-001/projects/1
## Website Link: http://hc424-prod.herokuapp.com/Project/
## Demo Link: https://youtube.com/playlist?list=PL-16BBo4D0BBLB7Utt5y6MNY_ZS3gxMo_ (This link is a my YouTube playlist of 4 videos explaining each milestone feature)
## Your Name: Hao Massimo Chen

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

- Milestone 1
- [x] \(10/25/2021) User will be able to register a new account
  -  List of Evidence of Feature Completion
    - Status: Completed 
    - Direct Link: https://hc424-prod.herokuapp.com/Project/register.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/26 (this had the first version of register)
      - https://github.com/massimochen22/IT202-001/pull/40 (this has the second version of the register)
       - https://github.com/massimochen22/IT202-001/pull/53 (this is the final version of the register.php, I added the password  validation part. Password has to have at least lenght of 8 characters)
    - Screenshots
      - ![Screen Shot 2021-11-08 at 2 06 46 PM](https://user-images.githubusercontent.com/89932323/140802537-5458a44f-e386-49cc-b54d-f63400d400ed.png)![Screen Shot 2021-11-08 at 2 06 51 PM](https://user-images.githubusercontent.com/89932323/140802550-c2791174-e5c9-47ca-bcb9-aa761c10baaa.png)
        - Before and after registering an account. The screenshot shows that I have input fields that are Username, email, password, confirm password. 
      - ![Screen Shot 2021-11-08 at 2 10 43 PM](https://user-images.githubusercontent.com/89932323/140803233-1c4fb2b7-5b51-4b3a-b89e-7fa754a0b0bc.png)![Screen Shot 2021-11-08 at 2 12 04 PM](https://user-images.githubusercontent.com/89932323/140803256-b1e7e229-875b-4727-99f9-8c84243cef6d.png)
        - The two screenshots show that the program checks email and username availability
      - ![Screen Shot 2021-11-08 at 2 15 00 PM](https://user-images.githubusercontent.com/89932323/140803740-c066eb4d-e74e-4e47-ac20-b4d36004a81f.png) ![Screen Shot 2021-11-08 at 2 15 04 PM](https://user-images.githubusercontent.com/89932323/140803771-7efb99fa-9308-4c2a-bad7-029677e991e4.png)![Screen Shot 2021-11-08 at 2 17 27 PM](https://user-images.githubusercontent.com/89932323/140803883-11d976a7-edd8-4ef0-8b5e-abaf85a75c2e.png)

        -  The first two screenshots prove that at registration the password are checked if they are matching, and the third one checking if the password is at least 8 characters
      -  ![Screen Shot 2021-11-08 at 2 21 39 PM](https://user-images.githubusercontent.com/89932323/140804509-572658b1-d625-49d3-bfd9-38a32a2a8cc9.png)
         - Here I have the user table 


- [x] \(10/25/2021) User will be able to login to their account (given they enter the correct credentials)
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/login.php
    - Pull Requests
      -  https://github.com/massimochen22/IT202-001/pull/26 
    - Screenshots
       - ![Screen Shot 2021-11-08 at 2 23 49 PM](https://user-images.githubusercontent.com/89932323/140804841-13150635-1c60-4f70-b718-1231950878aa.png)
      ![Screen Shot 2021-11-08 at 2 23 54 PM](https://user-images.githubusercontent.com/89932323/140804881-7b884896-395b-4b67-9153-6e354f64ce5c.png)
          - Here I show that I can log in using the username Massimo.

- [x] \(10/25/2021)  User will be able to logout
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/logout.php
      -  https://github.com/massimochen22/IT202-001/pull/26 (this had the first version of logout)
      -  https://github.com/massimochen22/IT202-001/pull/40 (this has the final version of logout)
    - Screenshot
       -  ![Screen Shot 2021-11-08 at 2 27 36 PM](https://user-images.githubusercontent.com/89932323/140805328-77d676fe-7807-44a8-be2d-c8ded16b2156.png)
          - Here I show that I can log out, and it will have a user friendly message .

- [x] \(10/25/2021)  Basic security rules implemented
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/home.php
    - Pull Requests
      -  https://github.com/massimochen22/IT202-001/pull/40 
      -  https://github.com/massimochen22/IT202-001/pull/41 
    - Screenshots
      - ![Screen Shot 2021-11-08 at 2 30 02 PM](https://user-images.githubusercontent.com/89932323/140805762-63fc3e1a-f0d9-4439-9b9f-3ac888fec874.png) ![Screen Shot 2021-11-08 at 2 30 06 PM](https://user-images.githubusercontent.com/89932323/140805779-51b34c1b-b64c-4a42-a9f4-3256040edbda.png) 
        - The two screenshot show that if you are logged out and you want to access a page such as home.php (which you would need to login in order to see), the webpage will give you the message warning you about it.
       -  ![Screen Shot 2021-11-08 at 2 31 17 PM](https://user-images.githubusercontent.com/89932323/140806027-e329127a-134a-49d0-8144-16c63e3b6ed4.png)
           - This is the User Role table

- [x] \(11/01/2021) Basic Roles implemented
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/admin/list_roles.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/42
    - Screenshots
      - ![Screen Shot 2021-11-08 at 3 04 57 PM](https://user-images.githubusercontent.com/89932323/140810579-59e0665d-bb88-4fc0-ae77-63d6911c7603.png)![Screen Shot 2021-11-08 at 3 05 00 PM](https://user-images.githubusercontent.com/89932323/140810581-a904a161-f803-44d3-90d6-70a8179d2fe7.png)![Screen Shot 2021-11-08 at 3 05 03 PM](https://user-images.githubusercontent.com/89932323/140810583-fc8a05ac-368e-4506-af78-d8d16dbb4d36.png)![Screen Shot 2021-11-08 at 3 05 06 PM](https://user-images.githubusercontent.com/89932323/140810584-6af4f285-9fa9-498c-9727-bf3c18229cd9.png)
         - With these 4 screenshots I can show that with the admin account I can assign roles, create roles, and see the roles
      -  ![Screen Shot 2021-11-08 at 3 10 12 PM](https://user-images.githubusercontent.com/89932323/140810948-12b0e487-8d35-4440-a3e4-63228b76af3b.png)
          -   Here attached also the roles table



- [x] \(11/08/2021 of completion) Site should have basic styles/theme applied; everything should be styled
  -  List of Evidence of Feature Completion
    - Status: Completed
    - https://hc424-prod.herokuapp.com/Project/admin/profile.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/40 (the first version of style.css)
      - https://github.com/massimochen22/IT202-001/pull/53 (the final version of style.css)
    - Screenshots
      - The styling could be seen in each screenshot attached in this md file.

- [x] \(10/13/2021) Any output messages/errors should be “user friendly”
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/logout.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/28
      - https://github.com/massimochen22/IT202-001/pull/39
    - Screenshots
      - Refer to previous screenshots. They have the result of flash(). 

- [x] \(10/25/2021)  User will be able to see their profile
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/profile.php
    - Pull Requests
      -  https://github.com/massimochen22/IT202-001/pull/40 
    - Screenshots
      - ![Screen Shot 2021-11-08 at 2 44 14 PM](https://user-images.githubusercontent.com/89932323/140807525-d2882d52-b5a3-4022-ac40-a17bf12f3af6.png)
        - The screenshot shows the profile page. The user will see their username and email.

- [x] \(10/25/2021)  User will be able to edit their profile
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: https://hc424-prod.herokuapp.com/Project/profile.php
    - Pull Requests
      -  https://github.com/massimochen22/IT202-001/pull/40 
    - Screenshots
      - ![Screen Shot 2021-11-08 at 2 47 00 PM](https://user-images.githubusercontent.com/89932323/140808052-5f75dedd-8233-4998-9585-0321d6437ad7.png) ![Screen Shot 2021-11-08 at 2 48 17 PM](https://user-images.githubusercontent.com/89932323/140808065-900d37a0-7299-4eb1-8ada-a0ac805ab010.png) ![Screen Shot 2021-11-08 at 2 51 02 PM](https://user-images.githubusercontent.com/89932323/140808344-92b0cf28-5d41-48ed-8a00-e22b617894f4.png)

        - With these three screenshots I can shows that I can reset the password but doesn't let me change the email or username because they were already taken
      - ![Screen Shot 2021-11-08 at 2 53 04 PM](https://user-images.githubusercontent.com/89932323/140808692-60c51ab7-921c-4d3f-9b47-f5d00052cade.png) ![Screen Shot 2021-11-08 at 2 53 17 PM](https://user-images.githubusercontent.com/89932323/140808749-cf2d3c68-abf8-435b-af0b-1bb91cd72e71.png) ![Screen Shot 2021-11-08 at 2 53 32 PM](https://user-images.githubusercontent.com/89932323/140808751-ce771db6-56a5-41d0-8372-500542e3723c.png)
         -  I can change the fields if the the fields are not taken already
      -  ![Screen Shot 2021-11-08 at 2 55 34 PM](https://user-images.githubusercontent.com/89932323/140808929-170631eb-ce0b-4a33-a32d-648bad78f86c.png)
          -  It also checks if the password is too short if you want to reset the password

  
- Milestone 2
- [x] \(11/20/2021) User with an admin role or shop owner role will be able to add products to inventory
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/81
    - Screenshots
      - ![Screen Shot 2021-11-29 at 11 47 29 AM](https://user-images.githubusercontent.com/89932323/143909154-2e542c6a-41cc-4121-895f-ede88b7a0f59.png)
        - This screenshot shows that I have an add item page for admins
      - ![Screen Shot 2021-11-29 at 11 47 49 AM](https://user-images.githubusercontent.com/89932323/143909386-f335e8a7-7e1b-43b1-9526-38c72ad996c8.png)
        -  This screenshot shows that I have a Product table in my server 


- [x] \(11/26/2021) Any user will be able to see products with visibility = true on the Shop page
  -  List of Evidence of Feature Completion
    - Status: Completed 
    - Direct Link: https://hc424-prod.herokuapp.com/Project/shop.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/86
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 18 52 PM](https://user-images.githubusercontent.com/89932323/143913509-94829d2b-3567-4234-b13b-400d35669ea3.png)
        - With this screenshot I show that the product page is visible without login
      - ![Screen Shot 2021-11-29 at 12 21 25 PM](https://user-images.githubusercontent.com/89932323/143913909-ef823a70-1a2b-49af-986c-24b23e7726b2.png)
        - shows the bar at the top that are used for sorting by category, partial match. In this example I searched the category of tech it also show that it will be sorted by price. In this screenshot is set as ascending order (price).

- [x] \(11/20/2021) Admin/Shop owner will be able to see products with any visibility
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/81
    - Screenshots
      - ![Screen Shot 2021-11-29 at 11 55 39 AM](https://user-images.githubusercontent.com/89932323/143910490-3da88e22-3682-413e-a807-a350d08db8d4.png)
        - With this screenshot I show that I have a page just for admins or shop owners to see products with any visibility. From the screenshot of the bullet point above (the product Table) we can see that the visibility of phone is -1 but it is still visible in this admin page.


- [x] \(11/20/2021) Admin/Shop owner will be able to edit any product
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/admin/edit_item.php?id=1
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/81
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 01 51 PM](https://user-images.githubusercontent.com/89932323/143911035-0407769d-bee8-447e-a662-b121b1b1af97.png)
        - from this screenshot we can see that the admin can modify the details of the specific product when clicking edit in the page list_item.php

- [x] \(11/26/2021) User will be able to click an item from a list and view a full page with more info about the item (Product Details Page)
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/product_info.php?id=3
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/86
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 25 04 PM](https://user-images.githubusercontent.com/89932323/143914412-644b94cb-d334-4068-a9cb-d8b1ff1f8cc9.png)
        - When I click more info it will open a new page with more info of the product 
        
- [x] \(11/28/2021) User must be logged in for any Cart related activity below
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/shop.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/93
      - https://github.com/massimochen22/IT202-001/pull/95
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 35 54 PM](https://user-images.githubusercontent.com/89932323/143915999-8c899488-5e07-4707-99f9-320c1538730c.png)
        - From what we can see from the previous screenshot, when we are not logged in, the shopping cart is not visible, but when you are logged in you can see it in the nav bar.

 - [x] \(11/28/2021)User will be able to add items to Cart
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/cart.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/93
      - https://github.com/massimochen22/IT202-001/pull/95
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 38 35 PM](https://user-images.githubusercontent.com/89932323/143916460-3f2f0e96-831a-4754-b84c-c897fb6f4aac.png)
      - ![Screen Shot 2021-11-29 at 12 38 41 PM](https://user-images.githubusercontent.com/89932323/143916478-8f52dbf0-62e5-458f-9cd7-1918e33b3415.png)
      - ![Screen Shot 2021-11-29 at 12 38 57 PM](https://user-images.githubusercontent.com/89932323/143916494-a7be39ad-9599-4479-ab59-cfb2c89e3c79.png)
       - These three screenshots will show that my adding feature works, and it will add those items in my customer_cart table


- [x] \(11/28/2021)User will be able to see their cart
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/cart.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/93
      - https://github.com/massimochen22/IT202-001/pull/95
    - Screenshots
        - Refer to the previous screenshot. It shows that user can access and see their cart. It list items, subtotal, total cart value
        - ![Screen Shot 2021-11-29 at 12 47 25 PM](https://user-images.githubusercontent.com/89932323/143917556-ba2ba5a3-1b6d-4861-aced-1d66dac89d6a.png)
          -  From this screenshot you can see the detail page after the user click more info in the shopping cart


- [x] \(11/28/2021) User will be able to change quantity of items in their cart
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/cart.php
    - Pull Requests
     - https://github.com/massimochen22/IT202-001/pull/93
     - https://github.com/massimochen22/IT202-001/pull/95
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 48 47 PM](https://user-images.githubusercontent.com/89932323/143917764-40f3b48f-1ac0-4bba-88b2-552450f0bb3a.png)
        - In this step I changed the quantity to 1 and all the values update themselves
      - ![Screen Shot 2021-11-29 at 12 56 16 PM](https://user-images.githubusercontent.com/89932323/143918824-9a7165f3-89df-4e5b-a628-53c0bff6b71b.png)
      - ![Screen Shot 2021-11-29 at 12 56 20 PM](https://user-images.githubusercontent.com/89932323/143918869-15a3570b-ccc0-485f-875b-9e8e7a2c1825.png)
        -  Here I have before and after setting the quantity to 0. It will remove the item from the cart. 


- [x] \(11/28/2021)User will be able to remove a single item from their cart vai button click
  -  List of Evidence of Feature Completion
    - Status:Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/cart.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/93
      - https://github.com/massimochen22/IT202-001/pull/95
    - Screenshots
      - ![Screen Shot 2021-11-29 at 12 54 04 PM](https://user-images.githubusercontent.com/89932323/143918594-7f010270-090a-4235-a3be-1f464ede3f39.png)
      - ![Screen Shot 2021-11-29 at 12 54 08 PM](https://user-images.githubusercontent.com/89932323/143918608-4ba1149f-d5b0-45cd-a675-5a15567062f6.png)
        - Here I try to show before and after removing one single item with the remove button

- [x] \(11/28/2021) User will be able to clear their entire cart via a button click
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/cart.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/93
      - https://github.com/massimochen22/IT202-001/pull/95
    - Screenshots
      - ![Screen Shot 2021-11-29 at 1 06 48 PM](https://user-images.githubusercontent.com/89932323/143920147-94cdb5ec-1b81-45ee-ac1d-514cd0dfeeac.png)
      - ![Screen Shot 2021-11-29 at 1 06 51 PM](https://user-images.githubusercontent.com/89932323/143920155-d8dc05c7-8b60-4f0d-8ba1-7b0c631adb70.png)
        - The two screenshots are showing before and after clicking clear cart
               
- Milestone 3
- [x] \(12/07/2021) User will be able to purchase items in their Cart
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/cart.php
    -  Direct Link: https://hc424-prod.herokuapp.com/Project/OrderConfirmation.php?Checkout=Check+Out
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/109
    - Screenshots
      - ![Screen Shot 2021-12-08 at 6 23 22 PM](https://user-images.githubusercontent.com/89932323/145307276-008e6073-4ef7-4fcf-bc6f-4942a45e7252.png)
        - From this picture you can see the checkout button in your cart page
      -  ![Screen Shot 2021-12-08 at 6 23 28 PM](https://user-images.githubusercontent.com/89932323/145307340-0902ecea-88c6-4f7a-9ba4-805e545334c1.png)
         -  From this screenshot we can see that the confirmation page has the form where users can input their information, and also the payment methods are listed there.
      -  ![Screen Shot 2021-12-08 at 6 23 58 PM](https://user-images.githubusercontent.com/89932323/145307487-cd34f0b2-8d91-4e97-8f79-d676a9d92f7c.png)
          - With this screenshot I show that in order to submit the form, the user has to write the correct total $
      - ![Screen Shot 2021-12-08 at 6 40 17 PM](https://user-images.githubusercontent.com/89932323/145308511-98ee9196-354e-426e-98b5-708ae09bc27a.png)
          - With this screenshot, you can see that when I checkout a larger amount of quantity than the total stock, I will be redirected to the cart page asking me to update the quantity.
      - ![Screen Shot 2021-12-08 at 6 42 08 PM](https://user-images.githubusercontent.com/89932323/145308787-ff3c7198-bf4f-4757-8a28-c0e2d1b95e17.png)
       ![Screen Shot 2021-12-08 at 6 42 45 PM](https://user-images.githubusercontent.com/89932323/145308796-6779998b-5608-437e-8fa8-884f83de27c7.png)
       ![Screen Shot 2021-12-08 at 6 43 07 PM](https://user-images.githubusercontent.com/89932323/145308821-9bb16ac5-0d6b-4a2f-bdcc-111108768cd2.png)
           -  With these three screenshots I show that my product table updates once I checkout the item.






- [x] \(12/07/2021) Order Confirmation Page
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/confirmationPage.php
      - https://github.com/massimochen22/IT202-001/pull/111
    - Screenshots
      - ![Screen Shot 2021-12-08 at 6 47 19 PM](https://user-images.githubusercontent.com/89932323/145309148-ec6d667d-d78c-4134-a9c8-21eeca6bed89.png)
        - This screenshot shows the thank you message and the details for my order.

- [x] \(12/07/2021) User will be able to see their Purchase History
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/history.php
    - Direct Link: https://hc424-prod.herokuapp.com/Project/order_info.php?id=57
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/112
    - Screenshots
      - ![Screen Shot 2021-12-08 at 6 48 32 PM](https://user-images.githubusercontent.com/89932323/145309415-a75a3fa4-8584-4b39-8606-0bfed651166f.png)
        - I show that the user can see the what he/she purchased
      - ![Screen Shot 2021-12-08 at 6 51 26 PM](https://user-images.githubusercontent.com/89932323/145309812-151e69c1-3507-4d54-9297-af13dffb5ccb.png)
        - when you click the order number it will bring you to a order info page with all the details about the order

- [x] \(12/07/2021) Store Owner will be able to see all Purchase History
  -  List of Evidence of Feature Completion
    - Status:Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/admin/transactions.php
    - Direct Link: https://hc424-prod.herokuapp.com/Project/order_info.php?id=56
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/113
      - https://github.com/massimochen22/IT202-001/pull/117
    - Screenshots
      - ![Screen Shot 2021-12-08 at 6 57 55 PM](https://user-images.githubusercontent.com/89932323/145310109-3c3dfeb8-f187-4747-ada8-5ea14b68ff54.png)
        - This is the page of all orders that only admins or store owner can see. 
      - ![Screen Shot 2021-12-08 at 6 51 26 PM](https://user-images.githubusercontent.com/89932323/145310181-007eab23-d59b-41b4-9645-cbf9f5e17e8d.png)
        - This is the detail page that you can access by clicking the order number. 
- Milestone 4
- [x] 12/15/2021 User can set their profile to be public or private (will need another column in Users table) 
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/profile.php?id=12
    - Pull Requests
      - Direct Link: https://github.com/massimochen22/IT202-001/pull/121
      - Direct Link: https://github.com/massimochen22/IT202-001/pull/124
        -  In this pull request I updated the requirements for accessibility public and private...In the previous pull request I didn't really understand the requirement because I was absent that day
    - Screenshots
      - ![Screen Shot 2021-12-17 at 1 47 53 PM](https://user-images.githubusercontent.com/89932323/146593371-67577b8e-aed2-4101-b6ed-0f9b8e01913c.png) ![Screen Shot 2021-12-17 at 1 49 21 PM](https://user-images.githubusercontent.com/89932323/146593482-98bcc3fe-24ec-43fb-ae74-6172cb54bf4e.png)
        - Here I show that I can edit my profile and I can put public or private
      - ![Screen Shot 2021-12-17 at 1 48 04 PM](https://user-images.githubusercontent.com/89932323/146593547-98ebc12d-d158-4841-9341-b737c7f71be6.png) 
        -  Here I show that each username is linked to their profile. If it is private it won't show the infos.


- [x] \(12/15/2021)User will be able to rate a product they purchased
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/product_info.php?id=5
    - Pull Requests
      - Direct Link: https://github.com/massimochen22/IT202-001/pull/124
      - Direct Link: https://github.com/massimochen22/IT202-001/pull/149
        - I previously didn't have pagination for the ratings, with pull request 149 I do now.
    - Screenshots
      - ![Screen Shot 2021-12-17 at 1 48 04 PM](https://user-images.githubusercontent.com/89932323/146593547-98ebc12d-d158-4841-9341-b737c7f71be6.png) 
        - Here I show that users can review the product
      - ![Screen Shot 2021-12-17 at 1 55 02 PM](https://user-images.githubusercontent.com/89932323/146594111-b4ad7dec-29e2-4951-a482-39eed63370f2.png)
        - Here I show that you can post a review for the product
      - ![Screen Shot 2021-12-17 at 1 54 21 PM](https://user-images.githubusercontent.com/89932323/146594159-524cddc7-66ff-43f6-be64-1355a41e7318.png)
        - This is the data in my table for the ratings

- [x] 12/15/2021 User’s Purchase History Changes
  -  List of Evidence of Feature Completion
    - Status: Completed 
    - Direct Link: https://hc424-prod.herokuapp.com/Project/history.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/126
    - Comment: The edits for the Milestone 4 feature are mainly in history.php, but I also added the file pagination.php and in the functions paginate(). Other files are just handling bootstrap styles
    - Screenshots
      - ![Screen Shot 2021-12-17 at 2 01 22 PM](https://user-images.githubusercontent.com/89932323/146594878-014ed088-180e-4db7-a563-ea9e281e63b4.png)
        - Here I show my purchase history with all the filters and pagination

- [x] 12/15/2021 Store Owner Purchase History Changes
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/admin/transactions.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/129
    - Screenshots
      - ![Screen Shot 2021-12-17 at 2 04 20 PM](https://user-images.githubusercontent.com/89932323/146595197-a71dcb99-c988-4f45-9f93-6168b60f1c7d.png)
        - Here I show that owner can see all the transactions, and also have filter and pagination

- [x] 12/16/2021 Add pagination to Shop Page
  -  List of Evidence of Feature Completion
    - Status:Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/shop.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/133
    - Screenshots
      - ![Screen Shot 2021-12-17 at 2 07 49 PM](https://user-images.githubusercontent.com/89932323/146595594-9c3458a2-ff16-4a42-ab32-3f0ab9aaae24.png)
        - Here I show that I have pagination in my shop page

- [x] 12/16/2021 Store Owner will be able to see all products out of stock
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/admin/list_item.php?itemName=
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/140
    - Screenshots
      - ![Screen Shot 2021-12-17 at 2 10 38 PM](https://user-images.githubusercontent.com/89932323/146595927-c58ee5f9-d5cf-4b66-a0be-74202e7cb4ef.png)
        - Here the owner can use the out of stock filter. I also added pagination

- [x] 12/17/2021 User can sort products by average rating on the Shop Page
  -  List of Evidence of Feature Completion
    - Status: Completed
    - Direct Link: https://hc424-prod.herokuapp.com/Project/shop.php
    - Pull Requests
      - https://github.com/massimochen22/IT202-001/pull/146
      - https://github.com/massimochen22/IT202-001/pull/152
    - Screenshots
      - ![Screen Shot 2021-12-17 at 2 31 54 PM](https://user-images.githubusercontent.com/89932323/146598129-bdd63883-ddcb-4325-b537-ca392c1a822c.png)
        - Here I show that my shop page now can be filtered either by cost or avg rating and it also shows the avg rating in each product section
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board
