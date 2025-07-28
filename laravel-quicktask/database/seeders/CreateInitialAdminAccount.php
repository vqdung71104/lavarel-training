<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::unguarded(
            function () {
                User::query()->delete();
            }
        );
        User::create([
            'email' => 'admin.account@sun-asterisk.com',
            'password' => bcrypt('12345678'),
            'firstname' => 'Admin',
            'lastname' => 'Account',
            'is_active' => true,
            'username' => 'admin.account',
            'is_admin' => true,
        ]);
    }
}
