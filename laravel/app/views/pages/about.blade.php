@extends('layouts.main')

@section('title')
Hire My Camper Trailer - Camper Trailer Hire Brisbane - About Us
@endsection

@section('description')
    Hire my camper trailer are a small family run Brisbane based company dedicated to making
    camper trailer hire and camper trailer rental affordable and easy.
@endsection

@section('content')
<div class="container">
    <div class="primary">
        <h1>About Hire My Camper Trailer</h1>
        <p>Do you love camping, but can't get away enough through the year to
            justify the expense of equipment? Does the hassle of packing for
            a camping trip with kids make you shudder at the thought? Perhaps
            you are new to camping and don't know where to start? Or maybe you
            simply don't have room at home to store everything you need to making
            camping a comfortable experience. Whichever the case, you have come
            to the right place!</p>
        <p>Here at Hire My Camper Trailer, our aim is to make camping a fun,
            comfortable and affordable experience for you and your family. We
            have taken all the guess work out of what to pack and each one of
            our camper trailers is fully equipped to cater for four people at
            our inclusive rate - all you need is your linen. So you wont need
            to worry about lighting, kitchen equipment, seating, beds, an esky,
            camping tools, or any of those other little things that making
            packing a long and time consuming process. We have done it all for
            you. Just hook up and go! We will provide you with all instructions
            to set up your camp site and even give a demonstration before you
            leave for your trip.</p>
        <p>For the more experienced or adventurous camper, our campers Trailers
            have enough room to bring your own gear. And you can easily hire
            additional equipment or sleeping and kitchen packs from our hire
            store. Please read through our Inclusions Policy for a full list of
            what we provide in our trailers.</p>
        <p>With campers that can cater for 2, 4 or even up to 8 people, why not
            book your next family trip with us! If you need any more information
            on our campers or policies, Dan is only too happy to help. Just give
            him a call on 0404 741 393. Enjoy your trip!</p>
    </div>

    <div class="secondary">
        @include('pages.sidebar.camperSidebar')
    </div>
    <div style="clear:both;"></div>
</div><!-- end container -->
@endsection
