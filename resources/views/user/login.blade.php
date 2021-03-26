@extends('layout/application')

@section('content')

    {!! Form::open(['url' => '/users']) !!}
    {!! Form::token() !!}
    {!! Form::text('name', null, ['placeholder' => 'ユーザーネーム']) !!}
    {!! Form::text('email', null, ['placeholder' => 'メールアドレス']) !!}
    {!! Form::password('password', ['placeholder' => 'パスワード']) !!}
    {!! Form::submit('登録する') !!}
    {!! Form::close() !!}
@endsection
