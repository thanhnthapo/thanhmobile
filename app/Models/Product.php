<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'img',
    	'category_id', 
    	'product_code', 
    	'price',
        'sale_price',
    	'new',
    	'like',
    	'qty', 
    	'decription',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id','id');
    }
}
