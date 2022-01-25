@extends('frontend.layout.master')
@section('title')
    Abohoman - Customer Checkout
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="{{route('customer.checkout.store')}}">Checkout</a></li>
    </ul>
    <div class="row">
       @include('frontend.single_pages.customer_sidebar')
        <div class="col-sm-9" id="content">
            @if (session('success'))
            <div class="col-sm-12">
                @if (session('success'))
                   <p style="color:green">{{ session('success') }}</p> 
                @endif
                </div>
            </div>
             @endif
             @if (session('error'))
             <p class="text-danger">{{session('error')}}</p>
         @endif
            <div class="col-sm-9" id="content">
                <h1>Checkout</h1>
                <div id="accordion" class="panel-group">
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-address" aria-expanded="false"> Billing Details <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapse-payment-address" role="heading" class="panel-collapse collapse" aria-expanded="true" style="height: 0px;">
                            <div class="panel-body">
                               
                                    <div class="radio">
                                        <label>
                    <input type="radio" checked="checked" value="existing" name="payment_address" data-id="payment-existing">
                    I want to use an existing address</label>
                                    </div>
                                    @php
                                        $info = App\Shipping::where('user_id',$user->id)->orderBy('id','DESC')->first();
                                       
                                    @endphp
                                    <div id="payment-existing">
                                        <form class="form-horizontal" action="{{route('customer.checkout.store')}}" method="POST">
                                            @csrf
                                        <div class="form-group required">
                                            <label for="input-payment-firstname" class="col-sm-2 control-label"> Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-payment-firstname" placeholder=" Name" value="{{@$user->name}}" name="name" readonly>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="input-payment-company" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-payment-company" placeholder="Email" value="{{@$user->email}}" name="email" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="input-payment-company" class="col-sm-2 control-label">Mobile</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-payment-company" placeholder="Mobile" value="{{@$user->mobile}}" name="mobile" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-address-1" class="col-sm-2 control-label">Address </label>
                                            <div class="col-sm-10">
                                                
                                                <textarea name="address" id="" cols="30" rows="4" class="form-control" required>{{@$user->address}}</textarea>
                                            </div>
                                        </div>

                                        <div class="buttons clearfix">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-payment-address" value="Continue">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="new" name="payment_address" data-id="payment-new">
                                            I want to use a new address</label>
                                    </div>
                                    <br>
                                    <div id="payment-new" style="display: none;">
                                        <form class="form-horizontal" action="{{route('customer.checkout.store')}}" method="POST">
                                            @csrf
                                        <div class="form-group required">
                                            <label for="input-payment-firstname" class="col-sm-2 control-label"> Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-payment-firstname" placeholder=" Name" value="{{@$info->name}}" name="name" required>
                                                <font color="red">{{$errors->has('name') ? ($errors->first('name')):''}}</font>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group ">
                                            <label for="input-payment-company" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-payment-company" placeholder="Email" value="{{@$info->email}}" name="email">
                                                <font color="red">{{$errors->has('email') ? ($errors->first('email')):''}}</font>
                                            </div>
                                        </div>

                                        <div class="form-group required">
                                            <label for="input-payment-company" class="col-sm-2 control-label">Mobile</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-payment-company" placeholder="Mobile" value="{{@$info->mobile}}" name="mobile" required>
                                                <font color="red">{{$errors->has('mobile') ? ($errors->first('mobile')):''}}</font>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-address-1" class="col-sm-2 control-label">Address </label>
                                            <div class="col-sm-10">
                                                
                                                <textarea name="address" id="" cols="30" rows="4" class="form-control" required>{{@$info->address}}</textarea>
                                                <font color="red">{{$errors->has('address') ? ($errors->first('address')):''}}</font>
                                            </div>
                                        </div>
                                        <div class="buttons clearfix">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-payment-address" value="Continue">
                                            </div>
                                        </div>
                                    </form>
                                       
                                       
                                        
                                    </div>
                                    
                                <script type="text/javascript">
                                    $('input[name=\'payment_address\']').on('change', function() {
                                        if (this.value == 'new') {
                                            $('#payment-existing').hide();
                                            $('#payment-new').show();
                                        } else {
                                            $('#payment-existing').show();
                                            $('#payment-new').hide();
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
      
    
              
                </div>
            </div>
    
        </div>
      
    </div>
</div>
@endsection