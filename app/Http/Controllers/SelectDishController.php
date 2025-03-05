<?php

namespace App\Http\Controllers;

use App\Models\CaloriesLog;
use App\Models\SelectDish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SelectDishController extends Controller
{
    // 料理一覧をb_04_01_dishesテーブルから取得する
    public function create()
    {
        //カテゴリごとに料理を取得
        $stapleDishes = SelectDish::where('category', '主食')->get();
        $mainDishes = SelectDish::where('category', '主菜')->get();
        $sideDishes = SelectDish::where('category', '副菜')->get();

        return view('selectdish.create', compact('stapleDishes','mainDishes','sideDishes'));
    }
    
    public function store(Request $request)
    {
        //POSTされた料理を受け取る
        $selectedStaple = $request['stapleDish']; //主食
        $selectedMain = $request['mainDish']; //主菜
        $selectedSide = $request['sideDish']; //副菜
        //POSTされたコメントを受け取る
        $comment = $request['comment'];

        //選択した料理、カロリー、カテゴリをb_04_01_dishesテーブルから取得する
        $selectedAll = SelectDish::where('name', $selectedStaple) //主食
            ->orWhere('name', $selectedMain) //主菜
            ->orWhere('name', $selectedSide) //副菜
            ->get();

        //カロリーだけを抜き出す
        $selectedCalories = $selectedAll->pluck('calories');
        $selectedCalories ->toArray();

        //カロリー値を合計する
        $totalCalorie = array_sum($selectedCalories ->toArray());

        //合計カロリーが1000kcal以上の場合、メッセージを表示
        $msgTotalCalorie = ($totalCalorie >= 1000) ? "1000kcal以上です。" : "";

        //未選択のカテゴリがある場合、メッセージを表示
            // メッセージの配列を初期化
            $msgCategory = [];
            // 各変数が空かどうかをチェックし、メッセージを追加
            if (!$selectedStaple) {
                $msgCategory[] = "主食が選択されていません。";
            }
            if (!$selectedMain) {
                $msgCategory[] = "主菜が選択されていません。";
            }
            if (!$selectedSide) {
                $msgCategory[] = "副菜が選択されていません。";
            }

        //コメントが入力されていない場合、メッセージを表示
        $msgComment = (!$comment) ? "コメントが入力されていません。" : "";
                
        //選択した料理の合計カロリーとコメントをb_04_01_calories_logテーブルに保存
          //モデルからインスタンスを生成
        $caloriesLog = new CaloriesLog();  //任意の変数名 = new 連携するデータベースのモデル名;
          //resultカラムに合計カロリーを代入
        $caloriesLog->result = $totalCalorie;
          //commentカラムにコメントを代入
        $caloriesLog->comment = $comment;
      
        //保存
        $caloriesLog->save();
        

         
        return view('selectdish.result', 
        compact('selectedStaple','selectedMain','selectedSide',
        'selectedAll','selectedCalories','totalCalorie','comment',
        'msgTotalCalorie','msgCategory','msgComment'));

    }
    
    
}