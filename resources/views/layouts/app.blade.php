<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <!-- サブメニュー表示 -->
    <nav>
        <a class="uk-button uk-button-default" href="{{ asset('selectdish/create') }}">料理選択画面</a>
        <a class="uk-button uk-button-default" href="{{ asset('selectdish/menu') }}">メニュー一覧</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>