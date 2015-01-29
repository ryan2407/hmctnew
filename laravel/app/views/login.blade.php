@extends('layouts.main')

@section('content')
<div class="container">
    <div class="primary">
        <div class="loginBox">
            <h1>Login</h1>
            {{ Form::open(['url' => 'POST', 'url' => '/login']) }}

            <div>
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email') }}
            </div>
            <div>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </div>

            {{ Form::submit() }}

            {{ Form::close() }}

            <a href="/password/remind">Reset your password</a>
        </div>
    </div>
    <div style="clear:both;"></div>
</div><!-- end container -->
@endsection
