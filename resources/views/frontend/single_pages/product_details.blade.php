@extends('frontend.layout.master')
@section('title')
    Abohoman - Product Details
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('category.product',$product->category->id)}}">{{$product->category->name}}</a></li>
        <li><a href="#">{{$product->name}}</a></li>
    </ul>
    <div class="row">
        <div id="column-left" class="col-sm-3 hidden-xs column-left">
            <div class="column-block">
                <div class="column-block">
                    <div class="columnblock-title">Categories</div>
                    <div class="category_block">
                        <ul class="box-category treeview-list treeview">
                            @foreach ($category as $item)
                            <li><a href="#" class="activSub">{{$item->category->name}}</a>
                                @php
                                    $subcategory = App\SubCategory::where('category_id',$item->category->id)->get();
                                   
                                @endphp
                                <ul>
                                    @foreach ($subcategory as $item)
                                    <li><a href="{{route('subcategory.product',$item->id)}}">{{$item->name}}</a></li>
                                    @endforeach
                                    
                                   
                                </ul>
                            </li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </div>
           
                <h3 class="productblock-title">Latest</h3>
                <div class="row latest-grid product-grid">
                    @foreach ($latest_product as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-grid-item">
                        <div class="product-thumb transition">
                            <div class="image product-imageblock"><a href="#"><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="lorem ippsum dolor dummy" title="{{$item->name}}" class="img-responsive" /></a>
                                <div class="button-group">
                                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                                    <button type="button" class="addtocart-btn">Add to Cart</button>
                                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                            <div class="caption product-detail">
                                <h4 class="product-name">
                                    <a href="{{route('details_product',$item->id)}}" title="lorem ippsum dolor dummy">{{$item->name}}</a>
                                </h4>
                                <p class="price product-price">{{$item->price}}Tk.<span class="price-tax">Shipping Cost: {{$item->shipping_price}}</span></p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>                                        </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                  
                </div>
                <h3 class="productblock-title">Specials</h3>
                <div class="row special-grid product-grid">
                    @foreach ($special_product as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-grid-item">
                        <div class="product-thumb transition">
                            <div class="image product-imageblock"> <a href="#"><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="women's clothing" title="{{$item->name}}" class="img-responsive" /></a>
                            </div>
                            <div class="caption product-detail">
                                <h4 class="product-name"><a href="#" title="lorem ippsum dolor dummy">{{$item->name}}</a></h4>
                                <p class="price product-price"> <span class="price-new">{{$item->price}} Tk</span> <span class="price-tax">Shipping Price: {{$item->shipping_price}} Tk</span> </p>
                            </div>
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn">Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
               
                </div>
            </div>
        </div>
        <div id="content" class="col-sm-9">
            <div class="row">
                <div class="col-sm-6">
                    <div class="thumbnails">
                        <div><a class="thumbnail fancybox" href="{{(!empty($product->logo))?URL::to('storage/'.$product->logo):URL::to('image/no_image.png')}}" title="lorem ippsum dolor dummy"><img src="{{(!empty($product->logo))?URL::to('storage/'.$product->logo):URL::to('image/no_image.png')}}" title="{{$product->name}}" alt="lorem ippsum dolor dummy" style="height: 600px" /></a></div>
                        <div id="product-thumbnail" class="owl-carousel">
                            @foreach ($product_sub as $item)
                            <div class="item">
                                <div class="image-additional"><a class="thumbnail fancybox" href="{{(!empty($item->sub_image))?URL::to('storage/'.$item->sub_image):URL::to('image/no_image.png')}}" title="lorem ippsum dolor dummy"> <img src="{{(!empty($item->sub_image))?URL::to('storage/'.$item->sub_image):URL::to('image/no_image.png')}}" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" /></a></div>
                            </div>
                            @endforeach
                            
                     
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h1 class="productpage-title">{{$product->name}}</h1>
                    <div class="rating product"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <span
                            class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>                                <span class="review-count"> <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a></span>
                            <hr>
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
                            <script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
                            <!-- AddThis Button END -->
                    </div>
                    <ul class="list-unstyled productinfo-details-top">
                        <li>
                            <h2 class="productpage-price">{{$product->price}}</h2>
                        </li>
                        <li><span class="productinfo-tax">Shipping Cost: {{$product->shipping_price}}</span></li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled product_info">
                        <li>
                            <label>Brand:</label>
                            <span> <a href="#">{{$product->brand->name}}</a></span></li>
                        <li>
                            <label>Product Code:</label>
                            <span> {{$product->code}}</span></li>
                            <li>
                               
                                @php
                                    $color = App\ProductColor::where('product_id',$product->id)->get();
                                   
                                    $size = App\ProductSize::where('product_id',$product->id)->get();
                                @endphp

                             
                        <li>
                            <label>Availability:</label>
                            <span> @if ($product->availability == 1)
                                In Stock
                            @else
                                Out of Stock
                            @endif</span></li>
                    </ul>
                    <hr>
                    <p class="product-desc"> {!!$product->short_desc!!}</p>
                    @if ($product->availability == 1)
                        
                    
                    <div id="product">
                        <form action="{{route('insert.cart')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label qty-label" for="input-quantity" class="form-control">Qty</label>
                                <input type="text" name="qty" value="1" size="2" id="input-quantity" class="form-control " />
                                <input type="hidden" name="id" value="{{$product->id}}">
                            
                            </div> 
                            <div class="form-group">
                                <label class="control-label qty-label" for="input-quantity">Color</label>
                                <select id="input-limit" class="form-control" name="color_id">
                                    <option value="8" disabled>Select Color</option>
                                    @foreach ($color as $item)
                                    <option value="{{$item->color->id}}">{{$item->color->name}}</option>
                                    @endforeach
                                    
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label qty-label" for="input-quantity">Size</label>
                                <select id="input-limit" class="form-control" name="size_id">
                                    <option value="8" disabled>Select Size</option>
                                    @foreach ($size as $item)
                                    <option value="{{$item->size->id}}">{{$item->size->name}}</option>
                                    @endforeach
                                    
                                
                                </select>
                            </div>
                            <div class="btn-group">
                                <button type="button" data-toggle="tooltip" class="btn btn-default wishlist" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                                <button type="submit" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart">Add to Cart</button>
                            
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            <div class="productinfo-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                    <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-description">
                        <div class="cpt_product_description ">
                            <div>
                                {!!$product->long_desc!!}
                            </div>
                        </div>
                        <!-- cpt_container_end -->
                    </div>
                    <div class="tab-pane" id="tab-review">
                        <form class="form-horizontal">
                            <div id="review"></div>
                            <h2>Write a review</h2>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-name">Your Name</label>
                                    <input type="text" name="name" value="" id="input-name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-review">Your Review</label>
                                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label">Rating</label> &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                    <input type="radio" name="rating" value="1" /> &nbsp;
                                    <input type="radio" name="rating" value="2" /> &nbsp;
                                    <input type="radio" name="rating" value="3" /> &nbsp;
                                    <input type="radio" name="rating" value="4" /> &nbsp;
                                    <input type="radio" name="rating" value="5" /> &nbsp;Good
                                </div>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h3 class="productblock-title">Related Products</h3>
            <div class="box">
                <div id="related-slidertab" class="row owl-carousel product-slider">
                    @foreach ($related_product as $item)
                    <div class="item">
                        <div class="product-thumb transition">
                            <div class="image product-imageblock"> <a href="{{route('details_product',$item->id)}}"> <img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="women's clothing" title="{{$item->name}}" class="img-responsive" /> </a>
                                <div class="button-group">
                                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                                    <button type="button" class="addtocart-btn">Add to Cart</button>
                                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                            <div class="caption product-detail">
                                <h4 class="product-name"><a href="{{route('details_product',$item->id)}}" title="women's clothing">{{$item->name}}</a></h4>
                                <p class="price product-price"> <span class="price-new">{{$item->price}} Tk</span> <span class="price-old">{{$item->old_price}} Tk</span> <span class="price-tax">Shipping Cost: {{$item->shipping_price}} Tk</span> </p>
                            </div>
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn">Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
          
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection