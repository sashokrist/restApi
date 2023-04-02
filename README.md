<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1>Test Api Task</h1>

<h3>How to run</h3>

1. git clone git@github.com:sashokrist/restApi.git

2. composer install

3. cp .env.example .env

4. php artisan key:generate

5. Set database credentials in .env

6. php artisan migrate

7. php artisan serve

<p>Routes:

authenticate Postman: http://locahost:8000/api/v1/authenticate - POST


get random feed Postman: http://locahost:8000/api/v1/getFeedInfo - GET


Show Random Feeds from DB on browser http://testapi.test/api/v1/showFeeds

</p>

<p>Unit Test - /tests/Feature/TestApiServiceTest</p>

Screenshots

<img width="926" alt="Screenshot 2023-04-03 at 2 23 33" src="https://user-images.githubusercontent.com/11788009/229385389-ad886149-4e91-4b0c-91b1-6523c945b6dd.png">


