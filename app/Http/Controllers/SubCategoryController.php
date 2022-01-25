<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategory = SubCategory::all();
        
        return view('admin.subcategory.index',['subcategory'=>$subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.subcategory.create',[
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        //
       
        $subcategory = SubCategory::create($request->all());
       
        return redirect()->route('subcategory.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $category = Category::all();
      $subcategory = SubCategory::find($id);
       return view('admin.subcategory.edit',[
        'edit' => $subcategory,
        'category' => $category
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request,$id)
    {
        //
        $subcategory = SubCategory::find($id);
        $subcategory->update($request->all());
        dd($this->route('subcategory.id'));
        return redirect()->route('subcategory.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('success','Data deleted successfully!');
    }
}
