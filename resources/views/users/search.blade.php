<x-login-layout>

<div class="search_area">

    <form action="{{ url('/search') }}" method="GET" class="search_form">
        <input
            type="text"
            name="keyword"
            class="search_input"
            placeholder="ユーザー名"
            value="{{ $keyword ?? '' }}"
        >

        <button type="submit" class="search_btn">
            <img src="{{ asset('images/search.png') }}" alt="検索">
        </button>

    </form>

    @if (!empty($keyword))
        <p class="search_keyword">
            検索ワード : {{ $keyword }}
        </p>
    @endif

</div>

<div class="user_list">

    @foreach($users as $user)

    <div class="user_item">

        <div class="user_info">
            <img src="{{ asset('images/' . $user->icon_image) }}" alt="アイコン">
            <p>{{ $user->username }}</p>
        </div>

        <!-- フォロー/フォロー解除ボタンを書く -->
        <div class="follow_area">

                @if(in_array($user->id, $following_ids))
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
