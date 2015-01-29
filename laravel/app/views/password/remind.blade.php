@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Reset your password</h1>
        <p>Please enter your registered email in the form below and we'll send you a link to
        reset your password.</p>
        <form action="{{ action('RemindersController@postRemind') }}" method="POST">
            <label>Email Address:</label>
            <input type="email" name="email">
            <input type="submit" value="Send Reminder">
        </form>
    </div><!-- end container -->
@endsection
