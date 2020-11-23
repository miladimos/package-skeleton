- [![Starts](https://img.shields.io/github/stars/miladimos/laravel-?style=flat&logo=github)](https://github.com/miladimos/laravel-/forks)
- [![Forks](https://img.shields.io/github/forks/miladimos/laravel-?style=flat&logo=github)](https://github.com/miladimos/laravel-/stargazers)

- [فارسی](README.md)

# laravel Package
  A package for fun

### Installation

1. Run the command below to add this package:
```
composer require miladimos/laravel-
```

2. Open your config/app.php and add the following to the providers array:
```php
Miladimos\Package\Providers\PackageServiceProvider::class,
```

3. Run the command below to publish the package config file config/package.php:
```
php artisan vendor:publish
```
