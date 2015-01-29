<h1>View Booking</h1>
@if($booking)
    <strong>{{ $booking->product->first()->product_name }}</strong><br/>
    From: {{ $booking->date_from }} <br/>
    To: {{ $booking->date_to }}<br/>
    Cost: ${{ $booking->product->first()->product_cost / 100 }}
@endif
