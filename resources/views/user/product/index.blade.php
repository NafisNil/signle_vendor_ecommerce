@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
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
                <h3 class="card-title">Product</h3>
                 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('admin.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Brand</th>
                    <th>Image</th>
                    <th>Seller</th>
                    <th>Availability</th>
                    <th>Feature</th>
                    <th>Special</th>
                   
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($product as $key=>$item)
                    
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->subcategory->name}}</td>
                    <td>{{$item->brand->name}}</td>
                    <td><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt=""></td>
                    <td>{{$item->seller}}</td>
                    <td>
                      @if ($item->availability == 0)
                      <a href="{{route('product.available',[$item])}}" class="btn btn-sm btn-outline-danger">
                          Out of Stock
                        </a>
                      @else
                      <a href="{{route('product.notavailable',[$item])}}" class="btn btn-sm btn-outline-success">
                          Available
                      </a>
                      @endif  
                    </td>
                    <td>
                      @if ($item->feature == 0)
                      <a href="#" class="btn btn-sm btn-outline-danger">
                          Not-Featured
                        </a>
                      @else
                      <a href="#" class="btn btn-sm btn-outline-success">
                          Featured
                        </a>
                      @endif  
                    </td>

                    <td>
                      @if ($item->special == 0)
                      <a href="#" class="btn btn-sm btn-outline-danger">
                          Not-Special
                        </a>
                      @else
                      <a href="#" class="btn btn-sm btn-outline-success">
                          Special
                        </a>
                      @endif  
                    </td>
                   
                   
                  </tr>
    
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Brand</th>
                    <th>Image</th>
                    <th>Seller</th>
                    <th>Availability</th>
                    <th>Feature</th>
                    <th>Special</th>
                   
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