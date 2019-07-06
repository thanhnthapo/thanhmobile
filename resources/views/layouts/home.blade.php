<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thành Mobile</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="e-commerce site well design with responsive view." />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
 {{--  <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('fontawesome/js/all.css') }}" rel="stylesheet" type="text/css" />
 --}}  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'" rel="stylesheet">
  <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('owl-carousel/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen" />
  <link href="{{ asset('owl-carousel/owl.transitions.css') }}" type="text/css" rel="stylesheet" media="screen" />
  <script src="{{ asset('javascript/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('javascript/jstree.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('javascript/template.js') }}" type="text/javascript" ></script>
  <script src="{{ asset('javascript/common.js') }}" type="text/javascript"></script>
  <script src="{{ asset('javascript/global.js') }}" type="text/javascript"></script>
  <script src="{{ asset('owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
</head>
<body>
 {{--  <div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="{{ asset('image/loader.gif') }}"  alt="#"/></div> --}}
  <header>
    @include('layouts.partions.header')
    @include('layouts.partions.menu-top')
  </header>
  {{-- <div class="container"> --}}
    @yield('content')
 {{--  </div>  --}}

  <footer>
    {{-- <div class="container"> --}}
      @include('layouts.partions.footer')
    {{-- </div> --}}
  </footer>
    <script src="{{ asset('javascript/parally.js') }}"></script> 
    <script>
      $('.parallax').parally({offset: -40});
    </script>
  </body>
  </html>
