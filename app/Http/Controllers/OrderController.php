<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;  // モデルをインポート

class OrderController extends Controller
{
    // 注文フォームの表示
    public function create()
    {
        // 料理名の選択肢（プルダウン）
        $dishes = ['ラーメン', 'カレー', '寿司', 'ピザ'];
        return view('order.create', compact('dishes'));
    }

    // 注文フォームの送信
    public function store(Request $request)
    {
        // フォームの内容をDBに保存
        Order::create([
            'name' => $request->name,
            'people_count' => $request->people_count,
            'dish' => $request->dish,
            'remarks' => $request->remarks,
        ]);

        // フォーム送信後のリダイレクト（例: サクセスメッセージ）
        return redirect('/order')->with('status', '注文を受け付けました！');
    }
}