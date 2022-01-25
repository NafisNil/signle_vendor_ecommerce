@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Draft Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Draft Customer List</li>
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
                <h3 class="card-title">Draft Customer</h3>
                  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Address</th>
                    <th>Date Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                   @foreach ($draft as $key=>$item)
                   @php
                 
                   $created = new Carbon\Carbon($item->created_at);
                   $now = Carbon\Carbon::now();
                   $diff = ($created->diff($now)->days < 1?'Today':$created->diffForHumans($now));
                  @endphp
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}} </td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile}} </td>
                    <td>{{$item->address}}</td>
                    <td>{{$diff}}</td>
                    <td>
                     
                     
                      <form action="{{route('customer.delete',[$item->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                    
                    </td>
                   
                  </tr>
    
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Address</th>
                    <th>Date Status</th>
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