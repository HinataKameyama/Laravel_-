@extends('layouts.app')
@section('title', '結果表示画面') 

@section('content')
    <!--選択されていないカテゴリがある場合、メッセージを表示-->
    @if (!empty($msgCategory))
    <ul>
        @foreach ($msgCategory as $msg)
            <li>{{ $msg }}</li>
        @endforeach
    </ul>
    @endif

    <div class="data-table">
        <h1>結果表示</h1>
            <table>
                <thead>
                    <th>合計カロリー</th>
                </thead>
                <tbody>
                    <td>{{ $totalCalorie }}kcal</td>
                </tbody>
            </table>
                <div class="msg">
                    <!--1000kcal以上の場合、メッセージを表示-->
                    <p>{{ $msgTotalCalorie }}</p>
                </div>

        <!--選択した料理とそのカテゴリ、カロリーを表で表示-->
        <h2>内訳</h2>
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

        <h2>コメント</h2>
            <div class="msg">
                <p>{{ $comment }}</p>
                <!--コメントがない場合、メッセージを表示-->
                <p>{{ $msgComment }}</p>
            </div>
        <br>

        <div class="uk-button uk-button-secondary" href="{{ asset('selectdish/create') }}">料理選択画面に戻る</div>
    </div>
@endsection