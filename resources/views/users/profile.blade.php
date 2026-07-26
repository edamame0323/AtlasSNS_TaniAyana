<x-login-layout>

<h1>相手プロフィール</h1>

<img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">

<p>ユーザー名:{{ $user->username }}</p>

<p>自己紹介:{{ $user->bio }}</p>

@if($isFollowing)
    <button>フォロー解除</button>
@else
    <button>フォローする</button>
@endif

</x-login-layout>
