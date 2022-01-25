@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ambassador List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ambassador List</li>
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
                <h3 class="card-title">Ambassador</h3>
                  <a href="{{route('add.user')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Ambassador Name</th>
                    <th>Brand</th>
                    <th>Email</th>
                    
                    <th>Coupon</th>
                    <th>Mobile</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key=>$item)
                   
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->brand->name}}</td>
                    <td>{{$item->email}}</td>
                   
                    <td>{{$item->coupon}}</td>
                    <td>{{$item->mobile}}</td>
                   
                    <td>
                      <form action="{{route('delete.user')}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" value="{{$item->id}}" name="id">
                        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                    </td>
                   
                  </tr>
    
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Ambassador Name</th>
                    <th>Brand</th>
                    <th>Email</th>
                    
                    <th>Coupon</th>
                    <th>Mobile</th>
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