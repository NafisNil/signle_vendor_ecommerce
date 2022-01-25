<div class="col-sm-3 hidden-xs column-left" id="column-left">
    <div class="column-block">
        <div class="columnblock-title">{{Auth::user()->name}}</div>
        <div class="account-block">
            <div class="list-group"> 
                @if (Auth::user())
                <a class="list-group-item"href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a> <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                <a class="list-group-item" href="{{route('customer.password')}}">Password Change</a>
                <a class="list-group-item" href="{{route('customer.edit')}}">Edit Profile</a>
                <a class="list-group-item" href="{{route('customer.order.list')}}">Orders</a>
                @else
                <a class="list-group-item" href="{{route('customer.login')}}">Login</a>
                <a class="list-group-item" href="{{route('customer.signup')}}">Register</a>           
                @endif
            </div>
                
        </div>
    </div>
</div>