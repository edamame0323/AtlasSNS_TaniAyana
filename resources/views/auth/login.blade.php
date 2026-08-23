<x-logout-layout>

  <div class="login_form login_page">

    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => 'login']) !!}

    <p>AtlasSNSへようこそ</p>

    {{ Form::label('email', 'メールアドレス') }}
    {{ Form::text('email',null,['class' => 'input']) }}

    {{ Form::label('password', 'パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}

    <div class="login_btn">
      {{ Form::submit('ログイン') }}
    </div>

      <p class="register_link">
        <a href="register">新規ユーザーの方はこちら</a>
      </p>

    {!! Form::close() !!}
  </div>

</x-logout-layout>
