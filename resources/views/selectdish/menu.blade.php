@extends('layouts.app')
@section('title', 'メニュー管理画面') 


<!DOCTYPE html>
<html lang="ja">
<body>
    <h1>メニュー一覧</h1>
        <!--カテゴリ、料理、カロリーを表で表示-->
        @foreach ($dishes as $category => $items)
            <h2>{{ $category }}</h2> {{-- カテゴリ名を見出しとして表示 --}}
                <table>
                    <thead>
                        <tr>
                            <th>メニュー</th>
                            <th>カロリー</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $dish)
                            <tr>
                                <td>{{ $dish -> name }}</td>
                                <td>{{ $dish -> calories }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endforeach

    <!--料理を新規追加-->
    <h1>新規追加</h1>
</body>
</html>