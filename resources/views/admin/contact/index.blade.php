@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact List</li>
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
                <h3 class="card-title">Contact</h3>
                  <a href="{{route('contact.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Map</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                   
                        
                   
                  <tr>
                    <td>#1</td>
                    <td><iframe src="{!!@$contact->map!!}" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></td>
                    <td>{!!@$contact->email!!}</td>
                    <td>{!!@$contact->mobile!!}</td>
                    <td>
                         {!!@$contact->address!!}
                    </td>
                    <td><a href="{{route('contact.edit',[$contact])}}"><button class="btn btn-outline-info btn-sm"><i class="fas fa-pen-square"></i></button></a>
                      <form action="{{route('contact.destroy',[$contact])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
                   
                  </tr>
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Map</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
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