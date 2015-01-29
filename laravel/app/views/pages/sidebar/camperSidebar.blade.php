<h1>Our Campers</h1>
@foreach($products as $product)
<div class="camper">
    @if($product->product_images)
    <a href="{{ route('show.product', ['id' => $product->id]) }}">
        <img src="/uploads/{{ unserialize($product->product_images)[0] }}">
    </a>
    @endif
    <h2>{{ $product->product_name }}</h2>
    <h3 class="red">{{ money($product->product_cost) }} per day</h3>
    <p>{{ $product->excerpt }}</p>
    <a class="book" href="{{ route('show.product', ['id' => $product->id]) }}">Read More</a>
</div>
@endforeach
