@extends('layouts.app')
@section('title', '料理選択画面') 

<!DOCTYPE html>
<html lang="ja">
<body>
    <h1>献立入力</h1>
        <!-- フラッシュメッセージ -->
        @if (session('status'))
        <p>{{ session('status') }}</p>
        @endif

    <form action="/selectdish" method="POST">
    @csrf
    @foreach ($dishes as $category => $items)
    	<div>
            <label for="dish">主食:</label>
            <select name="stapleDish" id="dish">
                    <option value="" selected>選択してください。</option>
                @foreach ($items as $dish)
                    <option value="{{ $dish->name }}">{{ $dish->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="dish">主菜:</label>
            <select name="mainDish" id="dish">
                    <option value="" selected>選択してください。</option>
                @foreach ($items as $dish)
                    <option value="{{ $dish->name }}">{{ $dish->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="dish">副菜:</label>
            <select name="sideDish" id="dish">
                    <option value="" selected>選択してください。</option>
                @foreach ($items as $dish)
                    <option value="{{ $dish->name }}">{{ $dish->name }}</option>
                @endforeach
            </select>
        </div>
    @endforeach
        <div>
            <label for="comment">コメント:</label>
            <textarea name="comment" id="comment" rows="4"></textarea>
        </div>

        <button class="uk-button uk-button-primary" type="submit">結果を表示</button>
    </form>
</body>
</html>
