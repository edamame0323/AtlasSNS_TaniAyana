        <!-- ヘッダーページ（ハンバーガーメニュー） -->

        <div id="head">
            <h1>
                <a href="{{ route('top') }}">
                    <img src="{{ asset('images/atlas.png') }}">
                </a>
            </h1>

            <div class="accordion-menu">  <!-- メニュー全体を囲う -->

                <div class="menu-trigger">  <!-- ここをクリックする場所にする -->
                    <p>〇〇さん</p>
                    <span class="arrow">▼</span>  <!-- arrow → 矢印 -->
                </div>

                <ul class="menu-list">
                    <li><a href="">ホーム</a></li>
                    <li><a href="">プロフィール</a></li>
                    <li><a href="">ログアウト</a></li>
                </ul>

            </div>
        </div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const trigger = document.querySelector('.menu-trigger');
    const menu = document.querySelector('.menu-list');

    trigger.addEventListener('click', function () {

        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }

    });

});

</script>
