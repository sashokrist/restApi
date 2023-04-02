<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1>Test Api Task</h1>

<h3>How to run</h3>
1. git clone git@github.com:sashokrist/restApi.git
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. Set database credentials
6. php artisan migrate

<p>Routes:

authenticate Postman - testApi.test/api/v1/authenticate - POST


get random feed Postman - testApi.test/api/v1/getFeedInfo - GET


Show Random Order from DB http://testapi.test/api/v1/showOrder


Show Random Product from DB http://testapi.test/api/v1/showProduct 

</p>

<p>Unit Test - /tests/Feature/TestApiServiceTest</p>

Screenshots
![Screenshot 2023-04-02 at 12.23.26.png](..%2FScreenshot%202023-04-02%20at%2012.23.26.png)

![Screenshot 2023-04-02 at 12.23.47.png](..%2FScreenshot%202023-04-02%20at%2012.23.47.png)
