# CakePHP Backend created by QuanKim

## CakePHP Application Skeleton For Backend Server


A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist quankim/cake-backend [app_name]`.

If Composer is installed globally, run
```bash
composer create-project --prefer-dist quankim/cake-backend [app_name]
```

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

## Use
Migration database
```sh
bin/cake migrations migrate
```
