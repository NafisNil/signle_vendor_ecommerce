<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="e-commerce site well design with responsive view." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="{{asset('frontend')}}/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="{{asset('frontend')}}/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,100,200,500,900,800,700,600' rel='stylesheet' type='text/css'>
    <link href="{{asset('frontend')}}/css/stylesheet.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/responsive.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/javascript/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{asset('frontend')}}/javascript/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />
    <script src="{{asset('frontend')}}/javascript/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="{{asset('frontend')}}/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/javascript/template_js/jstree.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/javascript/template_js/template.js"></script>
    <script src="{{asset('frontend')}}/javascript/common.js" type="text/javascript"></script>
    <script src="{{asset('frontend')}}/javascript/global.js" type="text/javascript"></script>
    <script src="{{asset('frontend')}}/javascript/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="preloader loader" style="display: block;"> <img src="{{asset('frontend')}}/image/loader.gif" alt="#" /></div>
  @include('frontend.layout.header')
  @yield('content')
  @include('frontend.layout.footer')

</body>

</html>