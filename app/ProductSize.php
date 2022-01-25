<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    //
    public function size()
    {
        # code...
        return $this->belongsTo(\App\Size::class, 'size_id', 'id');
    }
}
