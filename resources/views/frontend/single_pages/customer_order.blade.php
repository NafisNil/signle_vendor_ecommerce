@extends('frontend.layout.master')
@section('title')
    Abohoman - Customer Order Dashboard
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="{{route('customer.order.list')}}">Order Dashboard</a></li>
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">Order No.</td>
                                <td class="text-left">Amount </td>
                                <td class="text-left">Payment Type </td>
                                <td class="text-left">Status</td>
                                <td class="text-left">Action</td>
                               
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($order as $item)
                         <tr>

                            <td class="text-center"> {{$item->order_number}}</td>
                            <td class="text-left">{{$item->order_total}} Tk.</td>
                            <td class="text-left">
                                @if ($item->payment->payment_method == "cod")
                                    Cash On Delivery
                                @else
                                    Others
                                @endif    
                            </td>
                            <td class="text-left">
                                @if ($item->status == 0)
                                    Pending
                                @else
                                    Delivered
                                @endif
                            </td>
                            <td>
                                <a href="{{route('customer.order.details',$item->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                            </td>
                            
                        </tr>
                         @endforeach
                            
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
      
    </div>
</div>
@endsection