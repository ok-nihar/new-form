# My Form Package

A Laravel package for form management with built-in user authentication.

## Installation

Follow these steps to install and configure the package:

### 1. Install via Composer

composer require niharb/my-form:@dev

### 2. Run Migrations

php artisan migrate

### 3. Update Auth Configuration
Modify your config/auth.php file with these settings:

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

### 4. Seed Default User
Add the package seeder to your database/seeders/DatabaseSeeder.php:


public function run(): void
{
    $this->call(PackageUserSeeder::class);
}