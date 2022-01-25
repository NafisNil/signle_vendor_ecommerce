@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About List</li>
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
                <h3 class="card-title">About</h3>
                 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                    
                  <tr>
                    <td>#1</td>
                    <td>{!!$about->description!!}</td>
                    <td>
                         <img src="{{(!empty($about->image))?URL::to('upload/about_image/'.$about->image):URL::to('image/no_image.png')}}"  style="widows: inherit; width:120px; height:120px; border:1px solid #042b3d" alt="">
                    </td>
                    <td><a href="{{route('about.edit',[$about])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a></td>
                   
                  </tr>
    
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Image</th>
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