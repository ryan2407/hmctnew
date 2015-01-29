@extends('layouts.main')

@section('title')
Hire My Camper Trailer - Camper Trailer Hire Brisbane - Our Rates
@endsection

@section('description')
    Hire my camper trailer camper trailer hire and camper trailer rental rates are highly competitive
    and come with everything you need for your next camping trip, just hook up and drive away!
@endsection

@section('content')
<div class="container">
    <div class="primary">
        <h1>Hire My Camper Trailer - Rates</h1>
        <p>See our rates for our Camper Trailers, 'The Kinkuna', 'Airlie I' and 'Airle II'. Our rates are competitive and
            flexible. If you have any questions please don't hesitate to <a href="/contact">contact us.</a></p>

        <table class="rateTable">
            <tr>
                <th>Rate Name</th>
                <th>Dates</th>
                <th>Cost Per Day</th>
            </tr>
            <tr>
                <td>Holiday Peak</td>
                <td>All QLD school holidays</td>
                <td>$80 day, 5 day minimum</td>
            </tr>
            <tr>
                <td>Off Peak</td>
                <td>Any times not listed above</td>
                <td>$80 per day, 3 day minimum</td>
            </tr>
        </table>
    </div>

    <div class="secondary">
        @include('pages.sidebar.camperSidebar')
    </div>
    <div style="clear:both;"></div>
</div><!-- end container -->
@endsection
