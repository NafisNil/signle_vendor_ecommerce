@extends('frontend.layout.master')
@section('title')
    Abohoman - Category
@endsection

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{route('all_product')}}">All Product</a></li>
    </ul>
    <div class="row">
        <div id="column-left" class="col-sm-3 hidden-xs column-left">
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
            <div class="panel panel-default filter">
                <div class="panel-heading columnblock-title">Refine Search</div>
                <div class="filter-block">
                    <div class="list-group"> <a class="list-group-item">Color</a>
                        <form action="{{route('all_product')}}" method="GET">
                            <div class="list-group-item">
                                <div id="filter-group1">
                                    @foreach ($color as $item)
                                    @php
                                        $checked = [];
                                        if(isset($_GET['color'])){
                                            $checked = $_GET['color'];
                                        }
                                    @endphp
                                    <label class="checkbox">
                                    <input name="color[]" type="checkbox" value="{{$item->id}}"  
                                    @if (in_array($item->id, $checked))
                                        checked
                                    @endif
                                    />
                                    {{$item->name}}</label>
                                          
                                    @endforeach
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button type="submit" id="button-filter" class="btn btn-primary">Refine Search</button>
                            </div>
                        </form>

                        <a class="list-group-item">Size</a>
                        <form action="{{route('all_product')}}" method="GET">
                        <div class="list-group-item">
                            <div id="filter-group3">
                                @foreach ($size as $item) 
                                @php
                                $checked_size = [];
                                if(isset($_GET['size'])){
                                    $checked_size = $_GET['size'];
                                }
                            @endphp
                                <label class="checkbox">
                              
                                <input name="size[]" type="checkbox" value="{{$item->id}}"   @if (in_array($item->id, $checked_size))
                                checked
                                     @endif />
                                {{$item->name}}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" id="button-filter" class="btn btn-primary">Refine Search</button>
                        </div>
                        </form>
                    </div>
                    
                </div>
            </div>
           
            <h3 class="productblock-title">Specials</h3>
            <div class="row special-grid product-grid">
                @foreach ($product_special as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-grid-item">
                    <div class="product-thumb transition">
                        <div class="image product-imageblock"> <a href="{{route('details_product',$item->id)}}"><img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="women's clothing" title="women's clothing" class="img-responsive" /></a>
                            <div class="button-group">
                                <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                            </div>
                        </div>
                        <div class="caption product-detail">
                            <h4 class="product-name"> <a href="{{route('details_product',$item->id)}}" title="women's clothing">{{$item->name}}</a> </h4>
                            <p class="price product-price"> <span class="price-new">{{$item->price}} Tk.</span><span class="price-tax">{{$item->shipping_price}} Tk.</span> </p>
                        </div>
                        <div class="button-group">
                            <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                        </div>
                    </div>
                </div>
  
                @endforeach
                
            </div>
        </div>
        <div id="content" class="col-sm-9">
           
            <div class="category-page-wrapper">
                <div class="col-md-6 list-grid-wrapper">
                    <div class="btn-group btn-list-grid">
                        <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                        <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                    </div>
                    <a href="#" id="compare-total">Product Compare (0)</a> </div>
                <form action="{{route('all_product')}}" method="get">
                <div class="col-md-5 text-right sort-wrapper">
                    <label class="control-label" for="input-sort">Sort By :</label>
                    <div class="sort-inner">
                        <select id="input-sort" class="form-control" name="order">
                            <option value="ASC" selected="selected">Default</option>
                            <option value="name_asc">Name (A - Z)</option>
                            <option value="name_desc">Name (Z - A)</option>
                            <option value="price_asc">Price (Low &gt; High)</option>
                            <option value="price_desc">Price (High &gt; Low)</option>
                        </select>
                        
                    </div>
                    <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                </div>
            </form>
            </div>
            <br />
            <div class="grid-list-wrapper">
                @foreach ($product as $item)
                <div class="product-layout product-list col-xs-12">
                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="{{route('details_product',$item->id)}}"> <img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="women's clothing stores" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
                            <div class="button-group">
                                <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                            </div>
                        </div>
                        <div class="caption product-detail">
                            <h4 class="product-name"> <a href="{{route('details_product',$item->id)}}" title="lorem ippsum dolor dummy"> {{$item->name}} </a> </h4>
                            <p class="product-desc"> {{$item->short_desc}}</p>
                            <p class="price product-price"><span class="price-old">{{$item->old_price}} Tk</span> {{$item->price}} Tk<span class="price-tax">Shipping Cost: {{$item->shipping_price}} Tk</span> </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>                                    </div>
                        </div>
                        @if ($item->availability == 1)
                        <div class="button-group">
                            <a href="{{route('details_product',$item->id)}}" class="addtocart-btn">Add To Cart</a>
                        </div>
                        @endif
                       
                    </div>
                </div>
                @endforeach
               
                
            </div>
            <div class="category-page-wrapper">
                <div class="result-inner">Showing 1 to 8 of 10 (2 Pages)</div>
   
            </div>
        </div>
    </div>
</div>
@endsection