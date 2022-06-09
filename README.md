<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## About 
This is a middleware API that is able to handle a HTTP request from a client and fetch the appropriate resource from a backend.

The backend is located in : `https://api.dev.elucidate.co/`

The documentation to this api is in: `https://api.dev.elucidate.co/docs`

To access this api you need the a token that you can obtain from authenticating in auth0 on: `https://efi.dev.elucidate.co/login`.


## Built With Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. 


## Shipping The Result

In order to make this middleware API up and running, there are a few steps to take:

- Adding authentication with a tool like sanctum for Laravel so that clients can authenticate before using it
- Adding some unit tests.

BUT THE MANDATORY THING TO DO IS TO ADD THE `ELUCIDE_TOKEN` TO THE .env FILE.


## Running Tests
There are integration tests to check if everything is working from an integration point of view.

To run the tests, you can run this command:

```
php artisan test
```

## Problems

There were no particular problem with building this middleware. The only thing that went wrong is that there is no documentation
about how to authenticate through oAuth on the API.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
