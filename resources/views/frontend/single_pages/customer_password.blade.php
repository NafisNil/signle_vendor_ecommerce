@extends('frontend.layout.master')
@section('title')
    Abohoman - Edit Profile
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="{{route('customer.signup')}}">Register</a></li>
    </ul>
    <div class="row">
       @include('frontend.single_pages.customer_sidebar')
        <div class="col-sm-9" id="content">
            @if (session('error'))
                <p class="text-danger">{{session('error')}}</p>
            @endif
            <h1>Password Change</h1>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('customer.password.update')}}">
               
                @csrf
                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Current Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="current_password" placeholder="Current Password" value="" name="current_password" required>
                            <font color="red">{{$errors->has('current_password') ? ($errors->first('current_password')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">New Password </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="New Password " value="" name="new_password" required>
                            <font color="red">{{$errors->has('new_password') ? ($errors->first('new_password')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Retype Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="retype_password" placeholder="Password Confirm" value="" name="retype_password" required>
                            <font color="red">{{$errors->has('retype_password') ? ($errors->first('retype_password')):''}}</font>
                        </div>
                    </div>
                </fieldset>
             
                <div class="buttons ">
                   
                        <input type="submit" class="btn btn-primary float-right" value="Submit">
                    </div>
                </div>
            </form>
    
        </div>
      
    </div>
</div>
<script>
    var password = document.getElementById("password")
  , retype_password = document.getElementById("retype_password")
  ;

function validatePassword(){
  if(password.value != retype_password.value) {
    retype_password.setCustomValidity("Passwords Don't Match");
  } else {
    retype_password.setCustomValidity('');
  }
}



password.onchange = validatePassword;
retype_password.onkeyup = validatePassword;

</script>
@endsection