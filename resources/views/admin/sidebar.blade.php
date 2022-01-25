  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(Auth::user()->logo))?URL::to('upload/user_image/'.$item->image):URL::to('image/no_image.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
  @php
            $prefix = Request::route()->getPrefix();
            $route = Request::route()->getName();
        @endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->usertype == "admin")
              <li class="nav-item">
                <a href="{{route('get.user')}}" class="nav-link {{$route == 'get.user'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ambassador</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{route('logo.index')}}" class="nav-link {{$route == 'logo.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link {{$route == 'slider.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('about.index')}}" class="nav-link {{$route == 'about.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </a>
              </li>

           
              <li class="nav-item">
                <a href="{{route('credential.index')}}" class="nav-link {{$route == 'credential.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credential</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('contact.index')}}" class="nav-link {{$route == 'contact.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{$route == 'category.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('subcategory.index')}}" class="nav-link {{$route == 'subcategory.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('brand.index')}}" class="nav-link {{$route == 'brand.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('size.index')}}" class="nav-link {{$route == 'size.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{$route == 'product.index'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="{{route('customer.view')}}" class="nav-link {{$route == 'customer.view'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer View</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('customer.draft')}}" class="nav-link {{$route == 'customer.draft'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Draft</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="{{route('pending.order.list')}}" class="nav-link {{$route == 'pending.order.list'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Order</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('approved.order.list')}}" class="nav-link {{$route == 'approved.order.list'?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Order</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>