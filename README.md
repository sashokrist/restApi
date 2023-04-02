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


Show Random Order from DB in browser: http://locahost:8000/api/v1/showOrder - GET


Show Random Product from DB in browser: http://locahost:8000/api/v1/showProduct  - GET
Show Random Feeds from DB http://testapi.test/api/v1/showFeeds - GET

</p>

<p>Unit Test - /tests/Feature/TestApiServiceTest</p>

Screenshots
<img width="926" alt="Screenshot 2023-04-02 at 12 23 26" src="https://user-images.githubusercontent.com/11788009/229349210-ee9c7806-e585-4876-8f08-38b3a895b13b.png">

<img width="926" alt="Screenshot 2023-04-02 at 12 23 47" src="https://user-images.githubusercontent.com/11788009/229349215-c5c9c448-7083-41d9-9e4b-982792747113.png">


![Screenshot 2023-04-03 at 2.23.33.png](..%2FScreenshot%202023-04-03%20at%202.23.33.png)
