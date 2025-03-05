<?php
//app3
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Carbon\Carbon;
//
//class ContactController extends Controller
//{
//    // フォーム表示用メソッド
//    public function showForm()
//    {
//        return view('contact', [
//            'today' => Carbon::now()->format('Y年m月d日')
//        ]);
//    }
//
//    // フォーム送信処理用メソッド
//    public function handleForm(Request $request)
//    {
//        // 現在は送信先をハリボテとして処理
//        // 実際の送信処理はここに実装することができます
//
//        // 送信後に確認メッセージを表示するため、ビューに渡す
//        return redirect('/contact')->with('success', 'お問い合わせを送信しました！');
//    }
//}

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // フォーム表示用メソッド
    public function showForm()
    {
        return view('contact');
    }

    // フォーム送信処理用メソッド
    public function handleForm(Request $request)
    {
        // お名前に"dev"が含まれているかチェック
        $name = $request->input('name');
        $welcomeMessage = null;

        if (strpos($name, 'dev') !== false) {
            $welcomeMessage = "ようこそ開発者さん";
        }

        // フォーム送信後に結果を表示
        return view('contact', [
            'name' => $name,
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'welcomeMessage' => $welcomeMessage
        ]);
    }
}