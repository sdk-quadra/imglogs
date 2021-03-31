@extends('layouts.app')

@section('content')
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
                    <a href="{{ action('UserController@edit', $user_id) }}" class="header__account-link"><i class="fas fa-user-alt"></i></a>
                </div>
            </div>
        </div>
    </header>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('image-upload-status'))
        <div class="alert alert-success">
            {{ session('image-upload-status') }}
        </div>
    @endif

    <div id="post-index">

        <div class="post-index__wrapper">
            <div class="post-index__contents">

                @foreach($images as $image)
                    @if(($loop->iteration) % 3 == 1)
                        <div class="post-index__row">
                    @endif
                            <div class="post-index__uploaded">
                                <i class="fas fa-ellipsis-v"></i>
                                <img class="post-index__uploaded-img" src="{{ asset('storage')}}/{{ $image->img }}">
                                <div class="post-index__uploaded-username">{{ $image->user->name }}</div>
                            </div>

                    @if(($loop->iteration) % 3 == 0 || ($loop->last))
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

        <image-index v-bind:loading="'{{$loading}}'"></image-index>
        <div id="post-index__last-page">
            {{$images->lastPage()}}
        </div>

    </div>
@endsection
