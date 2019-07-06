<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Detail extends Model
{
    protected $fillable = [
    	'img',
    	'product_id',
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id','id');
    }
}
