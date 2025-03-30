<?php

namespace App\Http\Controllers;

use App\Models\CaloriesLog;
use App\Models\SelectDish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SelectDishController extends Controller
{
    //料理の選択肢をテーブルから取得し、料理選択画面に表示させる
    public function create()
    {
        // モデルのメソッドを呼び出す
        $stapleDishes = SelectDish::getStapleDishes(); //主食
        $mainDishes = SelectDish::getMainDishes(); //主菜
        $sideDishes = SelectDish::getSideDishes(); //副菜

        return view('selectdish.create', compact('stapleDishes','mainDishes','sideDishes'));
    }
    
    //選択した料理をテーブル保存し、結果表示画面に表示させる
    public function store(Request $request)
    {
        //POSTされた料理を受け取る
        $selectedStaple = $request['stapleDish']; //主食
        $selectedMain = $request['mainDish']; //主菜
        $selectedSide = $request['sideDish']; //副菜
        //POSTされたコメントを受け取る
        $comment = $request['comment'];

        //料理名で指定したメニューの情報を取得
        $selectedAll = SelectDish::getDishByName($selectedStaple,$selectedMain,$selectedSide);

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
                
        // 合計カロリーとコメントを保存b_04_01_calories_logテーブルに保存
        $caloriesLog = CaloriesLog::saveCaloriesLog($totalCalorie, $comment);
                 
        return view('selectdish.result', 
        compact('selectedStaple','selectedMain','selectedSide',
        'selectedAll','selectedCalories','totalCalorie','comment',
        'msgTotalCalorie','msgCategory','msgComment'));
    }
    
}