# Project Name: Simple Shop
## Project Summary: This project will create a simple e-commerce site for users. 
## Github Link: https://github.com/massimochen22/IT202-001/tree/prod/public_html/Project/
## Project Board Link: https://github.com/massimochen22/IT202-001/projects/1
## Website Link: http://hc424-prod.herokuapp.com/Project/
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
- Milestone 3
- Milestone 4
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
