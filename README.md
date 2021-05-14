<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation
1. Edit homestead.yaml to the following `-- map: sparetime.project to: /home/vagrant/WAF/MyLaravelProjects/SpareTimeProject/public` create the folders WAF/MyLaravelProjects if necessary or just map to preferred location.
2. Create a databse in the homestead.yaml and name it `- sparetime_project`.
3. Duplicate `.env.example` and rename it `.env`.
4. Inside the new `.env` file set the DB_DATABASE to the db you created in the Homestead file and set the username and password to the correct credentials. These creditials are username: homestead and password: secret.
5. Run `vagrant reload --provision` to refresh the homestead enviromeant and add `sparetime.project` to host file.

In the Homestead environment, cd into the application folder and run the following:

1.`composer install`.
2.`npm install`.
3.`php artisan key:generate`.
4.`php artisan passport:install`.

Then migrate and seed the database:

5.`php artisan migrate --seed`.

**NOTE** if you experience at this point regarding the laravel passport and seeding try seed first and then install passport.

To test if the installation has worked visit http://sparetime.project:8000/ if you are able to open a webpage that says "Welcome to SpareTime" it was successful.
