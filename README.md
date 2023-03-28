# Level 4 Task 4 -Form validation in PHP

## Task 1

Create a multi-page form-handling PHP script that parses an HTML form with the following user data and constraints. 

The validator should consist of two files:

An HTML file with the form and a PHP file with the validation code.

● Email (valid email address)

● Username (6-10 characters; alphanumeric only)

● Password (at least one lowercase letter, one uppercase letter, and one number)

● Date of birth (after 1900, and before 2020)

● Gender (either “male”, “female”, or “other”)

● Address (multiple lines)

Your script should display an appropriate error message if the user enters bad input. It should not re-render the form. You may use a combination of HTML form constraints (mentioned in the previous task) and PHP form validation.

## Task 2

● Extend Compulsory Task 1 to be a single page form-handling script.

● If the user enters bad input, your script should display an error message and repopulate the form so that the user can change their entered data.

● Note that the Password field should be exempt from repopulation. It should always be blank on every form render. This is standard practice in web development and ensures users that their passwords aren’t being stored unnecessarily.
