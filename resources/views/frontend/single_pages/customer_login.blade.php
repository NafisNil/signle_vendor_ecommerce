@extends('frontend.layout.master')
@section('title')
    Abohoman - Login
@endsection

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="{{route('customer.login')}}">Login</a></li>
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
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <h2>New Customer</h2>
                        <p><strong>Register Account</strong></p>
                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                        <a class="btn btn-primary" href="{{route('customer.signup')}}">Continue</a></div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <h2>Returning Customer</h2>
                        <p><strong>I am a returning customer</strong></p> 
                        @include('admin.sessionMsg')
                        <form enctype="multipart/form-data" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="input-email" class="control-label">E-Mail Address</label>
                                <input type="email" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email">
                            </div>
                            <div class="form-group">
                                <label for="input-password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                               <!-- <a href="forgetpassword.html">Forgotten Password</a></div> -->
                            <input type="submit" class="btn btn-primary" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection