<?php

namespace App\Http\Controllers;
use App\Models\SelectDish;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //料理データをテーブルから取得し、メニュー管理画面に表示させる
    public function index()
    {
        $dishes = SelectDish::join('b_04_01_category', 'b_04_01_dishes.category_id', '=', 'b_04_01_category.id')
                ->orderBy('category_id','ASC')
                ->orderBy('calories','ASC')
                ->get()
                ->groupBy('category');

    //b_04_01_categoryテーブルからカテゴリを取得し、メニュー追加フォームに表示
        $categories = Category::all();
                
        return view('selectdish.menu',compact('dishes','categories'));
    }

    //メニューを保存
    public function store(Request $request)
    {

          //モデルからインスタンスを生成
        $newDish = new SelectDish();  //任意の変数名 = new 連携するデータベースのモデル名;
          //category_idカラムにカテゴリIDを代入
        $newDish->category_id = $request->category_id;
          //nameカラムに料理名を代入
        $newDish->name = $request->name;
          //caloriesカラムにカロリーを代入
        $newDish->calories = $request->calories;        
          //保存
        $newDish->save();

        return redirect()->route('selectdish.menu')->with('status', 'メニューが保存されました！');
    }

}
