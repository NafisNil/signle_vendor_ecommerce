@extends('frontend.layout.master')
@section('title')
    Abohoman - Edit Profile
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('dashboard')}}">Account</a></li>
        <li><a href="{{route('customer.signup')}}">Register</a></li>
    </ul>
    <div class="row">
       @include('frontend.single_pages.customer_sidebar')
        <div class="col-sm-9" id="content">
      
            <div class="img-circle col-3 float-left"  >
                <img src="{{(!empty($edit->logo))?URL::to('storage/'.$edit->logo):URL::to('image/no_image.png')}}" alt="" id="showImage" style="max-height: 150px;max-width:160px">
            </div>
            <h1>Customer Profile</h1>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('customer.update')}}">
               
                @csrf
                <fieldset id="account">
                    <legend>Your Personal Details</legend>
              
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label"> Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder=" Name" value="{{$edit->name}}" name="name" required>
                            <font color="red">{{$errors->has('name') ? ($errors->first('name')):''}}</font>
                        </div>
                    </div>
           
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="{{$edit->email}}" name="email" readonly>
                            <font color="red">{{$errors->has('email') ? ($errors->first('email')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">Mobile No.</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="Mobile" value="{{$edit->mobile}}" name="mobile" readonly>
                            <font color="red">{{$errors->has('mobile') ? ($errors->first('mobile')):''}}</font>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="input-telephone" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" placeholder="Mobile" value="" name="logo" >
                            <font color="red">{{$errors->has('logo') ? ($errors->first('logo')):''}}</font>
                        </div>
                    </div>
       
                </fieldset>
                <fieldset id="address">
                    <legend>Your Address</legend>
              
                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                            <textarea name="address" id="" cols="" rows="4" class="form-control" id="input-address-1" required>{{$edit->address}}</textarea>
                            <font color="red">{{$errors->has('address') ? ($errors->first('address')):''}}</font>
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
<script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      })
    })
  </script>
@endsection