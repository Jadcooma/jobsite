## About

Simple job publication site to demonstrate what I've learned so far in the PHP Laravel 8 Framework thanks to Laracasts. <br>
The frontend is build with Blade templates and styled with Tailwind CSS, both were also new to me.

## Features

* **Jobs** are published for a Company and located in a City
* **Registration/Login** Try to register yourself with username 'admin' and see what happens ;)
* **Guests** can view all jobs and try to login
* **Users** can't really do anything special (yet!)
* **Admin** can manage Jobs, Companies and Cities

## Installation

After cloning this repo, please run the following in your terminal: <br>
<code> php artisan migrate --seed </code> <br>
This will execute the migrations in the database/migrations folder and seed the database with some dummy data.<br>
Afterwards, you can login as 'admin' with password 'admin' to gain access to the CRUD operations through the links in the navbar.<br>
