<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','category_id','sub_category_id','brand_id','short_desc','long_desc','price','old_price','shipping_cost','delivery_date','return_time','seller','logo','code','availability','feature', 'special'];

    public function category()
    {
        # code...
        return $this->belongsTo(\App\Category::class, 'category_id','id');
    }

    public function subcategory()
    {
        # code...
        return $this->belongsTo(\App\SubCategory::class, 'sub_category_id','id');
    }

    public function brand()
    {
        # code...
        return $this->belongsTo(\App\Brand::class, 'brand_id','id');
    }

    public function color()
    {
        # code...
        return $this->belongsTo(\App\Color::class, 'color_id','id');
    }

    public function size()
    {
        # code...
        return $this->belongsTo(\App\Size::class, 'size_id','id');
    }
}
