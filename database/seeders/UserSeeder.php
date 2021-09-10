<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'name' => 'Obi-wan Kenobi',
            'email' => 'generalkenobi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret')
        ]);

        $super->assignRole('Super Admin');
        
        $admins = User::factory(3)->create();

        foreach ($admins as $admin) {
            $admin->assignRole('Admin');
        }

        $users = User::factory(6)->create();

        foreach ($users as $user) {
            $user->assignRole('User');
        }
    }
}
