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
    .login {
      background-color:#EEEEEE;
      height:500px;
    }
    .login-ttl {
      font-weight:bold;
      text-align:center;
      font-size:20px;
      padding-top:30px;
    }
    .login-form {
      display: flex;
      flex-direction: column;
      width:  28%;
      margin:0px auto;
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
    .form-submit {
      margin:10px;
      height:40px;
      background-color:#4169E1;
      color:white;
      border-radius:5px;
    }
    .register {
      width:30%;
      margin:0px auto;
    }
    .register-text {
      text-align:center;
      color:#888888;
    }
    .register-url {
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
  <div class="login">
    <div class="login-ttl">
      <p>ログイン</p>
    </div>
    <form action="/login" method="POST">
      @csrf
      <div class="login-form">
        <input class="form-email" type="email" name="email" placeholder="   メールアドレス">
        <input class="form-password" type="password" name="password" placeholder="   パスワード">
        <input class="form-submit" type="submit" value="ログイン">
      </div>
    </form>
    <div class="register">
      <p class="register-text">アカウントをお持ちでない方はこちらから</p>
      <a class="register-url" href="/register">会員登録</a>
    </div>
  </div>
  <footer>
    <p class="footer-text">Atte,inc.</p>
  </footer>
</body>

</html>
