<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Job::factory(10)->create();
        User::create([
            'name' => 'Jan Janssens',
            'username' => 'Janneman',
            'email' => 'janneman@gmail.com',
            'password' => 'password'
        ]);
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@jobsite.be',
            'password' => 'admin'
        ]);

        /*         
            User::factory(1)->create([
            'name' => 'Jan Janssens',
            'username' => 'user',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        User::factory(1)->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@jobsite.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)            
        ]);
        */
    }
}
