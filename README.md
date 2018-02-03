# Lara CMS - Content module

This is a <a href="https://github.com/Grundmanis/laracms">Laracms module</a>. 
It allows to use translated texts directly from database in your blade files and 
manage them in laracms dashboard.

![laracms dashboard](https://user-images.githubusercontent.com/6103997/35482156-c64ad344-0439-11e8-9972-db1f9c9c89b4.png)

## How to use

Click on "content" menu point or go to `yourhost.com/laracms/content/`, create a new content with unique slug and translated values,
then in blade files, use `Content::get($slug, $locale = null)` or helper `content($slug, $locale = null)`

## Installation
Run 
```
composer require grundmanis/laracms-content @dev
```
and run migration:
```
php artisan migrate
```