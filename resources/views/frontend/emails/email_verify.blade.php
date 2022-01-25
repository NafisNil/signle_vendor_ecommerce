@extends('frontend.layout.master')
@section('title')
    Abohoman - Email Verify
@endsection

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="login.html">Verification</a></li>
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="column-block">
                <div class="columnblock-title">Account</div>
                <div class="account-block">
                    <div class="list-group"> <a class="list-group-item" href="login.html">Verification</a> <a class="list-group-item" href="register.html">Register</a> <a class="list-group-item" href="forgetpassword.html">Forgotten Password</a> <a class="list-group-item" href="#">My Account</a>                            <a class="list-group-item" href="#">Address Book</a> <a class="list-group-item" href="#">Wish List</a> <a class="list-group-item" href="#">Order History</a> <a class="list-group-item" href="download">Downloads</a> <a class="list-group-item"
                            href="#">Reward Points</a> <a class="list-group-item" href="#">Returns</a> <a class="list-group-item" href="#">Transactions</a> <a class="list-group-item" href="#">Newsletter</a><a class="list-group-item last" href="#">Recurring payments</a>                            </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="content">
            <div class="row">
              
                <div class="col-sm-6">
                    @if (session('success'))
                   <p class="text-success"> <strong> {{ session('success') }}</strong> </p>
                    @endif
                    <div class="well">
                        <h2>Verify Email</h2>
                        
                        <form enctype="multipart/form-data" method="POST" action="{{route('verify.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="input-email" class="control-label">E-Mail Address</label>
                                <input type="email" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email" required>
                                <font color="red">{{$errors->has('email') ? ($errors->first('email')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="input-password" class="control-label">Verification Code</label>
                                <input type="text" class="form-control" id="input-password" placeholder="code" value="" name="code" required>
                               <!-- <a href="forgetpassword.html">Forgotten Password</a></div> -->
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <font color="red">{{$errors->has('code') ? ($errors->first('code')):''}}</font>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection