<x-login-layout>

<!-- <h1>フォローリスト画面</h1> -->
  <h2>フォローリスト</h2>

<div class="follow-icons">
  @foreach($followUsers as $user)
      <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">
  @endforeach
</div>

@foreach($posts as $post)

<div class="post-item">

    <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="アイコン">

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
