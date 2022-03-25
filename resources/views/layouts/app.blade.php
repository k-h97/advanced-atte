<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/common.css">
    @yield('css')
</head>

<body>
    <header class="header">
        <h1 class="header-ttl">Atte</h1>
        <nav class="header-nav">
            <ul class="header-nav-list">
                <li><a class="header-nav-item" href="/">ホーム</a></li>
                <li><a class="header-nav-item" href="/attendance">日付一覧</a></li>
                <li>
                    <form class="header-nav-item" action="/logout" method="POST">
                        @csrf
                        <input class="logout-icon" type="submit" value="ログアウト">
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    @yield('content')

    <footer class="footer">
        <p class="footer-text">Atte,inc.</p>
    </footer>
</body>

</html>
