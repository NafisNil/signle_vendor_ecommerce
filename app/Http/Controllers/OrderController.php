<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Payment;

class OrderController extends Controller
{
    //
    public function pending()
    {
        # code...
        $data['order'] = Order::where('status',0)->get();
        return view('admin.order.pending-order', $data);
    }

    public function approved()
    {
        # code...
        $data['order'] = Order::where('status',1)->get();
        return view('admin.order.approved-list', $data);
    }

    public function details($id)
    {
        # code...
        $data['order'] = Order::find($id);
        return view('admin.order.order-details', $data);
    }

    public function approve($id)
    {
        # code...
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return redirect()->back()->with('success','Delivered Successfully!');
    }
}
