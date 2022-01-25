<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Brand;
use App\Product;
use App\OrderDetails;
use Auth;

class UserController extends Controller
{
    //
    public function getUser()
    {
        # code...
        $data = User::where('usertype','ambassador')->get();
        return view('admin.user.index',compact('data'));
    }

    public function addUser()
    {
        # code...
        $brand = Brand::all();
        return view('admin.user.create',compact('brand'));
    }

    public function storeUser(Request $request)
    {
        # code...
        $this->validate($request, [
            'name' => 'required',
            'brand_id' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'mobile' => ['required','regex: /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
            'coupon' => ['required','unique:users,coupon']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->brand_id = $request->brand_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->coupon = $request->coupon;
        $user->usertype = 'ambassador';
        $user->status = 1;
        $user->save();
        return redirect()->route('get.user')->with('success','Ambassador created successfully!');
    }

    public function deleteUser(Request $request)
    {
        # code...
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success','Data deleted successfully!');
    }

    public function brandProduct()
    {
        # code...
        $brand_id = Auth::user()->brand_id;
        $product = Product::where('brand_id',$brand_id)->orderBy('id', 'DESC')->get();
        return view('user.product.index',['product'=>$product]);
    }

    public function orderListBrand()
    {
        # code...
        $brand_id = Auth::user()->brand_id;
        $orderList = OrderDetails::where('brand_id',$brand_id)->orderBy('id','DESC')->get();
       // dd($orderList);
        return view('user.product.order',['order'=>$orderList]);
    }

}
