@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approved Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approved Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Approved Order Details</h3>
                 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <a href="{{route('approved.order.list')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-list"></i></a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            
                            <tr>
                                <td class="text-left"><a href="{{url('/')}}">abohoman.com</a>  </td>
                                
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
              </div>
              <!-- /.card-body -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection