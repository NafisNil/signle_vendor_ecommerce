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
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Payment;
use Illuminate\Support\Str;
use App\Http\Requests\CustomerRequest;
use Image;
use App\User;
use DB;
use Mail;
use Auth;
use Session;

class CheckoutController extends Controller
{
    //
    public function customerSignup()
    {
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.customer_signup',$data);
        # code...
    }

    public function customerLogin()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.customer_login',$data);
    }

    public function signup(CustomerRequest $request)
    {
        # code...
        DB::transaction(function () use($request) {
           
            $user = new User;
            $user->name  = $request->name;
            $user->email  = $request->email;
            $user->mobile  = $request->mobile;
            $user->address  = $request->address;
            $user->password  = bcrypt($request->password);
            $code  = rand(00000,99999);
            $user->code = $code;
            $user->usertype = 'customer';
             $user->status= '0';
            
                $data = array(
                    'name' => $request->name,
                    'email' => $request->email,
                   
                    'code' => $code,
                   
                );
    
            $user->save();
    
                Mail::send('frontend.emails.verify-email', $data, function($message) use($data) {
                    $message->from('nafis.zaman.35@gmail.com','Abohoman.com');
                    $message->to($data['email']);
                    $message->subject('Please verify your email address!');
                });
            });

            return redirect()->route('verify.email')->with('success','Successfully opened your account. Please verify your email');
   
    }

    public function verifyEmail()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.emails.email_verify',$data);
    }

    public function verifyStore(Request $request)
    {
        # code...
        $this->validate($request,[
            'email' => 'required',
            'code' => 'required'
        ]);

        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData){
           
            $checkData->status = 1;
            $checkData->save();
            return redirect()->route('customer.login')->with('success','Successfully verified your account. Please login');
        }else{
          
            return redirect()->back()->with('error','Verification code does not match');
        }
    }

    public function checkout()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['user'] = Auth::user();
        return view('frontend.single_pages.checkout',$data);
    }

    public function checkoutStore(Request $request)
    {
        # code...
        $this->validate($request,[
            'name' => 'required',
            
            'mobile' => ['required','regex: /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
            'address' => 'required',
           
        ]);

        $checkout = new Shipping;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobile = $request->mobile;
        $checkout->address = $request->address;
        $checkout->user_id = Auth::user()->id;
        $checkout->save();
        Session::put('shipping_id',$checkout->id);
        return redirect()->route('customer.payment')->with('success','Data saved successfully!');
    }
}
