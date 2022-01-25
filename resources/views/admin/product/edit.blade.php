@extends('admin.master')
@section('content')

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.update',[$edit])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              @include('admin.product.form')
                      </form>
            </div>
            <!-- /.card -->

    

          </div>
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'short_desc' );
      CKEDITOR.replace( 'long_desc' );
  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
      $('#category').on('change', function () {
      let id = $(this).val();

      $('#sub_category').empty();
      $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
      $.ajax({
      type: 'GET',
      url: '/get-subcategory/' + id,
      success: function (response) {
      var response = JSON.parse(response);
      console.log(response);   
      $('#sub_category').empty();
      $('#sub_category').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
      response.forEach(element => {
          $('#sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
          });
      }
  });
});
});
</script>
@endsection