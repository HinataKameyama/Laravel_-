<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        //app7
        $this->call([
            NoteSeeder::class,
        ]);
        
        //b-04-01
        $this->call([
            SelectDishSeeder::class,
        ]);
    }

}


