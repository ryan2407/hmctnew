@extends('layouts.main')

@section('title')
    Camper Trailer Hire Brisbane - Hire My Camper Trailer - {{ $product->product_name }}
@endsection

@section('content')
@if($product)
    <div class="container">
        <div class="primary">
            @if($product->product_images)
                <div class="camperHero">
                    <img src="/uploads/{{ unserialize($product->product_images)[0] }}">
                    <h1>{{ $product->product_name }}</h1>
                </div>
            @endif

            {{ $product->product_description }}

            <div style="clear: both;"></div>
            <div class="gallery" style="margin-top: 20px;">
                <h1>The Gallery</h1>
                <div class="galleryImages">
                    @if($product->product_images)
                        @foreach(unserialize($product->product_images) as $image)
                            @if($image)
                                <a class="fancybox" href="/uploads/{{ $image }}" rel="gallery">
                                    <img src="/uploads/thumbs/{{ $image }}" style="width: 150px;">
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div><!-- end galleryImages -->
            </div>

        </div><!-- end primary -->
        <div class="secondary">
            <h1>Rates</h1>
            <h2 class="red">{{ money($product->product_cost) }} per day</h2>
            <h1>Book Now!</h1>
            <h2>Select your dates</h2>
            <p class="note">Please select what dates you want to hire this camper on the calendar below.
            Just click on the dates you wish to hire the camper.</p>
            <div class="calendar"></div>
            <div class="validation" style="display: none;"></div>
            @if(! Auth::check())
                <p>Please note: you need to have a customer account with Hire My Camper Trailer
                    to secure a booking, setting up an account is easy, just fill out the form below.</p>
                {{ Form::open(['method' => 'POST', 'route' => ['store.user'], 'class' => 'ajax']) }}
                    <div>
                        <label for="first_name">First Name:</label>
                        {{ Form::text('first_name') }}
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        {{ Form::text('last_name') }}
                    </div>
                    <div>
                        <label for="phone">Phone Number:</label>
                        {{ Form::text('phone') }}
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        {{ Form::email('email') }}
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        {{ Form::password('password') }}
                    </div>
                    <div>
                        <label for="password_confirmation">Password Confirm:</label>
                        {{ Form::password('password_confirmation') }}
                    </div>
                    <input type="submit" value="Create an account">
                {{ Form::close() }}
            @endif

            @if(Auth::check())

                <div class="customerNotify">
                    <h3>Welcome {{ Auth::user()->first_name }}</h3>
                    <p>To make a booking select available dates on the calendar above.</p>
                </div>

                {{ Form::open(['method' => 'POST', 'id' => 'payment-form', 'route' => ['store.booking']]) }}

                    {{ Form::hidden('user_id', Auth::user()->id) }}
                    {{ Form::hidden('dates', null, ['id' => 'dates']) }}
                    {{ Form::hidden('product_id', $product->id) }}
                    {{ Form::hidden('deposit', null, ['class' => 'deposit']) }}

                    <div class="alert">PLEASE NOTE: By ticking the box below you are agreeing that:
                        <ol>
                            <li>You have read our <a href="/terms-conditions.pdf" target="_blank">Terms and Conditions</a> and fully understand them</li>
                            <li>You are over the age of 25</li>
                            <li>Your vehicle that is towing the camper has fully comprehensive insurance
                            and a standard, professionally fitted towbar.</li>
                        </ol>
                    </div>
                    <div>
                        {{ Form::checkbox('terms', 'yes') }} I understand the terms as stated above
                    </div>
                <div class="checkout">
                    <div class="summarWrapper">
                        <h4>Products you're booking</h4>
                        <div class="summary">
                        </div>
                        @if($product->surcharge)
						    <p class="surcharge" style="display:none;">Surcharge per day for peak times: <span class="right">${{ $product->surcharge->surcharge / 100 }}</span></p>
                        @endif
                    </div>

                    <div class="total">
                        <h2 class="red">Deposit payable: <span class="deposit"></span></h2>
                        <h3 class="red">Total cost: <span class="total"></span></h3>
                    </div>

                    <h1>Checkout</h1>
                    <span class="payment-errors"></span>

                    <h3>Your card will be charged a 50% deposit of <span class="deposit"></span></h3>
                    <div class="form-row">
                        <label>Card Number</label>
                        <input type="text" size="20" data-stripe="number"/>
                    </div>

                    <div class="form-row">
                        <label>CVC</label>
                        <input type="text" size="4" data-stripe="cvc"/>
                    </div>

                    <div class="form-row">
                        <label>Expiration (MM/YYYY)</label>
                        <input type="text" size="2" data-stripe="exp-month" style="width:80px;" placeholder="MM"/>/<input type="text" size="4" data-stripe="exp-year" style="width: 120px;" placeholder="YYYY"/>
                    </div>
                    {{ Form::submit('Make a booking') }}
                    <div class="alert" style="margin-top: 20px;">
                        <p>You will be redirected to your booking confirmation after successful payment</p>
                        <p>You will be charged the remaining <span class="deposit"></span> when
                            you pickup the camper in-store.</p>
                    </div><!-- end alert -->
                </div><!-- end checkout -->

                {{ Form::close() }}
            @endif
        </div><!-- end secondary -->
        <div style="clear: both;"></div>
    </div><!-- end container -->

    <?php $dates = []; ?>
    <?php foreach($product->booking as $booking): ?>
        <?php $dates[] = addQuote($booking->dates); ?>
    <?php endforeach; ?>
    <script>
        $(document).ready(function(){
            var array = [<?php echo implode(',', $dates); ?>];
            $('div.calendar').multiDatesPicker({
                altField: '#dates',
                dateFormat: 'mm-dd-yy',
                minDate: 0,
                beforeShowDay: function(date){
                    var string = jQuery.datepicker.formatDate('mm-dd-yy', date);
                    return [ array.indexOf(string) == -1 ]
                },
                onSelect: function(){
                    ajaxGetRates();
                }
            });

            $('#payment-form').on('click', function(){
                if($('input[name=terms]:checked')) {
                    ajaxGetRates();
                }
            });

            $('#payment-form').submit(function(event) {
                var $form = $(this);
                $form.find('button').prop('disabled', true);
                Stripe.card.createToken($form, stripeResponseHandler);
                return false;
            });

            function stripeResponseHandler(status, response) {
                var $form = $('#payment-form');

                if (response.error) {
                    $form.find('.payment-errors').text(response.error.message).css('display', 'block');
                    $form.find('button').prop('disabled', false);
                } else {
                    var token = response.id;
                    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                    $form.get(0).submit();
                }
            };
            function ajaxGetRates() {
                $.ajax({
                    url: '/getrates',
                    data: $('#payment-form').serialize(),
                    type: "POST",
                    success: function(data) {
                        $('div.customerNotify').fadeOut();
                        $('div.validation').empty().hide();
                        $('div.checkout').show();
                        $('span.surcharge').text(data.surcharge / 100);
                        if(data.surcharge > 0){ $('p.surcharge').show(); }
                        $('span.deposit').text('$'+(data.baserate + data.surcharge) * 0.5 / 100);
                        $('input.deposit').val((data.baserate + data.surcharge) * 0.5);
                        $('span.total').text('$'+(data.baserate + data.surcharge) / 100);
                        $('div.summary').empty();
                        $(data.products).each(function(){
                            $('div.summary').append('<div class="product"><p class="name">'+this.product_name+' <span class="cost">Per day $'+this.product_cost / 100+'</span></p></div>');
                        });
                    }
                }).done(function(response){
                    if(response.errors) {
                        $('div.checkout').hide();
                        $.each(response.message, function(){
                            $('div.validation').show().append('<p>'+this+'</p>');
                        });
                    }
                });
            }
        });
    </script>
@else
    <div class="container">
        <h1>Product not found</h1>
        <p>So sorry but this camper couldn't be found</p>
    </div>
@endif
@endsection
