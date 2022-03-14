@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
<div class="register">
    <div class="register-ttl">
        <p>会員登録</p>
    </div>

    <form action="/register" method="POST">
        @csrf
        <div class="register-form">
            <input class="form-name" type="text" name="name" placeholder="名前">
            <input class="form-email" type="email" name="email" placeholder="メールアドレス">
            <input class="form-password" type="password" name="password" placeholder="パスワード">
            <input class="form-check-password" type="password" name="password_confirmation" placeholder="確認用パスワード">
            <input class="form-submit" type="submit" value="会員登録">
        </div>
    </form>

    <div class="login">
        <p class="login-text">アカウントをお持ちの方はこちらから</p>
        <a class="login-url" href="/login">ログイン</a>
    </div>
</div>
@endsection
