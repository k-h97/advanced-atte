<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>atte</title>
  <style>
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 70px;
      padding: 0 30px;
    }
    .header-ttl {
      margin-left:60px;
    }
    .header-nav-list {
      display: flex;
      font-weight: bold;
      list-style: none;
    }
    .header-nav-item {
      margin-right: 50px;
    }
    .stamp {
      background-color:#EEEEEE;
      height:500px;
    }
    .stamp-ttl {
      font-weight:bold;
      text-align:center;
      font-size:20px;
      padding-top:30px;
    }
    .stamp-button {
      text-align:center;
    }
    .str-attendance {
      width:25%;
      height:120px;
      background-color:white;
      margin:10px 20px 30px 0px;
      font-weight:bold;
      font-size:18px;
      border:none;
    }
    .fin-attendance {
      width:25%;
      height:120px;
      background-color:white;
      font-weight:bold;
      font-size:18px;
      border:none;
    }
    .str-rest {
      width:25%;
      height:120px;
      background-color:white;
      margin-right: 20px;
      font-weight:bold;
      font-size:18px;
      border:none;
    }
    .fin-rest {
      width:25%;
      height:120px;
      background-color:white;
      font-weight:bold;
      font-size:18px;
      border:none;
    }
    .footer-text {
      text-align:center;
      font-weight:bold;
    }
  </style>
</head>

<body>
  <header class="header">
    <h1 class="header-ttl">Atte</h1>
      <nav class="header-nav">
        <ul class="header-nav-list">
          <li class="header-nav-item"><a href="/">ホーム</a></li>
          <li class="header-nav-item"><a href="/attendance">日付一覧</a></li>
          <li class="header-nav-item"><a href="/logout">ログアウト</a></li>
        </ul>
  </nav>
  </header>
  <div class="stamp">
    <div class="stamp-ttl">
      <p>さんお疲れ様です!</p>
    </div>
    <div class="stamp-button">
      <button class="str-attendance" type="button">勤務開始</button>
      <button class="fin-attendance" type="button">勤務終了</button>
      <br>
      <button class="str-rest" type="button">休憩開始</button>
      <button class="fin-rest" type="button">休憩終了</button>
    </div>
  </div>
  <footer>
    <p class="footer-text">Atte,inc.</p>
  </footer>
</body>

</html>
