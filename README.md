# php-pizza-project

I started this project using procedural PHP and wanted to combine what I learned in several tutorials in one project.

As a user you can see a page of pizza listings. If you click on a listing, you can see the details of that listing. If you have an account, you can add and delete listings.
The page has signup, login and logut functionality.

After I got all the features working, I started refactoring my code into oop php.

## Comments
#### - My very first PHP project :-) So it's probably a bit messy

#### - login.php and signup.php forms and error handling are not consistent yet because I used different tutorials. I will do this at a later stage.
#### - Form validation is very basic at this stage

## Questions

### 1. Does my file structure make sense?
**Classes**:
- DBH class connects to the database
- FILENAME.class.php = Models -> talk to the database
- FILENAME-contr.class.php = Controllers -> handle user input -> talk to the Model class
- FILENAME-view.class.php = Views -> show the data from the database on the website -> talk to the Controller class

**includes**
- helper files -> instantiate classes -> user gets send to these files once they submit the forms

**partials**
- header and footer that show on every page


### 2. Does it make sense to have a signup-validator.class.php?

I started without the validator class. After watching a tutorial on how to create a validation class, I wanted to try implementing it.

At first I only had the following files:
- signup.class.php
- signup-contr.php
- login.class.php
- login-contr.php

The controllers handled  the form validation. And in the includes folder, I had the following files:
- login.inc.php
- singup.inc.php

These files instantiated the classes and ran error handlers and handled the signup/login.

I could then use these include files in the pages **login.php** and **signup.php** and call them in the form action:

- < form action="includes/login.inc.php" method="post" >

This all worked great. But then I tried to implement the validator class. **So far I've only created a validator class for the signup. The login files remain unchanged**.

### 3. Is it bad practice to instantiate a class in a page?

I tried to keep the includes files (signup.in.php and signup-validator.inc.php in the includes folder) but it didn't work because the form in signup.php only allows one action attribute.
I couldn't find a way around this so I decided to instantiate the classes directly in signup.php. Is there another way to do this?

### 4. In case it's good practise to have a validator class, do I have to create a seperate one for login? Or is it possible to create a validator class that can be reused?




 


