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
php artisan migrate
Now you have table named Paackage user table with these data 
=> Now you have 1 User =
    'username' => 'adminuser',
    'email' => 'admin@example.com',
    'password' => 'secret'
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
### 4. Routes
Now you can see your Forms in
```bash
   Registration = /my-form/register
   Login = /my-form/login
```