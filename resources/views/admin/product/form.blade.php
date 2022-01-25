
                @include('admin.sessionMsg')
                <div class="card-body ">
                  <div class="form-group row">
                    <label for="Image" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                    
                    <img id="showImage" src="{{(!empty($edit->logo))?URL::to('storage/'.$edit->logo):URL::to('image/no_image.png')}}"  style="widows: inherit; width:120px; height:120px; border:1px solid #042b3d" alt="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Feature Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="logo" class="custom-file-input"  id="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Sub Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="sub_image[]" class="custom-file-input "  multiple>
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                   
                  </div>
                </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{old('name',@$edit->name)}}" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="category" name="category_id" >
                      <option value="0"> Select Category</option>
                      @foreach ($category as $item)
                      <option value="{{$item->id}}" {{$item->id ==@$edit->category_id?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Sub Category</label>
                    <select class="form-control" id="sub_category" name="sub_category_id" >
                     
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select class="form-control" id="" name="brand_id" >
                      <option value="0"> Select Brand</option>
                      @foreach ($brand as $item)
                      <option value="{{$item->id}}" {{$item->id ==@$edit->brand_id?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Color</label>
                    <select class="form-control select2" id="" name="color_id[]" multiple >
                     
                      @foreach ($color as $item)
                      <option value="{{$item->id}}" {{(@in_array(['color_id'=>$item->id], $color_array))?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Size</label>
                    <select class="form-control select2" id="" name="size_id[]" multiple >
                     
                      @foreach ($size as $item)
                      <option value="{{$item->id}}" {{(@in_array(['size_id'=>$item->id], $size_array))?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Seller Name</label>
                    <input type="text" name="seller" class="form-control" id="" value="{{old('seller',@$edit->seller)}}" placeholder="Enter seller name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price </label>
                    <input type="text" name="price" class="form-control" id="" value="{{old('price',@$edit->price)}}" placeholder="Enter seller name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Price</label>
                    <input type="text" name="old_price" class="form-control" id="" value="{{old('old_price',@$edit->old_price)}}" placeholder="Enter seller name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Shipping Price</label>
                    <input type="text" name="shipping_price" class="form-control" id="" value="{{old('shipping_price',@$edit->shipping_price)}}" placeholder="Enter Shipping Cost">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Delivery Day </label>
                    <input type="number" name="delivery_date" class="form-control" id="" value="{{old('delivery_date',@$edit->delivery_date)}}" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Return Day</label>
                    <input type="number" name="return_date" class="form-control" id="" value="{{old('return_date',@$edit->return_date)}}" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
             
                    <textarea name="short_desc" id="" cols="30" rows="10" class="form-control" >{{old('short_desc',@$edit->short_desc)}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Long Description</label>
             
                    <textarea name="long_desc" id="" cols="30" rows="10" class="form-control" >{{old('long_desc',@$edit->long_desc)}}</textarea>
                  </div>

                 
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Availability</label>
                    <select class="form-control" id="" name="availability" >
                     
                      <option value="1" {{ '1' ==@$edit->availability?'selected':''}}>Available</option>
                      <option value="0" {{ '0' ==@$edit->availability?'selected':''}}>Out of Stock</option>
                    
                    </select>
                  </div> 

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Feature</label>
                    <select class="form-control" id="" name="feature" >
                     
                      <option value="1" {{ '1' ==@$edit->feature?'selected':''}}>Yes</option>
                      <option value="0" {{ '0' ==@$edit->feature?'selected':''}}>No</option>
                    
                    </select>
                  </div>
                  
        
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      