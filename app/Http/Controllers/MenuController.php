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
        // バリデーションを適用
        $validated = $request->validate([
            'category_id' => 'required|integer', 
            'name' => 'required|string', 
            'calories' => 'required|regex:/^\d+$/', 
        ]);
      
        // モデルからインスタンスを生成
        $newDish = new SelectDish();
      
        // バリデーション済みのデータを代入
        $newDish->category_id = $validated['category_id'];
        $newDish->name = $validated['name'];
        $newDish->calories = $validated['calories'];
      
        // 保存
        $newDish->save();
      
        return redirect()->route('selectdish.menu')->with('status', 'メニューが保存されました！');
    }

    // メニューを削除
    public function destroy($id)
    {
          // 指定したIDのメニューを取得。ない場合は404エラーを表示
        $dish = SelectDish::findOrFail($id);
          // データを物理削除
        $dish->delete();

        // 削除後にメニュー一覧にリダイレクト
        return redirect()->route('selectdish.menu')->with('status', 'メニューが削除されました！');
    }   
    
    // 指定した料理の編集画面を表示する
    public function edit($id)
    {
        // モデルからメソッドを呼び出す
        $editDish = SelectDish::getSelectedDish($id);  // 指定されたIDの料理情報を取得
        $categories = Category::getAllCategories();  //カテゴリ一覧

        // データがない場合は 404 エラーを返す
        if (!$editDish) {
        abort(404);
        }

        // メニュー更新画面にデータを渡す
        return view('selectdish.edit', compact('editDish', 'categories'));
    }

    public function update(Request $request, $id)
    {
      //バリデーションでデータ不整合の場合に自動エラーメッセージを表示
      $validated = $request->validate([
        'category_id' => 'required|integer', 
        'name' => 'required|string', 
        'calories' => 'required|regex:/^\d+$/', 
      ]);
    
      //モデルからメソッドを呼び出す
      $updateDish = SelectDish::getSelectedDish($id);  // 指定されたIDの料理情報を取得
    
      // メニュー情報を更新
      $updateDish->update([
          'category_id' => $validated['category_id'],
          'name' => $validated['name'],
          'calories' => $validated['calories'],
      ]);
    
      // 更新後にリダイレクト
      return redirect()->route('selectdish.menu')->with('status', 'メニューが保存されました！');
    }
}
