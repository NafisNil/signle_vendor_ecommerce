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

class FrontendController extends Controller
{
    //
    public function index()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['frontbanner'] = FrontBanner::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brand'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['slider'] = Slider::orderBy('id','DESC')->get();
        $data['product'] = Product::orderBy('id','DESC')->take(10)->get();
        $data['product_all'] = Product::where('availability',1)->orderBy('id','DESC')->take(40)->get();
       // dd($data['product']);
        $data['feature'] = Product::where('feature',1)->orderBy('id','DESC')->get();
        return view('frontend.layout.home',$data);
    }

    public function shoppingCart()
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        return view('frontend.single_pages.shopping_cart',$data);
    }

    public function categoryProduct($id, Request $request)
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['color'] = Color::all();
        $data['size'] = Size::all();
        if ($request->input('order')){
            $order = $request->input('order');
            if($order == 'price_asc'){
                $data['product'] = Product::where('category_id',$id)->orderBy('price','ASC')->paginate(50);
            }elseif ($order == 'price_desc') {
                $data['product'] = Product::where('category_id',$id)->orderBy('price','DESC')->paginate(50);
            }elseif ($order == 'name_asc') {
                $data['product'] = Product::where('category_id',$id)->orderBy('name','ASC')->paginate(50);
            }elseif ($order == 'name_desc') {
                $data['product'] = Product::where('category_id',$id)->orderBy('name','DESC')->paginate(50);
            }
        }else{
            $data['product'] = Product::where('category_id',$id)->get();
        }
        
        $data['product_special'] = Product::where('category_id',$id)->where('special',1)->get();
        $data['category_banner'] = Category::where('id',$id)->first();
        return view('frontend.single_pages.category',$data);
    }

    public function subcategoryProduct($id, Request $request)
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['color'] = Color::all();
        $data['size'] = Size::all();
        if ($request->input('order')){
            $order = $request->input('order');
            if($order == 'price_asc'){
                $data['product'] = Product::where('sub_category_id',$id)->orderBy('price','ASC')->paginate(50);
            }elseif ($order == 'price_desc') {
                $data['product'] = Product::where('sub_category_id',$id)->orderBy('price','DESC')->paginate(50);
            }elseif ($order == 'name_asc') {
                $data['product'] = Product::where('sub_category_id',$id)->orderBy('name','ASC')->paginate(50);
            }elseif ($order == 'name_desc') {
                $data['product'] = Product::where('sub_category_id',$id)->orderBy('name','DESC')->paginate(50);
            }
        }else{
            $data['product'] = Product::where('sub_category_id',$id)->get();
        }
       
        $data['product_special'] = Product::where('sub_category_id',$id)->where('special',1)->get();
        $category_id = SubCategory::select('category_id')->where('id',$id)->first();
        $data['sub_category'] = SubCategory::where('id',$id)->first(); 
        $data['category_banner'] = Category::where('id',$category_id->category_id )->first();
       
       // dd( $category_id);
        return view('frontend.single_pages.sub_category',$data);
    }

    public function allProduct(Request $request)
    {
        # code...
        $name = $request->input('name');
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['color'] = Color::all();
        $data['size'] = Size::all();
        $data['product_special'] = Product::where('special',1)->orderBy('id','DESC')->take(5)->get();
          if($request->input('color')){
            $checked = $_GET['color'];
            $product_id = ProductColor::select('product_id')->whereIn('color_id',$checked)->groupBy('product_id')->get();
            $data['product'] = Product::whereIn('id',$product_id)->orderBy('id','DESC')->get();
        }

        elseif($request->input('size')){
            $checked = $_GET['size'];
            $product_id = ProductSize::select('product_id')->whereIn('size_id',$checked)->groupBy('product_id')->get();

            $data['product'] = Product::whereIn('id',$product_id)->orderBy('id','DESC')->get();
            
        }elseif ($request->input('name')) {
            # code...
            $data['product'] = Product::where('name', 'like', '%' .$name. '%')->orWhere('short_desc', 'like', '%' .$name. '%')->orWhere('long_desc', 'like', '%' .$name. '%')->get();
        }elseif ($request->input('order')){
            $order = $request->input('order');
            if($order == 'price_asc'){
                $data['product'] = Product::orderBy('price','ASC')->paginate(50);
            }elseif ($order == 'price_desc') {
                $data['product'] = Product::orderBy('price','DESC')->paginate(50);
            }elseif ($order == 'name_asc') {
                $data['product'] = Product::orderBy('name','ASC')->paginate(50);
            }elseif ($order == 'name_desc') {
                $data['product'] = Product::orderBy('name','DESC')->paginate(50);
            }
        }
        else{
            $data['product'] = Product::orderBy('id','DESC')->paginate(50);
        }
      
        
       
        return view('frontend.single_pages.all_product',$data);
    }

    public function detailsProduct($id)
    {
        # code...
        $data['logo'] = Logo::first();
        $data['credential'] = Credential::first();
        $data['contact'] = Contact::first();
        $data['category'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['product'] = Product::where('id',$id)->first();
        $data['product_sub'] = ProductSubImage::where('product_id',$id)->get();
        $data['latest_product'] = Product::orderBy('id','DESC')->take(5)->get();
        $data['special_product'] = Product::where('category_id',$data['product']['category_id'])->orderBy('id','DESC')->take(5)->get();


        $data['related_product'] = Product::where('category_id',$data['product']['category_id'])->orderBy('id','DESC')->take(5)->get();
        return view('frontend.single_pages.product_details', $data);
    }

   
  
}
