<x-login-layout>

<h1>フォロワーリスト画面</h1>
  <h2>機能を実装していきましょう。</h2>

<div class="follow-icons">
    @foreach($followerUsers as $user)
        <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">
    @endforeach
</div>

</x-login-layout>
