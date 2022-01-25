
                @include('admin.sessionMsg')
                <div class="card-body">
                  
               
                   <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{old('name',@$edit->name)}}" placeholder="Enter name">
                  </div>
        
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>