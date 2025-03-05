<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // サンプルデータを5件挿入
        DB::table('app7_notes')->insert([
            ['title' => '第一のメモ', 'detail' => 'これは最初のメモの詳細です。', 'created_at' => now(), 'updated_at' => now()],
            ['title' => '第二のメモ', 'detail' => '二番目のメモの詳細。改行は\nここにあります。', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'タイトルが長いメモ', 'detail' => '詳細情報のメモです。\n改行も許容されます。', 'created_at' => now(), 'updated_at' => now()],
            ['title' => '短いメモ', 'detail' => '詳細は少なめです。', 'created_at' => now(), 'updated_at' => now()],
            ['title' => '三番目のメモ', 'detail' => 'サンプルとして三番目のメモを作成しました。', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}