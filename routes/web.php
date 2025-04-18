<?php
////app1
//
//Route::get('/', function () {
//    return view('hello');  // 'hello'ビューを表示
//});
//
//Route::get('/next-world', function () {
//    return view('next-world');  // 'next-world'ビューを表示
//})->name('next-world');  // 名前付きルート
//
////app2
//Route::get('/artist/{id}', function ($id) {
//    return view('artist', ['id' => $id]);
//});
//
////app3,4
//use App\Http\Controllers\ContactController;
//
//Route::get('/contact', [ContactController::class, 'showForm']);
//Route::post('/contact', [ContactController::class, 'handleForm']);
//
////app5
//use App\Http\Controllers\BlogController;
//
//Route::get('/blog/{slug}', [BlogController::class, 'show']);
//
////app6
//use App\Http\Controllers\OrderController;
//
//Route::get('/order', [OrderController::class, 'create']);  // フォーム表示
//Route::post('/order', [OrderController::class, 'store']);   // フォーム送信
//
////app7
//use App\Http\Controllers\NoteController;
//
//Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
//Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
//Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
//Route::get('/notes/filter', [NoteController::class, 'filter'])->name('notes.filter');

//b-04-01
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectDishController;
use App\Http\Controllers\MenuController;
//料理の選択画面を表示
Route::get('/selectdish/create', [SelectDishController::class, 'create'])->name('selectdish.create');
//合計カロリーをDBに保存
Route::post('/selectdish', [SelectDishController::class, 'store'])->name('selectdish.result');
//メニュー一覧、カテゴリ一覧を取得
Route::get('/selectdish/menu', [MenuController::class, 'index'])->name('selectdish.menu');
//メニューを新規追加しDBに保存
Route::post('/selectdish/menu', [MenuController::class, 'store'])->name('selectdish.menu');
//メニューを削除
Route::delete('selectdish/menu/{id}', [MenuController::class, 'destroy'])->name('selectdish.destroy');
//選択したメニューを編集画面に表示
Route::get('/selectdish/edit/{id}', [MenuController::class, 'edit'])->name('selectdish.edit');
//メニューを更新
Route::put('selectdish/update/{id}', [MenuController::class, 'update'])->name('selectdish.update');

