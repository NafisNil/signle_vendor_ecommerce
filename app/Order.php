<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function payment()
    {
        # code...
        return $this->belongsTo(Payment::class, 'payment_id','id');
    }

    public function shipping()
    {
        # code...
        return $this->belongsTo(Shipping::class, 'shipping_id','id');
    }

    public function order_details()
    {
        # code...
        return $this->hasMany(OrderDetails::class, 'order_id','id');
    }
}
