<x-login-layout>

<!-- <h1>相手プロフィール</h1> -->

<div class="profile_info">

    <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン" class="profile_icon">

    <div class="profile_detail">

        <div class="profile_row">
            <p class="profile_label">ユーザー名</p>
            <p>{{ $user->username }}</p>
        </div>

        <div class="profile_row">
            <p class="profile_label">自己紹介</p>
            <p>{{ $user->bio }}</p>
        </div>

    </div>

    <div class="profile_button">

            @if($is_following)
            <form action="{{ route('unfollow', $user->id) }}" method="POST">
                @csrf
                <button class="unfollow-btn">フォロー解除</button>
            </form>
        @else
            <form action="{{ route('follow', $user->id) }}" method="POST">
                @csrf
                <button class="follow-btn">フォローする</button>
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

            <p class="profile_post_text">{{ $post->post }}</p>

        </div>

    </div>

@endforeach

</x-login-layout>
