@extends('emails.layouts.main')

@section('content')
<table border="0" cellpadding="20" cellspacing="0" width="600">
    <tr>
        <td width="400">
            <h1>Hi {{ $user->first_name }}</h1>
            <p>You've successfully made a booking</p>
            <p>The details of your booking are below</p>

            <h4>Products you've booked</h4>
            @foreach($product as $product)
                <h4>{{ $product->product_name }}</h4>
            @endforeach
            <table>
                <tr>
                    <td>Dates Booked:</td>
                    <td>{{ $booking->dates }}</td>
                </tr>
                <tr>
                    <td>Booking Terms</td>
                    <td><a target="_blank" href="http://hiremycampertrailer.com.au/terms-conditions.pdf">
                            Download booking terms & conditions
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Admin Area</td>
                    <td>
                        <a href="{{ route('show.user', ['id' => $user->id]) }}">
                            View your booking in your admin area (you may need to login)
                        </a>
                    </td>
                </tr>
            </table>
            <h3>Thanks again, <br/>Dan.</h3>
        </td>
    </tr>
</table>
@endsection
