<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brand = Brand::all();
        
        return view('admin.brand.index',['brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        //
        $brand = Brand::create($request->all());
        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $brand);
        }
        return redirect()->route('brand.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
         
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
        return view('admin.brand.edit',[
            'edit' => $brand
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        //
        @unlink('storage/'.$brand->image);
        $brand->update($request->all());
        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $brand);
        }
        return redirect()->route('brand.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
        if(!empty($brand->image))
            @unlink('storage/'.$brand->image);
        $brand->delete();
        return redirect()->route('brand.index')->with('status','Data deleted successfully!');
    }

    private function _uploadImage($request, $brand)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 100)->save(public_path('storage/' . $filename));
            $brand->logo = $filename;
            $brand->save();
        }
       
    }
}
