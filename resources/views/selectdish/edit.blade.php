@extends('layouts.app')
@section('title', 'メニュー編集画面') 

<!DOCTYPE html>
<html lang="ja">
<body>
    <h1>メニュー更新</h1>
    <!--メニューの更新内容がレイアウトに沿っていない場合にエラーメッセージを表示-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!--メニュー更新フォーム-->
        <form action="{{ route('selectdish.update', $editDish->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="category">カテゴリ:</label>
                    <select name="category_id" id="category_id">
                    <option value="{{ $editDish->category_id }}" required>{{ $editDish->category }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
            </div>
    
            <div>
                <label for="name">料理名:</label>
                <input name="name" id="name" value="{{ old('name', $editDish->name) }}" required></input>
            </div>

            <div>
                <label for="calories">カロリー（数値のみ）:</label>
                <input name="calories" id="calories" value="{{ old('calories', $editDish->calories) }}" required></input>
            </div>
    
            <button type="submit">更新</button>
        </form>
</body>
</html>