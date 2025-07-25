# My Form Package

A Laravel package for form management with built-in user authentication.

## Installation

Follow these steps to install and configure the package:

### 1. Install via Composer
```bash
composer require niharb/my-form:@dev
```

### 2. Run Migrations
```bash
php artisan vendor:publish --tag=my-form-migrations
php artisan migrate
```

### 3. Update Auth Configuration
Modify your config/auth.php file with these settings:
```bash
'providers' => [
    'package_users' => [
        'driver' => 'eloquent',
        'model' => Niharb\MyForm\Models\PackageUser::class,
    ],
],

'guards' => [
    'package_web' => [
        'driver' => 'session',
        'provider' => 'package_users',
    ],
    
    'api' => [
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
    ],
],
```
### 4. Seed Default User
Add the package seeder to your database/seeders/DatabaseSeeder.php:
```bash
    1) run this command : php artisan vendor:publish --tag=my-form-seeders
=> Now you have PackageUserSeeder.php in your database/seeders
    2) Than Run => php artisan db:seed --class=PackageUserSeeer
    
Now you have 1 User =
    'username' => 'adminuser',
    'email' => 'admin@example.com',
    'password' => 'secret'
```
### 5. Routes
Now you can see your Forms in
```bash
   Registration = /my-form/register
   Login = /my-form/login
```