@extends('layouts.app')

@section('content')
<body class="before-login">
    <div id="pass-reminder">
        <div class="pass-reminder__contents domain">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <h1 class="signup__logo">
                IMGLOGS!
            </h1>
            <h2 class="pass-reminder__desc">
                ログインできない場合
            </h2>

            <div class="pass-reminder__sub-desc">
                メールアドレスを入力してください<br />
                アカウントにアクセスするためのリンクをお送りします
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="pass-reminder__form">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror pass-reminder__form-email input-text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="submit" class="pass-reminder__form-submit cta btn btn-primary" value="送信する">
            </form>
        </div>

        <div class="pass-reminder__back domain complement">
            <div class="pass-reminder__back-to-login complement__desc"><a class="pass-reminder__back-to-login-link complement__desc-link" href="{{ route('login') }}">ログインに戻る</a></div>
        </div>
    </div>

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <form method="POST" action="{{ route('password.email') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Send Password Reset Link') }}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</body>
@endsection
