@extends('frontend.layout.master')
@section('title')
    Abohoman - Customer Order Dashboard
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
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
            <div class="col-sm-12" id="invoice">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <td class="text-left"><a href="{{url('/')}}">abohoman.com</a> <br>{{$contact->email}} <br> {{$contact->mobile}} </td>
                                <td class="text-center"><img src="{{(!empty($logo->image))?URL::to('upload/logo_image/'.$logo->image):URL::to('image/no_image.png')}}" style="max-height: 100px;max-width:110px" title="E-Commerce" alt="E-Commerce" class="img-responsive" /> </td>
                                <td class="text-center">Order No. #{{$order->order_number}}</td>
                     
            
                               
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left"> Billing Info. </td>
                                <td></td>
                                <td class="text-right">{{$order->shipping->name}} <br> {{@$order->shipping->email}} <br> {{$order->shipping->mobile}} <br> {{$order->shipping->address}}</td>
                               
                     
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
                <h2></h2>
                <div class="table-responsive">
                    <h2 class="text-center"> Order Details</h2>
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <th class="text-left"> Image</th>
                                <th class="text-center">Product Name </th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Price and Quantity</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($order['order_details'] as $item)
                                
                            
                            <tr>
                                <td class="text-left"><img src="{{URL::to('storage/'.$item->product->logo)}}" style="max-height: 80px;max-width:100px" title="E-Commerce" alt="E-Commerce" class="img-responsive" />  </td>
                                <td class="text-center">{{$item->product->name}}</td>
                                <td class="text-center">{{$item->product->seller}} <br> {{@$item->color->name}} <br> {{@$item->size->name}}</td>
                                <td class="text-center">{{$item->quantity}} * {{$item->product->price}}  Tk. = 
                                @php
                                    $total = $item->quantity * $item->product->price;
                                @endphp
                                {{$total}} Tk.
                                </td>

                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-left">  </td>
                                <td class="text-left">  </td>
                                <td class="text-left"><b>Total</b></td>
                                <td class="text-left text-success"><b> {{$order->order_total}} Tk.</b> </td>
                               
                     
                            </tr>
                        </tbody>
                        
                    </table>
                </div>

                <h2>hello!</h2>
            </div>
            <button class="btn btn-outline-info btn-sm float-right" onclick="GeneratePDF()"><i class="fa fa-print"></i></button>
        </div>
      
    </div>
</div>
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>
function GeneratePDF(){
    const element = document.getElementById("invoice");
    html2pdf()
    .from(element)
    .save();
}
</script>
@endsection