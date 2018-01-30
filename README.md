# Lara CMS - Content module
This is the Content Management System on Laravel 5.5, made for fun.
For now, main feature is to use translated texts directly from database in your blades and 
manage them in laracms dashboard.

![laracms dashboard](https://user-images.githubusercontent.com/6103997/35482156-c64ad344-0439-11e8-9972-db1f9c9c89b4.png)

## How to use

In blade files, use `Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`

## Installation
Run 
```
composer require grundmanis/laracms-content
```
Then in `config/app.php` **providers** array register laracms service provider:
```
Grundmanis\Laracms\Modules\Content\Providers\ContentProvider::class
``` 
and if You are not using yet the <a href="https://github.com/dimsav/laravel-translatable">Dimsav\Translatable</a> package, register it as well: 
``` 
Dimsav\Translatable\TranslatableServiceProvider::class
```