Lumen 7.2.1
idea:
https://auth0.com/blog/developing-restful-apis-with-lumen/

`composer global require "laravel/lumen-installer"`

`lumen new lumentry`

or

lumentry with laravel last (ATM 8):
`composer create-project --prefer-dist laravel/lumen lumentry`

lumentry with laravel 7:
`composer create-project --prefer-dist laravel/lumen lumentry "7.*"`

lumentry with laravel 6:
`composer create-project --prefer-dist laravel/lumen lumentry "6.*"`

`php -S localhost:8000 -t public`

The next thing you should do after installing Lumen is set your application key to a random string. Typically, this string should be 32 characters long. The key can be set in the .env environment file. If you have not renamed the .env.example file to .env, you should do that now. If the application key is not set, your user encrypted data will not be secure!

Since Lumen is a totally separate framework from Laravel, it does not intentionally offer compatibility with any additional Laravel libraries like Cashier, Passport, Scout, etc. If your application requires the functionality provided by these libraries, please use the Laravel framework.

failure:
Call to a member function connection() on null
answer from SO:

As per 2020 here is the check list to check against to fix this error.
You have to:
Create the database manually;
Configure the database connection it in the .env file (i.e. set DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD);
As per above answers uncomment $app->withFacades();, $app->withEloquent(); lines in bootstrap/app.php;
If you use your Eloquent model within PHPUnit tests you have to boot the Lumen (or Laravel) first by adding the following line to your test class setUp() method:

---

    response() - global helper function that obtains an instance of the response factory
    response()->json() - returns the response in JSON format.
    200 - HTTP status code that indicates the request was successful.
    201 - HTTP status code that indicates a new resource has just been created.
    findOrFail - throws a ModelNotFoundException if no result is not found.

---

lumen's artisan:
source:
https://www.youtube.com/watch?v=FHXVs7swRuU

no serve command
no key:generate
no tinker
no .env?
no down
no vendor:publish

---

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
