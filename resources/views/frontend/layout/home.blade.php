@extends('frontend.layout.master')
@section('title')
    Abohoman - Index
@endsection
@section('content')
@include('frontend.layout.slider')
<div class="container">
  <div class="row">
      <div class="cms_banner">
          <div class="col-md-4 cms-banner-left"> <a href="#"><img alt="#" src="{{asset('frontend')}}/image/banners/subbanner1.jpg"></a> </div>
          <div class="col-md-4 cms-banner-middle"> <a href="#"><img alt="#" src="{{asset('frontend')}}/image/banners/subbanner2.jpg"></a> </div>
          <div class="col-md-4 cms-banner-right"> <a href="#"><img alt="#" src="{{asset('frontend')}}/image/banners/subbanner3.jpg"></a> </div>
      </div>
  </div>
  <div class="row">
      <div id="content" class="col-sm-12">
          <div class="customtab">
              <div id="tabs" class="customtab-wrapper">
                  <ul class='customtab-inner'>
                      <li class='tab'><a href="#tab-latest">Latest</a></li>

                      <li class='tab'><a href="#tab-special">Special</a></li>
                   
                  </ul>
              </div>
              <div id="tab-latest" class="tab-content">
                  <div class="box">
                      <div id="latest-slidertab" class="row owl-carousel product-slider">
                          @foreach ($product as $item)
                          <div class="item">
                            <div class="product-thumb transition">
                                <div class="image product-imageblock"> <a href="{{route('details_product',$item->id)}}"><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
                                    <div class="button-group">
                                       <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                                       
                                    </div>
                                </div>
                                <div class="caption product-detail">
                                    <h4 class="product-name"><a href="{{route('details_product',$item->id)}}" title="lorem ippsum dolor dummy">{{$item->name}}</a></h4>
                                    <p class="price product-price">{{$item->price}} Tk.<span class="price-tax">Shipping Cost: {{$item->cost}} Tk.</span></p>
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>                                                </div>
                                </div>
                                <div class="button-group">
                                    <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                          @endforeach
                         
                 
                      </div>
                  </div>
              </div>
              <!-- tab-latest-->
              <div id="tab-special" class="tab-content">
                  <div class="box">
                      <div id="special-slidertab" class="row owl-carousel product-slider">
                          @foreach ($feature as $item)
                        
                          <div class="item">
                              <div class="product-thumb transition">
                                  <div class="image product-imageblock"> <a href="{{route('details_product',$item->id)}}"> <img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
                                      <div class="button-group">
                                        <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                                      </div>
                                  </div>
                                  <div class="caption product-detail">
                                      <h4 class="product-name"><a href="{{route('details_product',$item->id)}}" title="lorem ippsum dolor dummy">{{$item->name}}</a></h4>
                                      <p class="price product-price"> <span class="price-new">{{$item->price}} Tk.</span> <span class="price-old">{{$item->old_price}} Tk.</span> <span class="price-tax">Shipping Cost:{{$item->shipping_price}} Tk.</span> </p>
                                  </div>
                                  <div class="button-group">
                                    <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                                  </div>
                              </div>
                          </div>
                  
                          @endforeach
                      </div>
                  </div>
              </div>
              <!-- tab-special-->
              
              <div id="subbanner4" class="banner">
                  <div class="item"> <a href="{{$frontbanner->link}}"><img src="{{(!empty($frontbanner->logo))?URL::to('storage/'.$frontbanner->logo):URL::to('image/no_image.png')}}" alt="Sub Banner4" class="img-responsive" /></a> </div>
              </div>
              <h3 class="productblock-title">Featured</h3>
              <div class="box">
                  <div id="feature-slider" class="row owl-carousel product-slider">
                      @foreach ($feature as $item)
                   
                      <div class="item product-slider-item">
                          <div class="product-thumb transition">
                              <div class="image product-imageblock"> <a href="{{route('details_product',$item->id)}}"> <img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
                                  <div class="button-group">
                                    <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                                  </div>
                              </div>
                              <div class="caption product-detail">
                                  <h4 class="product-name"><a href="{{route('details_product',$item->id)}}" title="lorem ippsum dolor dummy">{{$item->name}}</a></h4>
                                  <p class="price product-price"> <span class="price-new">{{$item->price}} Tk.</span> <span class="price-old">{{@$item->old_price}} Tk.</span> <span class="price-tax">Shipping:{{$item->shipping_price}} Tk.</span> </p>
                              </div>
                              <div class="button-group">
                                <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                              </div>
                          </div>
                      </div>
                             
                      @endforeach
                  </div>
              </div>
              <div class="blog">
                  <div class="blog-heading">
                      <h3>In Stock Product</h3>
                  </div>
                  <div class="blog-inner box">
                      <ul class="list-unstyled blog-wrapper" id="latest-blog">
                          @foreach ($product_all as $item)
                              
                         
                          <li class="item blog-slider-item">
                              <div class="panel-default">
                                  <div class="blog-image"> <a href="{{route('details_product',$item->id)}}" class="blog-imagelink"><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="#"></a> <span class="blog-hover"></span><span class="blog-readmore-outer"><a href="#" class="blog-readmore">Read More</a></span>                                            </div>
                                  <div class="blog-content">
                                      <a href="{{route('details_product',$item->id)}}" class="blog-name">
                                          <h2>{{$item->name}}</h2>
                                      </a>
                                      <div class="blog-desc">{!!$item->short_desc!!}</div>
                                      <a href="{{route('details_product',$item->id)}}" class="blog-readmore">Details</a> </div>
                              </div>
                          </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
          <div id="brand_carouse" class="owl-carousel brand-logo">
              @foreach ($brand as $item)
              <div class="item text-center"> <a href="#"><img src="{{(!empty($item->brand->logo))?URL::to('storage/'.$item->brand->logo):URL::to('image/no_image.png')}}" alt="Disney" class="img-responsive" /></a> </div>
              @endforeach
             
            
          </div>
      </div>
  </div>
</div>
@endsection