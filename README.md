st-newsletter
===============

This is an EXAMPLE/DEMO application for users to sign up for a Newsletter.  The purpose of this demo was to experiment with Materialize CSS, MVC in Slim 3, and pagination in a Twig view.  This simply stores a users name and email in a SQLite database with an administration panel and the usual create, read, update, and delete.  What's actually done with the data isn't complete ( such as emailing the list of users a email newsletter for example ) as this wasn't the purpose for this demo.  Please don't use this application in your production environment.  With a little work, this would be a great starter app for someone doing something similar.

#Features

Slim 3, MVC, JQuery, Materialize CSS, SQLite, Eloquent ORM, Twig

#Required

1.  PHP 5.5.0 or greater

2.  PHP PDO extension

3.  Composer


#Slim App Dependencies

-php >= 5.5.0

-slim/slim 3.4

-slim/php-view 2.0

-slim/twig-view 2.1

-slim/http-cache 0.3.0

-illuminate/database 5.2.45

#TODO

1.  Fix plain text passwords in Users table.

2.  Form validation.

#Install

1.  Download code.

2.  Run **composer install** in application root.  This will install the Slim app dependencies.

3.  Start PHP dev server on the public folder:  **php -S localhost:8000 -t public**.

4.  Open a browser window to:  **http://localhost:8000/install.php** , this will build database.

5.  Navigate to root of the website and test the form.

6.  Navigate to **http://localhost:8000/admin** , username: admin, password: admin.

#Helpfull Sources

https://github.com/napolux/helloslim3
https://www.codecourse.com/library/lessons/slim-3-authentication/using-eloquent

#Website
http://snowytech.com/drewlenhart

#License
MIT License

Copyright (c) 2016 Drew D. Lenhart

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.