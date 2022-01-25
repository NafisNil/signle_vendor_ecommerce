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
use Cart;   

class CartController extends Controller
{
    //
    public function addtoCart(Request $request)
    {
        # code...
        $product = Product::where('id', $request->id)->first();
        $color = Color::where('id',$request->color_id)->first();
        $size = Size::where('id',$request->size_id)->first();
       Cart::add([
            'id' => $product->id,
            'qty' => $request->qty,
            'price' => $product->price,
            'name' => $product->name,
            'weight' => 550,
            'options' => [
                'size_id' => $request->size_id,
                'size_name' => $size->name,
                'color_id' => $request->color_id,
                'color_name' => $color->name,
                'image' => $product->logo,
                'brand_id' => $product->brand_id,
                'seller' => $product->seller,
                'shipping_cost' => $product->shipping_price,
            ],
       ]);

       return redirect()->route('show.cart')->with('success', 'Cart Added Successfully');
    }

    public function showCart()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.shopping_cart', $data);
    }

    public function updateCart(Request $request)
    {
        # code...
       
      
        Cart::update($request->rowId, $request->qty);
        return redirect()->route('show.cart')->with('success','Cart updated successfully');
    }

    public function deleteCart($rowId)
    {
        # code...
        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('success','Cart deleted successfully');
    }
}
