# Coding Task

I have done this task  using Laravel5.3. I named the clients as employees here. I generated the Laravel's auth 
scaffold for the views and using the deafult bootstrap and laravel's style as a stylesheet. At First i analyse and divide
smaller tasks and then i did  the task.

## Quick Demo
 - [Screencast on Youtube](https://www.youtube.com/watch?v=zpEFaA-yubg)
 - [On Heroku App](http://radiant-brook-67898.herokuapp.com/public/index.php/employees)

## Some of the Created Files for task
 -  Routes are define inside routes/web.php
 -  EmployeeController is in laravel's default controllers directory
 -  EmployeeRepository is inside of app/Repositories
 -  For the csv data storage file can be seen inside of storage/app/employees/file.csv
 -  For the master view i used layouts/app.blade.php and for the views can be see inside of views/employees directory

 ## Code Climate Link
  - [https://codeclimate.com/github/madhusudhan1234/coding-task](https://codeclimate.com/github/madhusudhan1234/coding-task)
   
## Some Extra Packages Used
- For the Client Side Validation
   I am using Jquery Validate Package [http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js](http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js). 
- For the Pagination of Table
   I am using Jquery Datatable [https://datatables.net/](https://datatables.net/)
- For Icons 
   I am using ionic fonts [http://ionicons.com/](http://ionicons.com/)
   
## How to Run this ?
 - Clone the project to your computer by running the command "git clone https://github.com/madhusudhan1234/coding-task.git"
 - Rename .env.example file into .env and add your loggly token
 - Run commands "npm install" and then "npm install gulp"
 - Go up to your project directory from command line and run the command "php artisan serve" or "php artisan serve --port your-port"
 - Go to your browser and type in the URL "localhost:8000" or "localhost:your-port"
 -  Then, hopefully you may be good to go

   
## Official Documentation 

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

##Logging Of the Application

For Logging I used the loggly.com for the cloud based logging. And Laravel's LoggerInterface and monolog library 
i used.

![alt tag](https://madhusudhansubedi.files.wordpress.com/2016/10/logging.png)

## Some References

 -  [https://jqueryvalidation.org/](https://jqueryvalidation.org/)
 -  [http://php.net/manual/en/function.fputcsv.php](http://php.net/manual/en/function.fputcsv.php)
 -  [http://php.net/manual/en/function.fgetcsv.php](http://php.net/manual/en/function.fgetcsv.php)
 - [https://blog.yipl.com.np/logging-with-loggly-in-laravel-9479516b5c82#.nhjcnfphv](https://blog.yipl.com.np/logging-with-loggly-in-laravel-9479516b5c82#.nhjcnfphv)
 - [https://mattstauffer.co/blog/installing-a-laravel-app-on-heroku](https://mattstauffer.co/blog/installing-a-laravel-app-on-heroku)
 - [http://marcelpociot.com/blog/2016-03-21-laravel-testtools](http://marcelpociot.com/blog/2016-03-21-laravel-testtools)
 - [https://devcenter.heroku.com/articles/logging#log-retrieval](https://devcenter.heroku.com/articles/logging#log-retrieval)