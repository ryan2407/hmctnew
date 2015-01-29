@extends('layouts.admin')

@section('content')
    <h1>Hire a camper trailer</h1>

    <h2>Step One</h2>
    <p>Choose a camper trailer</p>

    @foreach($products as $product)
        <div class="product">
            <a data-url="{{ route('show.product', ['id' => $product->id]) }}" data-id="{{ $product->id }}">
            {{ $product->product_name }}<br/>
            {{ money($product->product_cost) }} per night
            </a>
        </div>
    @endforeach

    <div style="clear:both;"></div>

    <h3>Availability</h3>
    <div id="avails">
        <div class="datepicker"></div>
    </div>

    <hr>

    <h2>Step Two</h2>
    <p>Available additional extras</p>
    <div id="addons"></div>
    <div style="clear:both;"></div>
    <hr>

    {{ Form::open(['method' => 'POST', 'id' => 'bookingForm', 'route' => ['store.booking']]) }}
        {{ Form::text('campers', '', ['id' => 'camper']) }}
        {{ Form::text('dates', '', ['id' => 'dateHidden']) }}
        {{ Form::text('customer_id', '1') }}
        {{ Form::submit('Book camper') }}
    {{ Form::close() }}

    <div class="orderSummary">
        <h2>Your current order</h2>
        <h3 id="deposit"></h3>
        <h3 id="total"></h3>
    </div>

    <script>
        $(document).ready(function(){

            $('div.container').on('click', 'div.product a', function(){
                $(this).addClass('selected');
                $(this).parent('div.product').siblings().find('a').removeClass('selected');
                $('input#camper').val($(this).data('id'));
                $( ".datepicker" ).multiDatesPicker('resetDates');

                $.ajax({
                    method: 'GET',
                    url: $(this).data('url'),
                    success: function(response) {
                        getBookingDates(JSON.parse(response));
                    }
                }).done(function(){
                    console.log('finished');
                });
                getAjaxPrice();
            });

            $('div.container').on('click', 'div.addon a', function(){
                $(this).toggleClass('selected');
                if($('input#camper').val().indexOf($(this).data('id')) == -1) {
                    $('input#camper').val($('input#camper').val()+', ' + $(this).data('id'));
                } else {
                    var str = $('input#camper').val();
                    var updated = str.replace(', '+$(this).data('id'), '');
                    $('input#camper').val(updated);
                }
                getAjaxPrice();
            });
        });
    </script>
@endsection
