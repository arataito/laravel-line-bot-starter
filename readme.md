# Laravel-line-bot-starter

Laravel-line-bot-start is simply [Laravel](https://github.com/laravel/laravel) and [line-bot-php-sdk](https://github.com/line/line-bot-sdk-php).

~~~~
"php": ">=5.5.9",
"laravel/framework": "5.2.*",
"linecorp/line-bot-sdk": "^0.1.0"
~~~~

## settings

After creating Line bot account, please set CHANNEL_ID and CHANNEL_SECRET, MID to your project's to .env

~~~~
CHANNEL_ID=[YOUR LINEBOT CHANNEL ID]
CHANNEL_SECRET=[YOUR LINEBOT CHANNEL SEACRET]
MID=[YOUR LINEBOT MID]
~~~~

## Proxy

When you use proxy server like [Fixie](https://elements.heroku.com/addons/fixie)
please write your proxy server URL to CallbackController.php as described below.

~~~~
$this->config = [
            'channelId' => getenv('CHANNEL_ID'),
            'channelSecret' => getenv('CHANNEL_SECRET'),
            'channelMid' => getenv('MID'),
            'defaults'  => [
                'proxy' => '[YOUR PROXY URL]'
            ]
        ];
~~~~


## Callback URL
~~~~
[ROOT_URL]/callback
~~~~

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
