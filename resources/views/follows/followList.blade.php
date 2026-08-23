<x-login-layout>

<!-- <h1>フォローリスト画面</h1> -->
    <h2>フォローリスト</h2>

<div class="follow_icons">
    @foreach($follow_users as $user)
        <a href="{{ route('user.profile', $user->id) }}">
            <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">
        </a>
    @endforeach
</div>

@foreach($posts as $post)

<div class="post-item">

    <a href="{{ route('user.profile', $post->user->id) }}">
        <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="アイコン">
    </a>

    <div class="post-content">

        <div class="post-header">
            <p class="post-name">{{ $post->user->username }}</p>
            <p>{{ $post->created_at }}</p>
        </div>

        <p>{{ $post->post }}</p>

    </div>

</div>

@endforeach
</x-login-layout>
