<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //
    public function color()
    {
        # code...
        return $this->belongsTo(\App\Color::class, 'color_id', 'id');
    }
}
