<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;
use App\Models\JobFavorite;

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
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@jobsite.be',
            'password' => 'admin'
        ]);
        User::create([
            'name' => 'Jan Janssens',
            'username' => 'Janneman',
            'email' => 'janneman@gmail.com',
            'password' => 'password'
        ]);
        JobFavorite::create([
            'user_id' => 2,
            'job_id' => 2,
        ]);
        JobFavorite::create([
            'user_id' => 2,
            'job_id' => 3,
        ]);
    }
}
