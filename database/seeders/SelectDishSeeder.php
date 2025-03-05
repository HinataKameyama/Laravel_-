<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SelectDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *  @return void
     */
    public function run()
    {
        //b_04_01_dishesテーブルにサンプルデータを挿入
        DB::table('b_04_01_dishes')->insert([
            ['category' => '主食', 'name' => '白ご飯', 'calories' => '250'],
            ['category' => '主食', 'name' => 'パン', 'calories' => '200'],
            ['category' => '主食', 'name' => 'うどん', 'calories' => '300'],
            ['category' => '主菜', 'name' => '唐揚げ', 'calories' => '400'],
            ['category' => '主菜', 'name' => '焼き魚', 'calories' => '350'],
            ['category' => '主菜', 'name' => 'ハンバーグ', 'calories' => '500'],
            ['category' => '副菜', 'name' => 'サラダ', 'calories' => '150'],
            ['category' => '副菜', 'name' => '味噌汁', 'calories' => '100'],
            ['category' => '副菜', 'name' => 'ポテトサラダ', 'calories' => '250'],
        ]);
    }
}
