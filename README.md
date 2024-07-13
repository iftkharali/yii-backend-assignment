Yii Web Programming Framework - Assement with Yii 1.1
=============================

> Get the repo from https://github.com/iftkharali/yii-backend-assignment

INSTALLATION
------------

Extract the repo inside any of your folders, and navigate to "yii-assignment"  folder, as this is the original project that contains the task

- Run migration by running this command "php protected/php yiic migrate"
- After running the migration run the by running this command "php -S localhost:8080"
- Your application would start serving successfully,  then just signup with an account, as the new users are not-varfiied, so they can not 
   perform any operations on blog posts
- Change the user varfiied status manuely and check the blog posting, editing, updating, with "ajax based real time like functionality". 
- Email existed is also implemented on the signup via ajax real time without refresh 



Functionalities:
-----------------

- User signup and login with valid token (token is being saved in the database)
- Email duplication check is implemented via ajax to update real time if a user is adding the same email for account creation 
- A varified user can perform CURD operations on the post.
- A user can edit, update, or delete only its own blog posts, he/she would not have the access to delete any others post, but he can read and like 
  others posts. 
- Post like functionality is also done via ajax and with likes count implementation on real time. 
- Designing is implemented by Bootstrap everywhere.


Thank you





