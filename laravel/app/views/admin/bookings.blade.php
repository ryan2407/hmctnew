<h1>All bookings</h1>
    @foreach($bookings as $booking)
        <div class="booking" style="border-bottom: 1px solid #444;padding: 10px 0;">
            @if(is_object($booking))
                {{ $booking->user->first_name }} {{ $booking->user->last_name }}<br/>
                <strong>Products:</strong>
                @foreach($booking->product as $product)
                    {{ $product->product_name }}
                @endforeach
                <br/>
                <strong>Dates:</strong>
                {{ fromTo($booking->dates) }}
                <br/>
                <strong>Total Cost:</strong>
                ${{ $booking->totalCost($booking->product->first(), $booking->dates) }}
            @endif
            <div class="buttons">
                {{ link_to_route('admin.booking.show', 'See Booking', ['id' => $booking->id]) }}
            </div>
        </div>
    @endforeach
