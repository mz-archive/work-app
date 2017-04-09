@extends('layouts.app')

@section('content')
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="{{ url('/') }}"><b>{{ config('app.name', 'Laravel') }}</b></a>
            <small>Custom Application</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="msg">Регистрация нового пользователя</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Введите ваше имя" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Введите ваш e-mail" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Введите пароль" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Введите пароль еще раз" required>
                        </div>
                    </div>


                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Зарегистрироваться</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ url('/') }}">Вы уже зарегестрированы?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <script src="/js/pages/examples/sign-up.js"></script>
</body>
@endsection
