<x-logout-layout>


    <div class="login_form">

        <p>{{ $user->username }}さん</p>

        <p>ようこそ！AtlasSNSへ！</p>

        <p>
            ユーザー登録が完了しました。<br>
            早速ログインをしてみましょう。
        </p>

        <div class="login_btn added_btn">
            <a href="login">ログイン画面へ</a>
        </div>

    </div>



</x-logout-layout>
