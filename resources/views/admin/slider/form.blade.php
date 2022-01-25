
                @include('admin.sessionMsg')
                <div class="card-body">
                  <div class="form-group row">
                      <label for="Image" class="col-md-4 col-form-label text-md-right"></label>
                      <div class="col-md-6">
                      
                      <img id="showImage" src="{{(!empty($edit->image))?URL::to('upload/slider_image/'.$edit->image):URL::to('image/no_image.png')}}"  style="widows: inherit; width:120px; height:120px; border:1px solid #042b3d" alt="">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="" value="{{old('title',@$edit->title)}}" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input"  id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      