
                @include('admin.sessionMsg')
                <div class="card-body">
                  
                   <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
             
                    <textarea name="address" id="" cols="30" rows="10" class="form-control" >{{old('address',@$edit->address)}}</textarea>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Map</label>
                    <input type="text" name="map" class="form-control" id="" value="{{old('map',@$edit->map)}}" placeholder="Enter map">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="tel" name="mobile" class="form-control" id="" value="{{old('mobile',@$edit->mobile)}}" placeholder="Enter map">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" id="" value="{{old('email',@$edit->email)}}" placeholder="Enter email">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      
               