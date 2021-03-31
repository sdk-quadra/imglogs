@extends('layouts.app')

@section('content')
<body>
    <header>
        <div class="header__contents">
            <div class="header__logo">
                <a href="/" class="header__logo-link">IMGLOGS!</a>
            </div>

            <div class="header__icon">
                <div class="header__img-upload">
                    {!! Form::open(['url' => route('images.store'), 'files' => true, 'id' => 'header__img-upload-form']) !!}

                    <label for="img"><i class="far fa-plus-square"></i></label>
                    {!! Form::label('img', '', ['class' => 'header__img-upload-hidden-label']) !!}

                    {!! Form::file('img', ['class' => 'header__img-upload-hidden-file']) !!}
                    {!! Form::submit('アップする', ['class' => 'header__img-upload-hidden-submit']) !!}
                    {!! Form::close() !!}
                </div>

                <div class="header__account">
                    <a href="{{ action('UserController@edit', $user->id) }}" class="header__account-link"><i class="fas fa-user-alt"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div id="account-update">
        <div class="account-update__contents domain">
            <h2 class="account-update__desc">
                アカウント情報を更新
            </h2>

            @if (session('account-update-status'))
                <div class="alert alert-success">
                    {{ session('account-update-status') }}
                </div>
            @endif

                {!! Form::open(['url' => route('users.update', $user->id), 'class' => 'account-update__form']) !!}
                    @method('PUT')
                    {!! Form::text('name', $user->name, ['placeholder' => 'ユーザーネーム', 'class' => 'account-update__form-username input-text']) !!}
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {!! Form::password('password', ['placeholder' => 'パスワード', 'class' => 'account-update__form-password input-text']) !!}
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    {!! Form::password('password_confirmation', ['id' => 'password-confirm','placeholder' => 'パスワード確認', 'class' => 'account-update__form-password input-text']) !!}

                    {!! Form::submit('更新する', ['class' => 'account-update__form-submit cta']) !!}
                {!! Form::close() !!}

        </div>
        <div class="account-update__out domain complement">
            <div class="account-update__logout complement__desc">
                {!! Form::open(['url' => route('logout'), 'class' => 'account-update__logout-form']) !!}
                {!! Form::submit('ログアウトする', ['class' => 'account-update__logout-link complement__desc-link']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
@endsection
