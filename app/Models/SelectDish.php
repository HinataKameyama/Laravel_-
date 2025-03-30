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

    /**
     * 新しいメニューを保存する
     *
     * @param integer $newCategoryID カテゴリID
     * @param string $newName 料理名
     * @param float $newCalories カロリー
     * @return \App\Models\SelectDish
     */
    
    public static function saveNewDish($newCategoryID,$newName,$newCalories)
    {
        // 新しいインスタンスを生成し、データをセット
        $newDish = new self();
        $newDish->category_id = $newCategoryID;
        $newDish->name = $newName;
        $newDish->calories = $newCalories;
        
        // 保存
        $newDish->save();

        return $newDish;
    }

    //IDで指定したメニューの情報を取得
    public static function getDishByID($id)
    {
        return self::join('b_04_01_category', 'b_04_01_dishes.category_id', '=', 'b_04_01_category.category_id')
            ->where('id', $id)
            ->first();
    }

    //料理名で指定したメニューの情報を取得
    public static function getDishByName($selectedStaple,$selectedMain,$selectedSide)
    {
        return self::join('b_04_01_category', 'b_04_01_dishes.category_id', '=', 'b_04_01_category.category_id')
            ->where('name', $selectedStaple) //主食
            ->orWhere('name', $selectedMain) //主菜
            ->orWhere('name', $selectedSide) //副菜
            ->get();
    }

    /**
     * 指定された料理のデータを更新
     * 
     * @param int $id 更新する料理のID
     * @param array $data 更新データ
     * @return bool 更新成功: true / 失敗: false
     */
    public static function updateDish($id, $data)
    {
        return self::where('id', $id)->update($data);
    }
}

