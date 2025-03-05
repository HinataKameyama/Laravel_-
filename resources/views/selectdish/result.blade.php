@extends('layouts.app')
@section('title', '結果表示画面') 

<!DOCTYPE html>
<html lang="ja">
<body>
        <!--主食、主菜、副菜-->
        {{ $selectedStaple }}
        {{ $selectedMain }}
        {{ $selectedSide }}

        <!--選択されていないカテゴリがある場合、メッセージを表示-->
        @if (!empty($msgCategory))
        <ul>
            @foreach ($msgCategory as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
        @endif

        <!--合計カロリー-->
        <p>{{ $totalCalorie }}</p>
        <!--1000kcal以上の場合、メッセージを表示-->
        <p>{{ $msgTotalCalorie }}</p>

        <!--選択した料理とそのカテゴリ、カロリーを表で表示-->
        <table>
            <thead>
                <tr>
                    <th>カテゴリ</th>
                    <th>メニュー</th>
                    <th>カロリー</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($selectedAll as $all)
                    <tr>
                        <td>{{ $all -> category }}</td>
                        <td>{{ $all -> name }}</td>
                        <td>{{ $all -> calories }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    

        <!--コメント-->
        {{ $comment }}
        <!--コメントがない場合、メッセージを表示-->
        {{ $msgComment }}

    <br>
    <div class="btn-back"><a href="/selectdish/create">料理選択画面に戻る</a></div>
</body>
</html>