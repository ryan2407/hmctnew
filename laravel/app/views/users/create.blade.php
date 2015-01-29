@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create an account</h1>

        {{ Form::open(['action' => 'POST', 'url' => 'user']) }}

            <div>
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name') }}
            </div>

            <div>
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name') }}
            </div>

            <div>
                {{ Form::label('phone', 'Phone') }}
                {{ Form::text('phone') }}
            </div>

            <div>
                {{ Form::label('email', 'Email Address') }}
                {{ Form::text('email') }}
            </div>

            <div>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </div>

            <div>
                {{ Form::label('password_confirmation', 'Password Confirm') }}
                {{ Form::password('password_confirmation') }}
            </div>

            {{ Form::submit() }}

        {{ Form::close() }}
    </div>

@endsection()
