<x-login-layout>

<div class="search-area">

    <form action="{{ url('/search') }}" method="GET" class="search-form">
        <input
            type="text"
            name="keyword"
            class="search-input"
            placeholder="ユーザー名"
            value="{{ $keyword ?? '' }}"
        >

        <button type="submit" class="search-btn">
            <img src="{{ asset('images/search.png') }}" alt="検索">
        </button>

    </form>

    @if (!empty($keyword))
        <p class="search-keyword">
            検索ワード : {{ $keyword }}
        </p>
    @endif

</div>

<div class="user-list">

    @foreach($users as $user)

    <div class="user-item">

        <div class="user-info">
            <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">
            <p>{{ $user->username }}</p>
        </div>

        <!-- フォロー/フォロー解除ボタンを書く -->
        <div class="follow-btn">

        </div>

    </div>

    @endforeach

</div>
</x-login-layout>
