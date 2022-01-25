@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approved Order List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approved Order List</li>
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
                <h3 class="card-title">Approved Order List</h3>
                 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Order No.</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $key=>$item)
                   
                  <tr>
                    <td>{{++$key}}</td>
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
                      <a href="{{route('order_details',[$item->id])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></button></a>
                    
                    </td>
                   
                  </tr>
    
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Order No.</th>
                    <th>Amount</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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