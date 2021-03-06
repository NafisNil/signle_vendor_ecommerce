@extends('admin.master')
@section('title')
    Abohoman - Product Details
@endsection
@section('content')
      <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
              <div class="col-12">
                <img src="{{(!empty($product->logo))?URL::to('storage/'.$product->logo):URL::to('image/no_image.png')}}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{(!empty($product->logo))?URL::to('storage/'.$product->logo):URL::to('image/no_image.png')}}" alt="Product Image"></div>
                @foreach ($sub_image as $item)
                <div class="product-image-thumb" ><img src="{{(!empty($item->sub_image))?URL::to('storage/'.$item->sub_image):URL::to('image/no_image.png')}}" alt="Product Image"></div>
                @endforeach
               
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->name}}</h3>
              <p>{!!$product->short_desc!!}</p>

              <hr>
              <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  @foreach ($color as $item)
                  <label class="btn btn-default text-center active">
                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                    {{$item->color->name}}
                    <br>
                    <i class="fas fa-circle fa-2x text-{{Str::lower($item->color->name)}}"></i>
                  </label>
                  @endforeach
                
       
              </div>

              <h4 class="mt-3">Size </h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  @foreach ($size as $item)
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">{{$item->size->name}}</span>
                    <br>
                    {{$item->size->name}}
                  </label>
                  @endforeach
                
      
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 {{$product->price}} Tk.
                </h2>
                <h4 class="mt-0">
                  <small>Shipping Cost: {{$product->shipping_price}} Tk. </small> <br>
                  <small>Old Price: {{$product->old_price}} Tk. </small>
                </h4>
              </div>

              

             

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Long Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Others Information</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {!!$product->long_desc!!}</div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"><b> Category </b>: {{$product->category->name}} <br><b>Sub Category </b>: {{$product->subcategory->name}} <br><b> Brand </b>: {{$product->brand->name}} <br> <b> Seller </b>: {{$product->seller}} </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
@endsection