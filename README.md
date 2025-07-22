1) To install run this command : composer require niharb/my-form:@dev
2) Then run : PHP artisan migrate
3) Than update/ada to your config/auth file :
   'providers' => [
        'package_users' => [ 
        'driver' => 'eloquent',
        'model' => Niharb\MyForm\Models\PackageUser::class,
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
