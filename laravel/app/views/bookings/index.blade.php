<h1>All Bookings</h1>

@if($bookings)
    @foreach($bookings as $booking)
    <div class="booking">
        <h2>
            {{ $booking->customer->name }} - Dates: {{ $booking->date_from }} - {{ $booking->date_to }}
        </h2>
        <h2>Products</h2>
        @foreach($booking->product as $product)
         <p>{{ $product->product_name }}</p>
        @endforeach
    </div>
    @endforeach
@endif
