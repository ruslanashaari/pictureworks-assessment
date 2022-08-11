<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'          =>  'John Smith',
            'comments'      =>  'Director',
            'password'      =>  bcrypt('720DF6C2482218518FA20FDC52D4DED7ECC043AB')
        ]);
    }
}
