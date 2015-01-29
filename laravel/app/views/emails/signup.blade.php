@extends('emails.layouts.main')

@section('content')
    <table border="0" cellpadding="20" cellspacing="0" width="600">
        <tr>
            <td width="400">
                <h1>Hi {{ $first_name }}</h1>
                <p>Welcome to Hire My Camper Trailer, and thanks so much for signing up.</p>
                <p>Now that you have an account with us you can make bookings on our site and
                view them via your admin area.</p>
                <p>We may use your details to contact you if there are any problems or
                general information about any of your bookings.</p>
                <p>If you have any questions at all please don't hesitate to contact Dan on
                (07) 3203 1275 or dan@hiremycampertrailer.com.au</p>
                <h3>Thanks again, <br/>Dan.</h3>
            </td>
        </tr>
    </table>
@endsection
