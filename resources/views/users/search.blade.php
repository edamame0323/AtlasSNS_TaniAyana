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
            <a href="{{ route('user.profile', $user->id) }}">
                {{ $user->username }}
            </a>
        </div>

        <!-- フォロー/フォロー解除ボタンを書く -->
        <div class="follow-area">

                @if(in_array($user->id, $followingIds))
                    <form action="{{ route('unfollow', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="unfollow-btn">フォロー解除</button>
                    </form>
                @else
                    <form action="{{ route('follow', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="follow-btn">フォローする</button>
                    </form>
                @endif

        </div>

    </div>

    @endforeach

</div>
</x-login-layout>
