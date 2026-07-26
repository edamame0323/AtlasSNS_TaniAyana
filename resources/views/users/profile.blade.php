<x-login-layout>

<h1>相手プロフィール</h1>

<div class="profile-info">

    <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン" class="profile-icon">

    <div class="profile-detail">

        <div class="profile-row">
            <p class="profile-label">ユーザー名</p>
            <p>{{ $user->username }}</p>
        </div>

        <div class="profile-row">
            <p class="profile-label">自己紹介</p>
            <p>{{ $user->bio }}</p>
        </div>

    </div>

    <div class="profile-button">

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
    </div>

</div>

@foreach($posts as $post)

    <div class="post-item">

        <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="アイコン" class="post-icon">

        <div class="post-content">

            <div class="post-header">
                <p>{{ $post->user->username }}</p>
                <p>{{ $post->created_at }}</p>
            </div>

            <p class="profile-post-text">{{ $post->post }}</p>

        </div>

    </div>

@endforeach

</x-login-layout>
