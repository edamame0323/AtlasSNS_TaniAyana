<x-login-layout>

@if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
          <li class="error-message">{{ $error }}</li>
      @endforeach
    </ul>
@endif

<form class="post-form" action="/create" method="POST">

  @csrf

  <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="アイコン" class="post-icon">

  <textarea
    name="post"
    placeholder="投稿内容を入力してください。"
    class="post-text">{{ old('post') }}
  </textarea>

  <button type="submit" class="post-button">
    <img src="{{ asset('images/post.png') }}" alt="投稿" class="post-btn">
  </button>

</form>

@foreach($posts as $post)

    <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="アイコン">

    <p>{{ $post->user->username }}</p>

    <p>{{ $post->post }}</p>

    <p>{{ $post->created_at }}</p>

    <a class="js-modal-open"
       href=""
       post="{{ $post->post }}"
       post_id="{{ $post->id }}">
        編集
    </a>

    <form method="POST" action="{{ route('post.delete', $post->id) }}">
      @csrf
      <button type="submit">削除</button>
    </form>

@endforeach

<!-- ここからモーダル -->
 <div class="modal js-modal">

      <div class="modal__bg js-modal-close"></div>

      <div class="modal__content">
        <form action="{{ route('post.update') }}" method="POST">
          @csrf
          <textarea name="post" class="modal_post"></textarea>
          <input type="hidden" name="id" class="modal_id">
          <input type="submit" value="更新">
        </form>

        <a class="js-modal-close" href="">閉じる</a>

      </div>
 </div>

</x-login-layout>
