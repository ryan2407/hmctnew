<?php namespace HMCT\Products;

use Illuminate\Database\Eloquent\Model;

class Surcharge extends Model {

    protected $fillable = ['dates', 'surcharge', 'product_id'];
    protected $table = 'peakrates';

}
