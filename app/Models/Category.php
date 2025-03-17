<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'b_04_01_category';  // テーブル名を明示的に指定

    // 全カテゴリを取得
    public static function getAllCategories()
    {
        return self::all();
    }
}
