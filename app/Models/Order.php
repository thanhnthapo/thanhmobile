<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
    	'product_id',
    	'product_name',
    	'product_img', 
    	'qty', 
    	'price',
    	'total_price',
    	'customer_name',
    	'customer_email',
    	'customer_address',
    ];

    public function product() 
    {
    	return $this->hasMany(product::class, 'product_id', 'id')
    }
}
