@extends('frontend.layout.master')
@section('title')
    Abohoman - Customer Dashboard
@endsection
@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="{{route('dashboard')}}">Register</a></li>
    </ul>
    <div class="row">
       @include('frontend.single_pages.customer_sidebar')
        <div class="col-sm-9" id="content">
            @if (session('success'))
            <div class="col-sm-12">
                @if (session('success'))
                   <p style="color:green">{{ session('success') }}</p> 
                @endif
                </div>
            </div>
             @endif
           
            <h1>Customer Dashboard</h1>
           <div class="card">
                <div class="card-body">
                    <div class="img-circle col-3 float-left" >
                        <img src="{{(!empty($user->logo))?URL::to('storage/'.$user->logo):URL::to('image/no_image.png')}}" alt="">
                    </div>
                    <div class="col-8 float-right" >
                        <p><strong>{{$user->email}}</strong></p>
                        <p><strong>{{$user->mobile}}</strong></p>
                        <p>{{$user->address}}</p>
                    </div>
                </div>
           </div>
    
        </div>
      
    </div>
</div>
@endsection