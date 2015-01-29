@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="primary">
            <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
    
            <h2>Your Bookings</h2>
    
            @foreach($user->bookings as $booking)
            <table class="bookings">
                <tr>
                    <td>Booking Number</td>
                    <td>{{ $booking->id }}</td>
                </tr>
                <tr>
                    <td>Products</td>
                    <td>
                        @foreach($booking->product as $product)
                         {{ $product->product_name }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Dates Booked</td>
                    <td>
                        @foreach(dateHelper($booking->dates) as $date)
                         <div class="date">{{ $date->format('d, M, Y') }}</div>
                        @endforeach
                    </td>
                </tr>
                @if($booking->deposit)
                    <tr>
                        <td>Deposit Amount</td>
                        <td>${{ $booking->deposit }}</td>
                    </tr>
                @endif
                @if($booking->discount)
                    <tr>
                        <td>Discounts</td>
                        <td>${{ $booking->discount }}</td>
                    </tr>
                @endif
                <tr>
                    <td>View Receipt</td>
                    <td><a href="{{ route('booking.receipt', ['id' => $booking->id]) }}">View Receipt</a></td>
                </tr>
            </table>
            @endforeach
        </div><!-- end primary -->
        <div class="secondary">

        </div>
        <div style="clear: both;"></div>
    </div>

@endsection
