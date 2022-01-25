<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    //
    public function getSubCategory($id)
    {
        # code...
        echo json_encode(DB::table('sub_categories')->where('category_id', $id)->get());
    }
}
