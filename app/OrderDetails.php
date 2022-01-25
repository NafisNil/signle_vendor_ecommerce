<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function color()
    {
        # code...
        return $this->belongsTo(Color::class, 'color_id','id');
    }

    public function size()
    {
        # code...
        return $this->belongsTo(Size::class, 'size_id','id');
    }

    public function Brand()
    {
        # code...
        return $this->belongsTo(Brand::class, 'brand_id','id');
    }
}
