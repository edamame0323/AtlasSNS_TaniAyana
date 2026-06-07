<x-login-layout>

<form class="post-form">

  <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="アイコン" class="post-icon">

  <textarea
    name="post"
    placeholder="投稿内容を入力してください。"
    class="post-text">
  </textarea>

  <button type="submit" class="post-button">
    <img src="{{ asset('images/post.png') }}" alt="投稿" class="post-btn">
  </button>

</form>

</x-login-layout>
