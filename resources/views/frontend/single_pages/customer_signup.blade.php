@extends('frontend.layout.master')
@section('title')
    Abohoman - Registration
@endsection

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="{{route('customer.signup')}}">Register</a></li>
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
                <div class="columnblock-title">Account</div>
                <div class="account-block">
                    <div class="list-group"> <a class="list-group-item" href="{{route('customer.login')}}">Login</a> <a class="list-group-item" href="{{route('customer.signup')}}">Register</a>              </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="content">
         
           
            <h1>Register Account</h1>
            <p>If you already have an account with us, please login at the <a href="login">login page</a>.</p>
           
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('signup.store')}}">
               
                @csrf
                <fieldset id="account">
                    <legend>Your Personal Details</legend>
              
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label"> Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder=" Name" value="" name="name" required>
                            <font color="red">{{$errors->has('name') ? ($errors->first('name')):''}}</font>
                        </div>
                    </div>
           
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email" required>
                            <font color="red">{{$errors->has('email') ? ($errors->first('email')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">Mobile No.</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="Mobile" value="" name="mobile" required>
                            <font color="red">{{$errors->has('mobile') ? ($errors->first('mobile')):''}}</font>
                        </div>
                    </div>
       
                </fieldset>
                <fieldset id="address">
                    <legend>Your Address</legend>
              
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                            <textarea name="address" id="" cols="" rows="4" class="form-control" id="input-address-1" required></textarea>
                            <font color="red">{{$errors->has('address') ? ($errors->first('address')):''}}</font>
                        </div>
                    </div>
                   
         
                </fieldset>
                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="Password" value="" name="password" required>
                            <font color="red">{{$errors->has('password') ? ($errors->first('password')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirm_password" placeholder="Password Confirm" value="" name="confirmation_password" required>
                            <font color="red">{{$errors->has('confirmation_password') ? ($errors->first('confirmation_password')):''}}</font>
                        </div>
                    </div>
                </fieldset>
                
                <div class="buttons">
                    <div class="pull-right">I have read and agree to the <a class="agree" href="#"><b>Privacy Policy</b></a>
                        <input type="checkbox" value="1" name="agree" id="checkbox" required> &nbsp;
                        <input type="submit" class="btn btn-primary" value="Continue">
                    </div>
                </div>
            </form>
        </div>
      
    </div>
</div>
<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password"),
  checkbox = document.getElementById('checkbox');
  ;

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}



password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
@endsection