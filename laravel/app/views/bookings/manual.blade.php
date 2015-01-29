@extends('layouts.main')

@section('content')
<div class="container">
<h1>Create a manual booking</h1>

{{ Form::open(['method' => 'POST', 'url' => 'admin/bookings']) }}

<div class="calendar"></div>

<div>
    {{ Form::label('product_id', 'Product ID' ) }}
    {{ Form::text('product_id') }}
</div>

<div>
    {{ Form::label('dates', 'Dates' ) }}
    {{ Form::text('dates', null, ['id' => 'dates']) }}
</div>

<div>
    {{ Form::label('user_id', 'Customer ID' ) }}
    {{ Form::text('user_id') }}
</div>

<div>
    {{ Form::label('deposit', 'Deposit Amount' ) }}
    {{ Form::text('deposit') }}
</div>

<div>
    {{ Form::label('discount', 'Discount Amount' ) }}
    {{ Form::text('discount') }}
</div>

<div>
    {{ Form::checkbox('terms', 'yes') }} I understand the terms as stated above
</div>

{{ Form::submit('Create booking') }}

{{ Form::close() }}

</div>

<script>
    $(document).ready(function(){
        $('div.calendar').multiDatesPicker({
            altField: '#dates',
            dateFormat: 'mm-dd-yy',
            minDate: 0
        });
    })
</script>

@endsection
