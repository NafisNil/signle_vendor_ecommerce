<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        # code...
        return $this->belongsTo(\App\Category::class, 'category_id','id');
    }
}
