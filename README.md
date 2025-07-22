1) To install run this command : composer require niharb/my-form:@dev
2) Then run : PHP artisan migrate
3) Than update/ada to your config/auth file :
   'providers' => [
        'package_users' => [ // Navi provider for your package users
        'driver' => 'eloquent',
        'model' => Niharb\MyForm\Models\PackageUser::class, // Your package's user model
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
