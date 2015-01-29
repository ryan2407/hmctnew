@extends('layouts.main')

@section('title')
Hire My Camper Trailer - Camper Trailer Hire Brisbane - Contact Us
@endsection

@section('description')
    Contact Hire my camper trailer for our rates on camper trailer hire and camper trailer rentals
    in the Brisbane metro area
@endsection

@section('content')
<div class="container">
    <div class="primary">
        <h1>Contact Hire My Camper Trailer</h1>
        <p><strong>Address:</strong> Shop 5/657 Deception Bay Rd<br/>Deception Bay QLD 4508</p>
        <p><strong>Phone:</strong> 0404 741 393</p>
        <p><strong>Email:</strong> dan@hiremycampertrailer.com.au</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3548.4365999759207!2d153.0389905!3d-27.205439!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b93ef8aa5731b1f%3A0x331b4ced2e770d3!2s657+Deception+Bay+Rd%2C+Deception+Bay+QLD+4508%2C+Australia!5e0!3m2!1sen!2s!4v1415822752994" width="600" height="450" frameborder="0" style="border:0"></iframe>
    </div>
    <div class="secondary">
        @include('pages.sidebar.camperSidebar')
    </div>
    <div style="clear:both;"></div>

</div><!-- end container -->
@endsection
