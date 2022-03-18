@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('content')
<div class="login">
    <div class="login-ttl">
        <p>ログイン</p>
    </div>

    <form action="/login" method="POST">
        @csrf
        <div class="login-form">
            <input class="form-email" type="email" name="email" placeholder="メールアドレス">
            <input class="form-password" type="password" name="password" placeholder="パスワード">
            <input class="form-submit" type="submit" value="ログイン">
        </div>
    </form>

    <div class="register">
        <p class="register-text">アカウントをお持ちでない方はこちらから</p>
        <a class="register-url" href="/register">会員登録</a>
    </div>
</div>
@endsection
