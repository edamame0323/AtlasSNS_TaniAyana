<x-login-layout>

<h1>プロフィール編集画面</h1>

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">

    <label for="username">ユーザー名</label>

    <input
        type="text"
        id="username"
        name="username"
        value="{{ $user->username }}"
    >

    @error('username')
        <p>{{ $message }}</p>
    @enderror

    <label for="email">メールアドレス</label>

    <input
        type="email"
        id="email"
        name="email"
        value="{{ $user->email }}"
    >

    @error('email')
        <p>{{ $message }}</p>
    @enderror

    <label for="password">パスワード</label>

    <input
        type="password"
        id="password"
        name="password"
    >

    <label for="password_confirmation">パスワード確認</label>

    <input
        type="password"
        id="password_confirmation"
        name="password_confirmation"
    >

    <label for="bio">自己紹介</label>

    <input
        type="text"
        id="bio"
        name="bio"
        value="{{ $user->bio }}"
    >

    <label for="icon">アイコン画像</label>

    <input
        type="file"
        id="icon"
        name="icon"
    >

    <button type="submit">更新</button>

</form>

</x-login-layout>
