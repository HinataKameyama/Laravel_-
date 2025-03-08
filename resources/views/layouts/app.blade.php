<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>

    <!--サブメニュー表示-->
    <a class="uk-button uk-button-default" href="{{ asset('selectdish/create') }}">料理選択画面</a>
    <a class="uk-button uk-button-default" href="{{ asset('selectdish/menu') }}">メニュー一覧</a>
</head>
</html>