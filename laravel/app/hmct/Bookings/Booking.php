<?php namespace HMCT\Bookings;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

    protected $fillable = ['dates', 'user_id', 'product_id', 'deposit', 'discount'];

    public function user()
    {
        return $this->belongsTo('HMCT\Users\User');
    }

    public function product()
    {
        return $this->belongsToMany('HMCT\Products\Product')->withTimestamps();
    }

    public function totalCost($product, $dates)
    {
        $dateArray = explode(', ', $dates);
        $discountArray = [];
        foreach($product->booking as $booking) {
            $discountArray[] = $booking->discount;
        }
        $cost = count($dateArray) * $product->product_cost / 100 - array_sum($discountArray);
        return $cost;
    }



} 
