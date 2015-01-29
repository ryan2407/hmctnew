@extends('layouts.main')

@section('title')
Hire My Camper Trailer - Camper Trailer Hire Brisbane - Camper Trailer Setup
@endsection

@section('description')
    Setup instructions for our camper trailer hire and camper trailer rentals, setup is quick and easy
    see our videos on how to get going on your next camping holdiay
@endsection

@section('content')
<div class="container">
    <div class="primary">
        <h1>Hire My Camper Trailer - Camper Traile Setup Videos</h1>
        <p>See the setup videos for our camper trailers below.</p>
        <p>Please Note each Main tent setup is slightly different depending on what camper is hired.
            We will give you a setup demonstration on pickup.</p>
        <iframe width="663" height="403" src="//www.youtube.com/embed/bSFtsHrOSL8" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="secondary">
        @include('pages.sidebar.camperSidebar')
    </div>
    <div style="clear:both;"></div>
</div><!-- end container -->
@endsection
