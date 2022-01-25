
                @include('admin.sessionMsg')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                      @foreach ($category as $item)
                      <option value="{{$item->id}}" {{$item->id ==@$edit->category_id?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                    
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{old('name',@$edit->name)}}" placeholder="Enter name">
                  </div>
        
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      