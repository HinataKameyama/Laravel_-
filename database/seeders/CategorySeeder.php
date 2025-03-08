<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('b_04_01_category')->insert([
            ['id' => 1, 'category' => '主食'],
            ['id' => 2, 'category' => '主菜'],
            ['id' => 3, 'category' => '副菜'],
        ]);
    }
}
