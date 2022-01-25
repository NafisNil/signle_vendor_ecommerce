<header>
  <div class="header-top">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <div class="top-left pull-left">
                      <div class="language">
                          <form action="#" method="post" enctype="multipart/form-data" id="language">
                              <div class="btn-group">
                                  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="{{asset('frontend')}}/image/flags/gb.png" alt="English" title="English"> <i class="fa fa-caret-down"></i></button>
                                  <ul class="dropdown-menu">
                                      <li><a href="#"><img src="{{asset('frontend')}}/image/flags/lb.png" alt="Arabic" title="Arabic"> Arabic</a></li>
                                      <li><a href="#"><img src="{{asset('frontend')}}/image/flags/gb.png" alt="English" title="English"> English</a></li>
                                  </ul>
                              </div>
                          </form>
                      </div>
                      <div class="currency">
                          <form action="#" method="post" enctype="multipart/form-data" id="currency">
                              <div class="btn-group">
                                  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> <strong>$</strong> <i class="fa fa-caret-down"></i> </button>
                                  <ul class="dropdown-menu">
                                      <li>
                                          <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                                      </li>
                                      <li>
                                          <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                                      </li>
                                      <li>
                                          <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ US Dollar</button>
                                      </li>
                                  </ul>
                              </div>
                          </form>
                      </div>
                  </div>
                  <div class="top-right pull-right">
                      <div id="top-links" class="nav pull-right">
                          <ul class="list-inline">
                              <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span>My Account</span> <span class="caret"></span></a>
                                  <ul class="dropdown-menu dropdown-menu-right">
                                      @if (Auth::user())
                                      <li><a href="{{route('dashboard')}}">{{Auth::user()->name}}</a></li>
                                      <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>  
                                                    </li>
                                      @else
                                      <li><a href="{{route('customer.signup')}}">Register</a></li>
                                      <li><a href="{{route('customer.login')}}">Login</a></li>
                                      @endif
                                      
                                  </ul>
                              </li>
                              <li><a href="#" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart"></i> <span>Wish List</span><span> (0)</span></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="header-inner">
          <div class="col-sm-4 col-xs-6 header-left">
              <div class="shipping">
                  <div class="shipping-img"></div>
                  <div class="shipping-text">{{$contact->mobile}}<span class="shipping-detail">Week From 9:00am To 7:00pm</span></div>
              </div>
          </div>
          <div class="col-sm-4 col-xs-6 header-middle">
              <div class="header-middle-top">
                  <div id="logo"> <a href="{{url('/')}}"><img src="{{(!empty($logo->image))?URL::to('upload/logo_image/'.$logo->image):URL::to('image/no_image.png')}}" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
              </div>
          </div>
          @php
          $content = Cart::content();
          
          $shipping = 0;
          $total = 0;
      @endphp
          <div class="col-sm-4 col-xs-6 header-right">
              <div id="cart" class="btn-group btn-block">
                  <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"><span id="cart-total">{{Cart::count()}} item(s) </span><i class="fa fa-caret-down"></i></button>
                  <ul class="dropdown-menu pull-right cart-dropdown-menu">
                      <li>
                          <table class="table table-striped">
                              <tbody>
                                @foreach ($content as $item)
                                @php
                                   
                                    $shipping += $item->options->shipping_cost;
                                    $total += $item->subtotal;
                                @endphp
                                  <tr>
                                      <td class="text-center"><a href="#"><img class="img-thumbnail" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" src="{{URL::to('storage/'.$item->options->image)}}" style="max-width: 50px;max-height:50px"></a></td>
                                      <td class="text-left"><a href="#">{{$item->name}}</a></td>
                                      <td class="text-right">{{$item->qty}}</td>
                                      <td class="text-right">{{$item->price}} Tk.</td>
                                      <td class="text-center"><a href="{{route('delete.cart',$item->rowId)}}"><button class="btn btn-danger btn-xs" title="Remove" type="button"><i class="fa fa-times"></i></button></a></td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </li>
                      <li>
                          <div>
                              <table class="table table-bordered">
                                  <tbody>
                                      <tr>
                                          <td class="text-right"><strong>Sub-Total</strong></td>
                                          <td class="text-right">{{$total}} Tk.</td>
                                      </tr>
                                      <tr>
                                          <td class="text-right"><strong>Shipping Cost</strong></td>
                                          <td class="text-right">{{$shipping}} Tk.</td>
                                      </tr>
                                      
                                      <tr>
                                          <td class="text-right"><strong>Total</strong></td>
                                          <td class="text-right">{{$total + $shipping}} Tk.</td>
                                      </tr>
                                  </tbody>
                              </table>
                              <p class="text-right"> <span class="btn-viewcart"><a href="{{route('show.cart')}}"><strong><i class="fa fa-shopping-cart"></i> View Cart</strong></a></span> <span class="btn-checkout">
                                  @if (Auth::user())
                                  <a href="{{route('customer.checkout')}}"><strong><i class="fa fa-share"></i> Checkout</strong></a>
                                  @else
                                  <a href="{{route('customer.login')}}"><strong><i class="fa fa-share"></i> Checkout</strong></a>
                                  @endif
                                  
                                </span>                                        </p>
                          </div>
                      </li>
                  </ul>
              </div>
              <div id="search" class="input-group">
                  <form action="{{route('all_product')}}" method="get">
                  <input type="text" name="name" value="" placeholder="Search Product..." class="form-control input-lg" />
                  <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span> </form></div>
          </div>
      </div>
  </div>
</header>

<nav id="menu" class="navbar">
  <div class="nav-inner container">
      <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
          <button type="button" class="btn btn-navbar navbar-toggle"><i class="fa fa-bars"></i></button>
      </div>
      <div class="navbar-collapse">
          <ul class="main-navigation">
              <li><a href="{{route('index')}}" class="parent">Home</a> </li>
              <li><a href="{{route('all_product')}}" class="parent">All Product</a> </li>
              @foreach ($category as $item)
              <li><a href="{{route('category.product',$item->category->id)}}" class="parent">{{$item->category->name}}</a> </li>
              @endforeach
              
           <!--   <li><a href="#" class="active parent">Page</a>
                  <ul>
                      <li><a href="category.html">Category Page</a></li>
                      <li><a href="cart.html">Cart Page</a></li>
                      <li><a href="checkout.html">Checkout Page</a></li>
                      <li><a href="blog.html">Blog Page</a></li>
                      <li><a href="singale-blog.html">Singale Blog Page</a></li>
                      <li><a href="register.html">Register Page</a></li>
                      <li><a href="contact.html">Contact Page</a></li>
                  </ul>
              </li>
              <li><a href="blog.html" class="parent">Blog</a></li>
              <li><a href="about-us.html">About us</a></li>
              <li><a href="contact.html">Contact Us</a> </li> -->
          </ul>
      </div>
  </div>
</nav>