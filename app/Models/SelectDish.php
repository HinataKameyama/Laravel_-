<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SelectDish extends Model
{
    use HasFactory;

    protected $table = 'b_04_01_dishes';  // テーブル名を明示的に指定
    protected $fillable = ['category_id', 'name', 'calories'];  // データベースに保存するフィールドを指定
    public $timestamps = false;  // タイムスタンプを無効化

    //主食メニュー取得
    public static function getStapleDishes()
    {
        return self::
        where('category_id', '1')->get();
    }

    //主菜メニュー取得
    public static function getMainDishes()
    {
        return self::
        where('category_id', '2')->get();
    }
    
    //副菜メニュー取得
    public static function getSideDishes()
    {
        return self::
        where('category_id', '3')->get();
    }

    //メニュー一覧をカテゴリごとにグループ化
    public static function getGroupedDishes()
    {
        return self::join('b_04_01_category', 'b_04_01_dishes.category_id', '=', 'b_04_01_category.category_id')
            ->orderBy('b_04_01_dishes.category_id', 'ASC')
            ->orderBy('calories', 'ASC')
            ->get()
            ->groupBy('category');
    }

    //IDで指定したメニューの情報を取得
    public static function getSelectedDish($id)
    {
        return self::join('b_04_01_category', 'b_04_01_dishes.category_id', '=', 'b_04_01_category.category_id')
            ->where('id', $id)
            ->first();
    }
}

