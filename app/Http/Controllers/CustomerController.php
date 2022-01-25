<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    //
    public function view()
    {
        # code...
        $data['customer'] = User::where('usertype','customer')->where('status',1)->get();
        return view('admin.customer.view',$data);
    }

    public function draft()
    {
        # code...
        $data['draft'] = User::where('usertype','customer')->where('status',0)->get();
        return view('admin.customer.draft', $data);
    }

    public function delete(Request $request, $id)
    {
        # code...
        $user = User::find($id);
        if(!empty($user->image))
            @unlink('storage/'.$user->image);
        $user->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
