<?php

namespace Niharb\MyForm\Database\Seeders;

use Illuminate\Database\Seeder;
use Niharb\MyForm\Models\PackageUser;
use Illuminate\Support\Facades\Hash;

class PackageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PackageUser::create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        PackageUser::create([
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
        ]);
    }
}