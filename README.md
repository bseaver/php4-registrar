# Getting Started with PHP

#### Epicodus PHP Week 4 Lab, 2/28/2017

#### By Stella Huayhuaca, Benjamin T. Seaver

## Description

This lab is about experimenting with many to many SQL relationships.

## Setup/Installation Requirements
* See https://secure.php.net/ for details on installing _PHP_.  Note: PHP is typically already installed on Mac.
* See https://getcomposer.org/ for details on installing _composer_.
* See https://mamp.info/ for details on installing _MAMP_.
* Use MAMP `http://localhost:8888/phpmyadmin/` and `registrar.sql` to import a `registrar` database.
* To access SQL from command line: `/Applications/mamp/library/bin/mysql --host=localhost -uroot -proot`
* Use same MAMP website to copy database to `registrar_test` database (if you would like to try PHPUnit tests).
* Clone project
* From project root, run > `composer install --prefer-source --no-interaction`
* To run PHPUnit tests from root > `vendor/bin/phpunit tests`
* From web folder in project, Start PHP > `php -S localhost:8000`
* In web browser open `localhost:8000`

## Known Bugs
* No known bugs

## Support and contact details
* No support

## Technologies Used
* PHP
* MAMP
* mySQL
* Composer
* PHPUnit
* Silex
* Twig
* HTML
* CSS
* Bootstrap
* Git

## Copyright (c)
* 2017  Stella Huayhuaca, Benjamin T. Seaver

## License
* MIT

## Specifications
University registrar

Create an app for a University registrar to keep track of students and courses. Here are some user stories for you - build one at a time before moving on to the next one.

As a registrar, I want to enter a student, so I can keep track of all students enrolled at this University. I should be able to provide a name and date of enrollment.

As a registrar, I want to enter a course, so I can keep track of all of the courses the University offers. I should be able to provide a course name and a course number (ex. HIST100).

As a registrar, I want to be able to assign students to a course, so that teachers know which students are in their course. A course can have many students and a student can take many courses at the same time.

If you make it this far, great job! If you have time, work on these other user stories.

As a registrar, I want to be able to create departments. A student can be assigned to a department when they declare their major and a course can be assigned to a department when it is created.

As a registrar, I want to be able to list out all of the courses or all of the students in a particular department, so that I can inform the counselors which departments need more students and which need more courses.

As a registrar, I want to change a student's file to show that they have completed a course, so that I can see if they need to take the course again.

As a registrar, I want to list out all of the courses a student has taken, so that I can see if they have met their degree requirements.
As a registrar, I want to see how many students have not completed courses in any particular departments, so that I can tell the administration which departments need help.

* End specifications
