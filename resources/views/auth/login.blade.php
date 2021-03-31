@extends('layouts.app')

@section('content')
<body class="before-login">
    <div id="login">
        <div class="login__contents domain">
            <h1 class="login__logo">
                IMGLOGS!
            </h1>
            <h2 class="login__desc">
                イケてる画像をアップ!
            </h2>

            {!! Form::open(['url' => route('login'), 'class' => 'login__form']) !!}
                {!! Form::email('email', null, ['placeholder' => 'メールアドレス', 'class' => 'login__form-email input-text']) !!}
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                {!! Form::password('password', ['placeholder' => 'パスワード', 'class' => 'login__form-password input-text']) !!}
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                {!! Form::checkbox('remember',__('Remember Me'), false, ['id' => 'remember']) !!}
                {!! Form::label('remember',__('Remember Me')) !!}
                {!! Form::submit('ログインする', ['class' => 'login__form-submit cta']) !!}
            {!! Form::close() !!}

            @if (Route::has('password.request'))
                <div class="login__forget-password">
                    <a class="login__forget-password-link" href="{{ route('password.request') }}">パスワードを忘れた場合</a>
                </div>
            @endif
        </div>

        <div class="login__has-no-account domain complement">
            <div class="login__has-no-account-desc complement__desc">まだアカウントがありませんか？</div>
            <div class="login__has-no-account-signup complement__desc"><a class="login__has-no-account-signup-link complement__desc-link" href="{{ route('register') }}">登録する</a></div>
        </div>
    </div>

</body>
@endsection
