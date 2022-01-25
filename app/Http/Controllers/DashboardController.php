<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use App\Credential;
use App\Contact;
use App\Brand;
use App\Slider;
use App\Category;
use App\Product;
use App\FrontBanner;
use App\SubCategory;
use App\Color;
use App\Size;
use App\ProductColor;
use App\ProductSubImage;
use App\ProductSize;
use Illuminate\Support\Str;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Http\Requests\CustomerRequest;
use Image;
use App\User;
use Cart;
use Auth;
use DB;
use Session;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
       
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['user'] = Auth::user();
        return view('frontend.single_pages.customer_dashboard',$data);
    }

    public function edit()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['edit'] = User::find(Auth::user()->id);
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.customer_edit',$data);
    }

    public function update(Request $request)
    {
        # code...
        $this->validate($request,[
            'logo' => ['mimes:jpeg,bmp,png,gif,svg,jpg'],
            'name' => 'required'
        ]);

        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->address = $request->address;
       
       
        if ($request->hasFile('logo')) {
            @unlink('storage/'.$user->image);
            $this->_uploadImage($request, $user);
        }

        $user->save();
        return redirect()->route('dashboard')->with('success','Updated Successfully');
    }

    public function change()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['edit'] = User::find(Auth::user()->id);
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.customer_password',$data);
    }

    public function updatePassword(Request $request)
    {
        # code...
        
        if(Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('dashboard')->with('success','Password Successfully updated!');
        }else{
            return redirect()->back()->with('error','Sorry! Current password does not match');
        }
    }

    public function payment()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.customer_payment',$data);
    }

    public function paymentStore(Request $request)
    {
        # code...
        $this->validate($request,[
            'payment_method' => 'required'
        ]);
        if ($request->product_id == null) {
            # code...
            dd('null');
             return redirect()->back()->with('error','Empty Cart!!!');
        } else {
            # code...
            DB::transaction(function () use($request) {
                $payment = new Payment;
                $payment->payment_method = $request->payment_method;
                $payment->save();
                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
              
                $order->payment_id = $payment->id;
                $order_data = Order::orderBy('id','desc')->first();
                if($order_data == null){
                  $firstReg = '0';
                  $order_no = $firstReg + 1;
                }else{
                  $order_data = Order::orderBy('id','desc')->first()->order_no;
                  $order_no = $order_data+1;
                }
                $order->order_number = $order_no;
                $order->order_total = $request->order_total;
                $order->status = '0';
                $order->save();
                $content = Cart::content();
                foreach ($content as $key => $value) {
                  # code...
                  $order_details = new OrderDetails;
                  $order_details->order_id = $order->id;
                  $order_details->product_id = $value->id;
                  $order_details->color_id = $value->options->color_id;
                  $order_details->brand_id = $value->options->brand_id;
                  $order_details->size_id = $value->options->size_id;
                  $order_details->quantity = $value->qty;
    
                  $order_details->save();
                }
            });
    
            Cart::destroy();
            return redirect()->route('customer.order.list')->with('success','Order placed successfully!');
        }
        
       
      
    }

    public function orderList()
    {
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['order'] = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.single_pages.customer_order',$data);
    }

    public function orderDetails($id)
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
       
        $order_data = Order::find($id);
        $data['order'] = Order::with(['order_details'])->where('id',$order_data->id)->where('user_id',Auth::user()->id)->first();
        if($data['order'] == false){
            return redirect()->back()->with('error', 'Not found!');
        }else{
            return view('frontend.single_pages.customer_order_details',$data);
        }
       
    }

    private function _uploadImage($request, $user)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 100)->save(public_path('storage/' . $filename));
            $user->logo = $filename;
            $user->save();
        }
       
    }
}
