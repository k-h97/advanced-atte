<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>atte</title>
  <style>
    .header-ttl {
      margin-left:60px;
    }
    .register {
      background-color:#EEEEEE;
      height:500px;
    }
    .register-ttl {
      font-weight:bold;
      text-align:center;
      font-size:20px;
      padding-top:30px;
    }
    .register-form {
      display: flex;
      flex-direction: column;
      width:  28%;
      margin:0px auto;
    }
    .form-name {
      margin:10px;
      height:35px;
      border-radius:5px;
      background-color:#EEEEEE;
      border-color:#CCCCCC;
    }
    .form-email {
      margin:10px;
      height:35px;
      border-radius:5px;
      background-color:#EEEEEE;
      border-color:#CCCCCC;
    }
    .form-password {
      margin:10px;
      height:35px;
      border-radius:5px;
      background-color:#EEEEEE;
      border-color:#CCCCCC;
    }
    .form-check-password {
      margin:10px;
      height:35px;
      border-radius:5px;
      background-color:#EEEEEE;
      border-color:#CCCCCC;
    }
    .form-submit {
      margin:10px;
      height:40px;
      background-color:#4169E1;
      color:white;
      border-radius:5px;
    }
    .login {
      width:30%;
      margin:0px auto;
    }
    .login-text {
      text-align:center;
    }
    .login-url {
      display:block;
      text-align:center;
      margin-bottom:20px;
      font-weight:bold;
    }
    .footer-text {
      text-align:center;
      font-weight:bold;
    }
  </style>
</head>

<body>
  <header>
    <h1 class="header-ttl">Atte</h1>
  </header>
  <div class="register">
    <div class="register-ttl">
      <p>会員登録</p>
    </div>
    <form action="/register" method="POST">
      @csrf
      <div class="register-form">
        <input class="form-name" type="name" name="name" placeholder="   名前">
        <input class="form-email" type="email" name="email" placeholder="   メールアドレス">
        <input class="form-password" type="password" name="password" placeholder="   パスワード">
        <input class="form-check-password" type="password" name="check-password" placeholder="   確認用パスワード">
        <input class="form-submit" type="submit" value="会員登録">
      </div>
    </form>
    <div class="login">
      <p class="login-text">アカウントをお持ちの方はこちらから</p>
      <a class="login-url" href="/login">ログイン</a>
    </div>
  </div>
  <footer>
    <p class="footer-text">Atte,inc.</p>
  </footer>
</body>

</html>
