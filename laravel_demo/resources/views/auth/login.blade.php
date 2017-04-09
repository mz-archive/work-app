@extends('layouts.app')

@section('content')
<body class="login-page">
<div class="login-box">
        <div class="logo">
            <a href="{{ url('/') }}"><b>{{ config('app.name', 'Laravel') }}</b></a>
            <small>Custom Application</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="msg">Введите данные для входа</div>

                    <!-- E-mail -->

                    <div class="input-group">

                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>


                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="E-mail" required autofocus>
                        </div>

                    </div>
                 

                    <!-- Password -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink" {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberme">Запомнить меня</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Войти</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}">Зарегистрироваться</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="{{ route('password.request') }}">Забыли пароль?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- <script src="/js/app.js"></script> -->

    <!-- Jquery Core Js -->
    <script src="/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="/js/admin.js"></script>
    <script src="/js/pages/examples/sign-in.js"></script>
</body>
@endsection

