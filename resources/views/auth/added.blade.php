<x-logout-layout>

  <div class="login-wrapper">

    <div class="login-form">

    <p>{{ $user->username }}さん</p>

    <p>ようこそ！AtlasSNSへ！</p>

    <p>ユーザー登録が完了しました。<br>
    早速ログインをしてみましょう。</p>

    <div class="login-btn">
      <a href="login">ログイン画面へ</a>
    </div>

    </div>

  </div>

</x-logout-layout>
