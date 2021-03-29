@extends('layouts.app')

@section('content')
<body class="before-login">
    <div id="signup">
        <div class="signup__contents domain">
            <h1 class="signup__logo">
                IMGLOGS!
            </h1>
            <h2 class="signup__desc">
                アカウント作成
            </h2>

            {!! Form::open(['url' => route('register'), 'class' => 'signup__form']) !!}
                {!! Form::token() !!}
                {!! Form::email('email', null, ['placeholder' => 'メールアドレス', 'class' => 'signup__form-email input-text']) !!}
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                {!! Form::text('name', null, ['placeholder' => 'ユーザーネーム', 'class' => 'signup__form-username input-text']) !!}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                {!! Form::password('password', ['placeholder' => 'パスワード', 'class' => 'signup__form-password input-text']) !!}
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                {!! Form::password('password_confirmation', ['id' => 'password-confirm','placeholder' => 'パスワード確認', 'class' => 'signup__form-password input-text']) !!}
                {!! Form::submit('登録する', ['class' => 'signup__form-submit cta']) !!}
            {!! Form::close() !!}

        </div>

        <div class="signup__has-account domain complement">
            <div class="signup__has-account-desc complement__desc">アカウントを持っていますか？</div>
            <div class="signup__has-account-login complement__desc"><a class="signup__has-account-login-link complement__desc-link" href="{{ route('login') }}">ログインする</a></div>
        </div>
    </div>

</body>
@endsection
