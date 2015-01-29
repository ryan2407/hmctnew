@extends('layouts.admin')

@section('content')
<h1>Create a booking</h1>

{{ Form::open(['method' => 'POST', 'url' => 'bookings']) }}

<div>
    {{ Form::label('date_from', 'Date From' ) }}
    {{ Form::text('date_from') }}
</div>

<div>
    {{ Form::label('date_to', 'Date To' ) }}
    {{ Form::text('date_to') }}
</div>

<div>
    {{ Form::label('product_id', 'Product ID' ) }}
    {{ Form::text('product_id') }}
</div>

<div>
    {{ Form::label('customer_id', 'Customer ID' ) }}
    {{ Form::text('customer_id') }}
</div>

{{ Form::submit('Create booking') }}

{{ Form::close() }}

@endsection
