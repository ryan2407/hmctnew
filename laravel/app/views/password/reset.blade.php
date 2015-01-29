@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Reset your password</h1>

    <form action="{{ action('RemindersController@postReset') }}" method="POST" class="reset">
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label>Email Address:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <label>Password Confirmation</label>
            <input type="password" name="password_confirmation">
        </div>
        <input type="submit" value="Reset Password">
    </form>
</div>
@endsection
