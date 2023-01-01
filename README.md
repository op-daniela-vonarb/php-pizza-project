# php-pizza-project

I started this project using procedural PHP and wanted to combine what I learned in several tutorials in one project.

As a user you can see a page of pizza listings. If you click on a listing, you can see the details of that listing. If you have an account, you can add and delete listings.
The page has signup, login and logut functionality.

After I got all the features working, I started refactoring my code into oop php.

## Comments
#### - main branch: procedural PHP version
#### - oop branch: OOP PHP version
#### - My very first PHP project :-) So it's probably a bit messy
#### - Files that I haven't refactored yet and can be ignored for this review:

- add.php
- details.php

#### - login.php and signup.php forms and error handling are not consistent yet because I used different tutorials. I will do this at a later stage.
#### - Form validation is very basic at this stage

####

###

## Questions

### 1. Does my file structure make sense?
**Classes**:
- DBH class connects to the database
- FILENAME.class.php = Models -> read from and write to the database
- FILENAME-contr.class.php = Controllers -> constructors

**includes**
- helper files -> instantiate classes

**partials**
- header and footer that show on every page


### 2. Does it make sense to have a signup-validator.class.php?

I started without the validator class. After watching a tutorial on how to create a validation class, I wanted to try implementing it. But I struggled ;-)

At first I only had the following files:
- signup.class.php
- signup-contr.php
- login.class.php
- login-contr.php

The controllers handled  the form validation. And in the includes folder, I had the following files:
- login.inc.php
- singup.inc.php

These files instantiated the classes and run error handlers and handled  the signup/login.

I could then use these include files in the pages **login.php** and **signup.php** and call them in the form action:

- < form action="includes/login.inc.php" method="post" >

This all worked great. But then I tried to implement the validator class. **So far I've only created a validator class for the signup. The login files remain unchanged**.

### 3. Is it bad practice to instantiate a class in a page?

I tried to keep the includes files (signup.in.php and signup-validator.inc.php in the includes folder) but it didn't work because the form in signup.php only allows one action attribute.
I couldn't find a way around this so I decided to instantiate the classes directly in signup.php. Is there another way to do this?

### 4. Why can't the SignupValidator class not extend SignupContr or Signup?

There is a function **(checkUser)** in signup.class.php that I wanted to access from signup-validator.class.php because it's part of the error validation.
But I got an error saying **"extended class not found"**. I spent a long time trying to figure out why but I couldn't find the solution. So for now I kept the validation function **uidTakenCheck** in signup-contr.class.php.

### 5. In case it's good practise to have a validator class, do I have to create a seperate one for login? Or is it possible to create a validator class that can be reused?


## Raj Notes

* This work is really good start and frontend UI look and feel is simple and clean.
* Using PDO and prepare statement is best practice, its stop any SQL injection
* Sign-up validator class seem to be written nicely for easy unit testing.


### 1. Does my file structure make sense? - This structure is ok for small size project and little bit outdate.

Better folder structure would be:

+ config # Configuration files would go here 
  + config.php 
+ src # This will be main folder with all project
  + Controller
    + login-contr
    + pizzas-contr
    + ...
  + Entity/Model
    + users
    + pizzas
    + ...
  + Helper
    + auth-helper
  + Interface
+ public # This will be document root of the project
  + index.php
  + login.php
  + detials.php
  + ....

### 2. Does it make sense to have a signup-validator.class.php? 
Yes this is good way to create validator class

### 3. Is it bad practice to instantiate a class in a page?
No, We should instantiate class especial controller class.

### 4. Why can't the SignupValidator class not extend SignupContr or Signup?
Inheritance(extend) should only be used where classes can have logical parent-child relation. Here ideal validator should be instantiate in the controller class.

### 5. In case it's good practise to have a validator class, do I have to create a seperate one for login? Or is it possible to create a validator class that can be reused?
Yes we can by using combination of interface and classes.

## My suggestion 
1. Way Inheritance(extend) used was not correct, so I have done bit of refactor login & pizzas classes.
2. Database class ideal should instantiate once. we need use static methods to achive it.
3. Controller class/View should not have any interaction with DB directly(No SQL)
4. Avoid having DB connection config in the class
