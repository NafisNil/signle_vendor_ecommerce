<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use App\Color;
use App\Size;
use App\Brand;
use App\Category;
use App\SubCategory;
use App\ProductColor;
use App\ProductSize;
use App\ProductSubImage;
use DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::orderBy('id','DESC')->paginate(35);
        
        return view('admin.product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['size'] = Size::all();
        $data['color'] = Color::all();
        $data['subcategory'] = SubCategory::all();
        $data['category'] = Category::all();
        $data['brand'] = Brand::all();
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        DB::transaction(function() use($request){
           
            $product = new Product;
          
            $product->name = $request->name;
           
            $product->category_id = $request->category_id;
             $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->old_price = $request->old_price;
            $product->shipping_price = $request->shipping_price;
             $product->seller = $request->seller;
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->delivery_date = $request->delivery_date;
            $product->return_date = $request->return_date;
            $product->availability = $request->availability;
            $product->code = 'AB'.time();
            if ($request->hasFile('logo')) {
                $this->_uploadImage($request, $product);
            }
            if($product->save()){
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach ($files as $key => $value) {
                        # code...
                        $imgName = date('YmdHi').$value->getClientOriginalName();
                        $value->move(public_path('storage'), $imgName);
                        $subImage['sub_image'] = $imgName;

                        $subImage = new ProductSubImage;
                        $subImage->product_id = $product->id;
                        $subImage->sub_image = $imgName;
                        $subImage->save();

                    }
                }
            }

                    $colors = $request->color_id;
                    if(!empty($colors)){
                        foreach ($colors as $key => $value) {
                            # code...
                            $myColor = new ProductColor;
                            $myColor->color_id = $value;
                            $myColor->product_id = $product->id;
                            $myColor->save();
                        }
                    }

                    $sizes = $request->color_id;
                    if(!empty($sizes)){
                        foreach ($sizes as $key => $value) {
                            # sizes...
                            $mySizes = new ProductSize;
                            $mySizes->size_id = $value;
                            $mySizes->product_id = $product->id;
                            $mySizes->save();
                        }
                    }
                
            else{
                return redirect()->back()->with('error','Data can not saved!');
            }
        });
        
        return redirect()->route('product.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $sub_image = ProductSubImage::where('product_id',$product->id)->get();
        $color = ProductColor::where('product_id',$product->id)->get();
        $size = ProductSize::where('product_id',$product->id)->get();
        return view('admin.product.details', ['product' => $product, 'sub_image' => $sub_image, 'color' => $color, 'size' => $size]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $data['size'] = Size::all();
        $data['color'] = Color::all();
        $data['subcategory'] = SubCategory::all();
        $data['category'] = Category::all();
        $data['brand'] = Brand::all();
       
        $data['edit'] = $product;
        $data['color_array'] = ProductColor::select('color_id')->where('product_id',$data['edit']->id)->get()->toArray();
        $data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['edit']->id)->get()->toArray();
      
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
       
        DB::transaction(function() use($request, $product){
           
            $product->name = $request->name;
            $id = $product->id;
            $product->category_id = $request->category_id;
             $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->old_price = $request->old_price;
            $product->shipping_price = $request->shipping_price;
             $product->seller = $request->seller;
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->delivery_date = $request->delivery_date;
            $product->return_date = $request->return_date;
            $product->availability = $request->availability;
            $product->code = 'AB'.time();
            if ($request->hasFile('logo')) {
                @unlink('storage/'.$product->image);
                $this->_uploadImage($request, $product);
            }
            if($product->save()){
                $files = $request->sub_image;
                if(!empty($files)){
                    $sub_Image = ProductSubImage::where('product_id',$id)->get()->toArray();
                    foreach ($sub_Image as $key => $value) {
                        # code...
                        if(!empty($value))
                            @unlink('storage/'.$value->sub_image);
                    }

                    ProductSubImage::where('product_id',$id)->delete();
                    foreach ($files as $key => $value) {
                        # code...
                        $imgName = date('YmdHi').$value->getClientOriginalName();
                        $value->move(public_path('storage/'), $imgName);
                        $subImage['sub_image'] = $imgName;

                        $subImage = new ProductSubImage;
                        $subImage->product_id = $product->id;
                        $subImage->sub_image = $imgName;
                        $subImage->save();

                    }
                }
            }

            $colors = $request->color_id;
            if(!empty($colors))
                 ProductColor::where('product_id',$id)->delete();
             if(!empty($colors)){
                
                 foreach ($colors as $key => $value) {
                     # code...
                     $myColor = new ProductColor;
                     $myColor->color_id = $value;
                     $myColor->product_id = $product->id;
                     $myColor->save();
                 }
             }

             $sizes = $request->size_id;
             if(!empty($sizes))
                 ProductSize::where('product_id',$id)->delete();
             if(!empty($sizes)){
                
                 foreach ($sizes as $key => $value) {
                     # sizes...
                     $mySizes = new ProductSize;
                     $mySizes->size_id = $value;
                     $mySizes->product_id = $product->id;
                     $mySizes->save();
                 }
             }
                
            else{
                return redirect()->back()->with('error','Data can not saved!');
            }
        });
        return redirect()->route('product.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        

        @unlink('storage'.$product->logo);
        $sub_Image = ProductSubImage::where('product_id',$product->id)->get()->toArray();
        foreach ($sub_Image as $key => $value) {
            # code...
            if(!empty($value))
                @unlink('storage/'.$value->sub_image);
        }
        ProductSubImage::where('product_id',$product->id)->delete();
        ProductColor::where('product_id',$product->id)->delete();
        ProductSize::where('product_id',$product->id)->delete();
        $product->delete();

        return redirect()->route('product.index')->with('success','Data deleted successfully!');
    }

    public function available(Product $product)
    {
        # code...
      
        $product->update(['availability' => 1]);
        return redirect()->route('product.index')->with('success','Data updated successfully!');
    }

    public function notavailable(Product $product)
    {
        # code...
       
        $product->update(['availability' => 0]);
        return redirect()->route('product.index')->with('success','Data updated successfully!');
    }

    public function feature(Product $product)
    {
        # code...
        $product->update(['feature' => 1]);
        return redirect()->route('product.index')->with('success','Data updated successfully!');
    }

    public function notfeature(Product $product)
    {
        # code...
        $product->update(['feature' => 0]);
        return redirect()->route('product.index')->with('success','Data updated successfully!');
    }

    public function special(Product $product)
    {
        # code...
        $product->update(['special' => 1]);
        return redirect()->route('product.index')->with('success','Data updated successfully!');
    }

    public function notspecial(Product $product)
    {
        # code...
        $product->update(['special' => 0]);
        return redirect()->route('product.index')->with('success','Data updated successfully!');
    }

    private function _uploadImage($request, $product)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 150)->save(public_path('storage/' . $filename));
            $product->logo = $filename;
            $product->save();
        }
       
    }


}
