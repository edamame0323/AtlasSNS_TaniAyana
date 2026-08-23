        <!-- ヘッダーページ（ハンバーガーメニュー） -->

        <div id="head">
            <h1>
                <a href="{{ route('top') }}">
                    <img src="{{ asset('images/atlas.png') }}" alt="AtlasSNS">
                </a>
            </h1>

            <nav class="accordion_menu">  <!-- メニュー全体を囲う -->

                <div class="menu_trigger">  <!-- ここをクリックする場所にする -->

                    <p>{{ Auth::user()->username }} さん</p>

                    <span class="arrow"></span>  <!-- arrow → 矢印 -->

                    <img src="{{ asset('images/' . Auth::user()->icon_image) }}"
                         alt="アイコン"
                         class="header_icon">
                </div>

                <ul class="menu_list">
                    <li><a href="{{ route('top') }}">HOME</a></li>
                    <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <!-- ログアウトのrouteのみPOSTだからaタグでは送れないからformを使う -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                </ul>

            </nav>
        </div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const trigger = document.querySelector('.menu_trigger');
    const menu = document.querySelector('.menu_list');
    const arrow = document.querySelector('.arrow');

    trigger.addEventListener('click', function () {

        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }

        arrow.classList.toggle('open');

    });

});

</script>
