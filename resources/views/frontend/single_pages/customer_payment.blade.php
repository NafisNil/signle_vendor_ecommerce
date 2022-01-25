@extends('frontend.layout.master')
@section('title')
    Abohoman - Payment
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('customer.payment')}}">Payment</a></li>
    </ul>
    <div class="row">
        <div id="column-left" class="col-sm-3 hidden-xs column-left">
            <div class="column-block">
                <div class="column-block">
                    <div class="columnblock-title">Categories</div>
                <div class="category_block">
                    <ul class="box-category treeview-list treeview">
                        @foreach ($category as $item)
                        <li><a href="#" class="activSub">{{$item->category->name}}</a>
                            @php
                                $subcategory = App\SubCategory::where('category_id',$item->category->id)->get();
                               
                            @endphp
                            <ul>
                                @foreach ($subcategory as $item)
                                <li><a href="{{route('subcategory.product',$item->id)}}">{{$item->name}}</a></li>
                                @endforeach
                                
                               
                            </ul>
                        </li>
                        @endforeach
                        
                        
                    </ul>
                </div>
                </div>
          
            </div>
        </div>
        <div class="col-sm-9" id="content">
            <h1>Payment &nbsp; </h1>
            @if (session('error'))
                <p class="text-danger">{{session('error')}}</p>
            @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Seller</td>
                                
                                <td class="text-left">Quantity</td>
                                <td class="text-left">Description</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right">Shipping Cost</td>
                                <td class="text-right">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $content = Cart::content();
                                
                                $shipping = 0;
                                $total = 0;
                            @endphp
                            @foreach ($content as $item)
                            @php
                               
                                $shipping += $item->options->shipping_cost;
                                $total += $item->subtotal;
                            @endphp
                            <tr>
                                <td class="text-center"><a href="{{route('details_product',$item->id)}}"><img class="img-thumbnail" title="women's clothing" alt="women's clothing" src="{{URL::to('storage/'.$item->options->image)}}"></a></td>
                                <td class="text-left"><a href="{{route('details_product',$item->name)}}">{{$item->name}}</a></td>
                                <td class="text-left">{{$item->options->seller}} </td>
                                <td class="text-left">
                                    <form action="{{route('update.cart')}}" method="POST">
                                        @csrf
                                    <div style="max-width: 200px;" class="input-group btn-block">
                                        <input type="text" class="form-control quantity" size="1" value="{{$item->qty}}" name="qty">
                                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                                            <span class="input-group-btn">
                                    <button class="btn btn-primary" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                   <a href="{{route('delete.cart',$item->rowId)}}"> <button  class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button></a>
                                   
                                    </span></div>
                                </form>
                                </td>
                                <td class="text-right">{{$item->options->size_name}}, {{$item->options->color_name}}</td>
                                <td class="text-right">{{$item->price}} Tk.</td>
                                <td class="text-right">{{@$item->options->shipping_cost}} Tk.</td>
                                <td class="text-right">{{$item->price * $item->qty}} Tk.</td>
                                
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
           
  
               <br>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">{{$total}} Tk</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Shipping Cost:</strong></td>
                                <td class="text-right">{{$shipping}}Tk</td>
                            </tr>
                            
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">{{$total + $shipping}} Tk.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-method" aria-expanded="false">Step 5: Payment Method <i class="fa fa-caret-down"></i></a></h4>
                </div>
                <div id="collapse-payment-method" role="heading" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>Please select the preferred payment method to use on this order.</p>
                        <div class="radio">
                        <form action="{{route('customer.payment.store')}}" method="post">
                            @csrf
                            @foreach ($content as $item)
                            <input type="hidden" name="product_id" value="{{$item->id}}">
                            @endforeach
                            <input type="hidden" name="order_total" value="{{$total}}">
                            <label>
                                <input type="radio" checked="checked" value="cod" name="payment_method" required>
                                Cash On Delivery 
                            </label>
                            <font color="red">{{$errors->has('payment_method') ? ($errors->first('payment_method')):''}}</font>
                            <div class="buttons">
                                <div class="pull-right">I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a>
                                    <input type="checkbox" value="1" name="agree" required> &nbsp;
                                    <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-payment-method" value="Continue">
                                </div>
                            </div>
                        </form>
                        </div>
                      
                        
                    </div>
                </div>
            </div>
            <div class="buttons">
              
                
            </div>
        </div>
    </div>
</div>
@endsection