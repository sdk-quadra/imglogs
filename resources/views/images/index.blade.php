@extends('layouts.app')

@section('content')
    <header>
        <div class="header__contents">
            <div class="header__logo">
                IMGLOGS!
            </div>

            <div class="header__icon">
                <div class="header__img-upload">
                    <i class="far fa-plus-square"></i>
                </div>

                <div class="header__account">
                    <i class="fas fa-user-alt"></i>
                </div>
            </div>
        </div>
    </header>

    {!! Form::open(['url' => route('images.store'), 'files' => true]) !!}
    {!! Form::file('img') !!}
    {!! Form::submit('アップする') !!}
    {!! Form::close() !!}

    <div id="post-index">
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

                @if(($loop->iteration) % 3 == 0)
                    </div>
                @endif
            @endforeach

{{--            <div class="post-index__loading">--}}
{{--                <img class="post-index__loading-img" src="./images/loading.gif">--}}
{{--            </div>--}}

        </div>
    </div>

@endsection
