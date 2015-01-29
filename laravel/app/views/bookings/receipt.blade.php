@extends('layouts.receipt')

@section('content')
    <div class="receiptContainer">
        <div class="image">
            <img src="/images/logo.png" style="width: 150px;">
        </div>
        <h1>Booking Number: {{ $booking->id }}</h1>
        <h2>Booking Details</h2>
        <table>
            <tr>
                <td>Product:</td>
                <td>
                    @foreach($booking->product as $product)
                        {{ $product->product_name }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Dates Booked:</td>
                <td>
                    @foreach(dateHelper($booking->dates) as $date)
                        <div class="date">{{ $date->format('d, M, Y') }}</div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Cost (minus discounts if applied):</td>
                <td>
                    @foreach($booking->product as $product)
                        ${{ $booking->totalCost($product, $booking->dates) }}
                    @endforeach
                </td>
            </tr>
        </table>
        <div class="note">
            <p>Thanks so much for your booking, if you have any questions at all please
            feel free to contact us on (07) 3203 1275 or email dan@hiremycampertrailer.com.au</p>
        </div>
        <a class="button print" href="#" onclick="window.print();">PRINT RECEIPT</a>
        <a class="button" href="{{ route('show.user', ['id' => $booking->user->id]) }}">
            Go back to your admin area
        </a>
    </div><!-- end receiptContainer -->
@endsection
