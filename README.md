<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation process

-   run git CLI and execute `cd /c/xampp/htdocs`
-   then execute`git clone <repo_link> project`
-   then change directory to the repo `cd project`
-   execute `composer install` or `composer update`
-   execute `cp .env.example .env`
-   execute `php artisan key:generate`
-   configure the following fields in `.env` file:
    `DB_DATABASE=database_name`
    `DB_USERNAME=root //user`
    `DB_PASSWORD= //pass`
    `And Other Required Field`

-   execute `php artisan migrate --seed` to create and configure database and its schema.
-   run project `php artisan serve`
-   consult the project in browser at **http://127.0.0.1:8000**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
