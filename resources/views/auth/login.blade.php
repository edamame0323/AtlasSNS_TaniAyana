<x-logout-layout>

<div class="login-wrapper">

  <div class="login-form">

    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => 'login']) !!}

    <p>AtlasSNSへようこそ</p>

    {{ Form::label('email', 'メールアドレス') }}
    {{ Form::text('email',null,['class' => 'input']) }}

    {{ Form::label('password', 'パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}

    <div class="login-btn">
      {{ Form::submit('ログイン') }}
    </div>

      <p class="register-link">
        <a href="register">新規ユーザーの方はこちら</a>
      </p>

    {!! Form::close() !!}
  </div>

</div>

</x-logout-layout>
