<x-logout-layout>

<div class="login-wrapper">

    <div class="login-form">

        <!-- Laravel Cllective（補助ライブラリ）を使ったコードはこっち↓ -->
        <!-- 適切なURLを入力してください -->
        {!! Form::open(['url' => '/register', 'method' => 'POST']) !!}

        <h2>新規ユーザー登録</h2>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        {{ Form::label('username', 'ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::email('email',null,['class' => 'input']) }}

        {{ Form::label('password', 'パスワード') }}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::label('password_confirmation', 'パスワード確認') }}
        {{ Form::password('password_confirmation',['class' => 'input']) }}

        <div class="login-btn">
            {{ Form::submit('登録') }}
        </div>

        <p class="register-link">
            <a href="login">ログイン画面へ戻る</a>
        </p>

        {!! Form::close() !!}

    </div>

</div>

</x-logout-layout>


<!-- 初心者向けHTMLで書くならこっち↓ -->
<!-- <h1>ユーザー登録</h1>

<form method="POST" action="/register">
    @csrf

    <div>
        <label>名前</label>
        <input type="text" name="username">
    </div>

    <div>
        <label>メール</label>
        <input type="email" name="email">
    </div>

    <div>
        <label>パスワード</label>
        <input type="password" name="password">
    </div>

    <button type="submit">登録</button>
</form> -->
