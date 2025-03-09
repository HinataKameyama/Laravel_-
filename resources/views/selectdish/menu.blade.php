@extends('layouts.app')
@section('title', 'メニュー管理画面') 


<!DOCTYPE html>
<html lang="ja">
<body>
    <h1>メニュー一覧</h1>
        <!--カテゴリごとに料理とカロリーをテーブル表示-->
        @foreach ($dishes as $category => $items)
            <h2>{{ $category }}</h2> {{-- カテゴリ名を見出しとして表示 --}}
                <table>
                    <thead>
                        <tr>
                            <th>メニュー</th>
                            <th>カロリー</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $dish)
                            <tr>
                                <td>{{ $dish -> name }}</td>
                                <td>{{ $dish -> calories }}</td>
                                <td><a class="uk-button uk-button-default" href="#">編集</a></td>
                                <td>
                                    <form action="{{ route('selectdish.menu', $dish->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="uk-button uk-button-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>                       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endforeach

    <!--料理を新規追加-->
    <h1>新規追加</h1>
        <!--メニューが保存できた場合にメッセージを表示-->
        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <!--メニュー新規追加フォーム-->
        <form action="/selectdish/menu" method="POST">
            @csrf
            <div>
                <label for="category">カテゴリ:</label>
                    <select name="category_id" id="category_id">
                    <option value="" required>選択してください。</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
            </div>
    
            <div>
                <label for="name">料理名:</label>
                <input name="name" id="name" required></input>
            </div>

            <div>
                <label for="calories">カロリー（数値のみ）:</label>
                <input name="calories" id="calories" required></input>
            </div>
    
            <button type="submit">保存</button>
        </form>
</body>
</html>