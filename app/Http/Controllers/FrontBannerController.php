<?php

namespace App\Http\Controllers;

use App\FrontBanner;
use Illuminate\Http\Request;
use App\Http\Requests\FrontBannerRequest;
use Image;

class FrontBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banner = FrontBanner::first();
        $bannerCount = FrontBanner::count();
        return view('admin.banner.index',['banner'=>$banner, 'bannerCount' => $bannerCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrontBannerRequest $request)
    {
        //
        $banner = FrontBanner::create($request->all());
        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $banner);
        }
        return redirect()->route('frontbanner.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontBanner  $frontBanner
     * @return \Illuminate\Http\Response
     */
    public function show(FrontBanner $frontBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontBanner  $frontBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontBanner $frontBanner)
    {
        //
        $front = FrontBanner::first();
        return view('admin.banner.edit',[
            'edit' => $front
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontBanner  $frontBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontBanner $frontBanner)
    {
        //
        $front = FrontBanner::first();
        $front->update($request->all());
        if ($request->hasFile('logo')) {
            @unlink('storage/'.$front->image);
            $this->_uploadImage($request, $front);
        }
        return redirect()->route('frontbanner.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontBanner  $frontBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontBanner $frontBanner)
    {
        //
        if(!empty($frontBanner->image))
            @unlink('storage/'.$frontBanner->image);
        $frontBanner->delete();
        return redirect()->route('frontbanner.index')->with('status','Data deleted successfully!');
    }


    private function _uploadImage($request, $frontBanner)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1180, 150)->save(public_path('storage/' . $filename));
            $frontBanner->logo = $filename;
            $frontBanner->save();
        }
       
    }
}
