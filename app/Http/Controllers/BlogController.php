<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // 記事詳細ページ表示
    public function show($slug)
    {
        // 記事のデータ（例：タイトル、内容、画像パス）
        $article = [
            'title' => 'Laravelで作るシンプルなブログ',
            'content' => 'Laravelは、シンプルで使いやすいPHPフレームワークです。このブログ記事では、Laravelを使ってシンプルなブログの記事ページを作成する方法を説明します。',
            'image' => 'storage/images/blog-image.jpg',
        ];

        // ビューにデータを渡す
        return view('blog.show', compact('article'));
    }
}