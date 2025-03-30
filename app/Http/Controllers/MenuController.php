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
        // モデルのメソッドを呼び出す
        $dishes = SelectDish::getGroupedDishes();  //カテゴリごとのメニュー一覧
        $categories = Category::getAllCategories();  //カテゴリ一覧

        return view('selectdish.menu', compact('dishes', 'categories'));
    }

    //メニューを保存
    public function store(Request $request)
    {
        //POSTされたデータを受け取る
        $newCategoryID = $request['category_id'];
        $newName = $request['name'];
        $newCalories = $request['calories'];
      
        //b_04_01_dishesテーブルに保存
        $newDish = SelectDish::saveNewDish($newCategoryID,$newName,$newCalories);

        return redirect()->route('selectdish.menu')->with('status', 'メニューが保存されました！');
    }

    // メニューを削除
    public function destroy($id)
    {
        // 指定されたIDの料理情報を取得
        $deleteDish = SelectDish::getDishByID($id); 
        // メニュー情報をDBから削除
        $deleteDish->delete();

        // 削除後にメニュー一覧にリダイレクト
        return redirect()->route('selectdish.menu')->with('status', 'メニューが削除されました！');
    }   
    
    // 指定した料理の編集画面を表示する
    public function edit($id)
    {
        // モデルからメソッドを呼び出す
        $editDish = SelectDish::getDishByID($id);  // 指定されたIDの料理情報を取得
        $categories = Category::getAllCategories();  //カテゴリ一覧

        // データがない場合は 404 エラーを返す
        if (!$editDish) {
        abort(404);
        }

        // メニュー更新画面にデータを渡す
        return view('selectdish.edit', compact('editDish', 'categories'));
    }

    // 指定した料理の編集内容を上書き保存する
    public function update(Request $request, $id)
    {
        //POSTされたデータを受け取る
        $modifiedCategoryID = $request['category_id'];
        $modifiedName = $request['name'];
        $modifiedCalories = $request['calories'];
    
        // 更新データの配列を作成
        $updateData = [
          'category_id' => $modifiedCategoryID,
          'name' => $modifiedName,
          'calories' => $modifiedCalories,
        ];
        
        // 指定されたIDの料理情報を更新
        $updated = SelectDish::updateDish($id, $updateData);
        
        // 更新結果によって処理を分岐
        if ($updated) {
          return redirect()->route('selectdish.menu')->with('status', '料理情報が更新されました！');
        } else {
          return redirect()->route('selectdish.menu')->with('status', '更新に失敗しました。');
        }
    }
}
