<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
           //  UserSeeder::class,  // small issue running migrate:fresh --seed here to seed an admin user
            BlogPostSeeder::class,
        ]);

        //→ should be removed
    }
}
