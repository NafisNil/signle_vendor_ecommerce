  
                @include('admin.sessionMsg')
                <div class="card-body">
                  
               
                   <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{old('name',@$edit->name)}}" placeholder="Enter name">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                      @foreach ($brand as $item)
                      <option value="{{$item->id}}" {{$item->id ==@$edit->brand_id?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="" value="{{old('email',@$edit->email)}}" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="" value="{{old('password',@$edit->password)}}" placeholder="Enter password">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Coupon</label>
                    <input type="text" name="coupon" class="form-control" id="" value="{{old('coupon',@$edit->coupon)}}" placeholder="Enter coupon">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="" value="{{old('mobile',@$edit->mobile)}}" placeholder="Enter mobile">
                  </div>
        
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      