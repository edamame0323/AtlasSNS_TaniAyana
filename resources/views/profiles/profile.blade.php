<x-login-layout>

<div class="profile_edit">

<!-- <h1>プロフィール編集画面</h1> -->

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <!-- {{-- ユーザー名 --}} -->
        <div class="profile_edit_row">

            <div class="profile_edit_icon">
                <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">
            </div>

            <label for="username">ユーザー名</label>

            <div class="profile_edit_input">
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ $user->username }}"
                >
            </div>

            <div class="profile_edit_error">
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- {{-- メールアドレス --}} -->
        <div class="profile_edit_row">

            <div class="profile_edit_icon"></div>

            <label for="email">メールアドレス</label>

            <div class="profile_edit_input">
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ $user->email }}"
                >
            </div>

            <div class="profile_edit_error">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- {{-- パスワード --}} -->
        <div class="profile_edit_row">

            <div class="profile_edit_icon"></div>

            <label for="password">パスワード</label>

            <div class="profile_edit_input">
                <input
                    type="password"
                    id="password"
                    name="password"
                >
            </div>

            <div class="profile_edit_error">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

        </div>


        <div class="profile_edit_row">

            <div class="profile_edit_icon"></div>

            <label for="passwordConfirmation">パスワード確認</label>

            <div class="profile_edit_input">
                <input
                    type="password"
                    id="passwordConfirmation"
                    name="password_confirmation"
                >
            </div>

            <div class="profile_edit_error">
                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- {{-- 自己紹介 --}} -->
        <div class="profile_edit_row">

            <div class="profile_edit_icon"></div>

            <label for="bio">自己紹介</label>

            <div class="profile_edit_input">
                <input
                    type="text"
                    id="bio"
                    name="bio"
                    value="{{ $user->bio }}"
                >
            </div>

            <div class="profile_edit_error">
                @error('bio')
                    <p>{{ $message }}</p>
                @enderror
            </div>

        </div>

    <!-- {{-- アイコン画像 --}} -->
        <div class="profile_edit_row">

            <div class="profile_edit_icon"></div>

            <label for="icon">アイコン画像</label>

            <div class="profile_edit_input">
                <input
                    type="file"
                    id="icon"
                    name="icon"
                >
            </div>

            <div class="profile_edit_error">
                @error('icon')
                    <p>{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- {{-- 更新ボタン --}} -->
        <div class="profile_edit_button">
            <button type="submit">更新</button>
        </div>

    </form>

</div>

</x-login-layout>
