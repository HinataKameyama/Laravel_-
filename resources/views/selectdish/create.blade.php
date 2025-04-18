@extends('layouts.app')
@section('title', '料理選択画面') 

@section('content')
    <h1>献立入力</h1>
        <!-- フラッシュメッセージ -->
        @if (session('status'))
        <p>{{ session('status') }}</p>
        @endif

    <div class="form">
        <form action="/selectdish" method="POST">
        @csrf
        	<div>
                <label for="dish">主食:</label>
                <select name="stapleDish" id="dish">
                        <option value="" selected>選択してください。</option>
                    @foreach ($stapleDishes as $stapleDish)
                        <option value="{{ $stapleDish->name }}">{{ $stapleDish->name }} ({{ $stapleDish->calories }}kcal)</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <label for="dish">主菜:</label>
                <select name="mainDish" id="dish">
                        <option value="" selected>選択してください。</option>
                    @foreach ($mainDishes as $mainDish)
                        <option value="{{ $mainDish->name }}">{{ $mainDish->name }} ({{ $mainDish->calories }}kcal)</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <label for="dish">副菜:</label>
                <select name="sideDish" id="dish">
                        <option value="" selected>選択してください。</option>
                    @foreach ($sideDishes as $sideDish)
                        <option value="{{ $sideDish->name }}">{{ $sideDish->name }} ({{ $sideDish->calories }}kcal)</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="comment">コメント:</label>
                <textarea name="comment" id="comment" rows="4"></textarea>
            </div>
    
            <button class="uk-button uk-button-primary" type="submit">結果を表示</button>
        </form>
    </div>
@endsection
