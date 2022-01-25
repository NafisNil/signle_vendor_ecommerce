<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function login(LoginRequest $request)
    {
        # code...
        $email = $request->email;
        $password = $request->password;
        $validData = User::where('email',$email)->first();
        $password_check  =password_verify($password, $validData->password);
        if($validData == false){
           
            return redirect()->back()->with('message','Email pr Password is not valid!');
        }
        if($validData->status == 0){
              
            return redirect()->back()->with('message','Please verify your account!');
        }
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            # code...
            return redirect()->route('login');
        }
       
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
