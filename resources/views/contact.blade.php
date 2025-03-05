<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <!-- お名前に"dev"が含まれていた場合のメッセージ -->
        @if(isset($welcomeMessage))
            <div class="welcome-message">
                <h2>{{ $welcomeMessage }}</h2>
            </div>
        @endif

        <h1>お問い合わせフォーム</h1>
        
        <!-- 成功メッセージの表示 -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- フォームの表示 -->
        <form action="{{ url('/contact') }}" method="POST">
            @csrf
            <div>
                <label for="name">お名前:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">メールアドレス:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="message">お問い合わせ内容:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">送信する</button>
            </div>
        </form>
        
        <!-- 送信されたデータを表示 -->
        @if(isset($name) && isset($email) && isset($message))
            <div class="form-result">
                <h3>送信された内容</h3>
                <div><strong>お名前:</strong> {{ $name }}</div>
                <div><strong>メールアドレス:</strong> {{ $email }}</div>
                <div><strong>お問い合わせ内容:</strong> {{ $message }}</div>
            </div>
        @endif

    </div>
</body>
</html>