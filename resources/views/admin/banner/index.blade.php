@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner List</li>
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
                <h3 class="card-title">Banner</h3>
                @if ($bannerCount < 1)
                <a href="{{route('frontbanner.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
                @endif
                  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Link</th>
                    <th>Logo</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                    
                  <tr>
                    <td>#1</td>
                    <td><a href="{{$banner->link}}" target="_blank" rel="noopener noreferrer">{{$banner->link}}</a> </td>
                    <td><img src="{{(!empty($banner->logo))?URL::to('storage/'.$banner->logo):URL::to('image/no_image.png')}}" alt="" style="width: 50%"></td>
                    <td>
                      <a href="{{route('frontbanner.edit',[$banner])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                    
                      
                  
                    </td>
                   
                  </tr>
    

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Link</th>
                    <th>Logo</th>
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