@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Credential List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Credential List</li>
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
                <h3 class="card-title">Credential</h3>
                 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                 
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                   
                        
                   
                  <tr>
                    <td>#1</td>
                    <td>{{@$credential->facebook}}</td>
                    <td>{{@$credential->instagram}}</td>
                    <td>{{@$credential->youtube}}</td>
                   
                    <td><a href="{{route('credential.edit',[$credential])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                    
                    </td>
                   
                  </tr>
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Youtube</th>
                 
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