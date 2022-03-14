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
    </header>

    @yield('content')

    <footer class="footer">
        <p class="footer-text">Atte,inc.</p>
    </footer>
</body>
</html>
