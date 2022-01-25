
                @include('admin.sessionMsg')
                <div class="card-body">
                  
                   <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
             
                    <input type="url" name="facebook" class="form-control" id="" value="{{old('facebook',@$edit->facebook)}}" placeholder="Enter facebook">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube</label>
                    <input type="url" name="youtube" class="form-control" id="" value="{{old('youtube',@$edit->youtube)}}" placeholder="Enter youtube">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram</label>
                    <input type="url" name="instagram" class="form-control" id="" value="{{old('instagram',@$edit->instagram)}}" placeholder="Enter instagram">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      
               