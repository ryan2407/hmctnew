<?php namespace HMCT\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['product_name', 'excerpt', 'product_description', 'product_cost', 'product_features', 'product_images', 'category'];

    public function booking()
    {
        return $this->belongsToMany('HMCT\Bookings\Booking')->withTimestamps();
    }

    public function surcharge()
    {
        return $this->hasOne('HMCT\Products\Surcharge');
    }

} 
