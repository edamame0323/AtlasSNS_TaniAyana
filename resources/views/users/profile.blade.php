<x-login-layout>

<h1>相手プロフィール</h1>

<img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">

<p>ユーザー名:{{ $user->username }}</p>

<p>自己紹介:{{ $user->bio }}</p>

@if($isFollowing)
    <form action="{{ route('unfollow', $user->id) }}" method="POST">
        @csrf
        <button>フォロー解除</button>
    </form>
@else
    <form action="{{ route('follow', $user->id) }}" method="POST">
        @csrf
        <button>フォローする</button>
    </form>
@endif

</x-login-layout>
