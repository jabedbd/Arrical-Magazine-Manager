<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
    $st = DB::table('settings')->where('id',1)->first();
    ?>
    <title>{{$st->magazine}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('public/css/style.css')}}" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <script>
function submit() {
    document.getElementById("search").submit();
}
</script>
    <link href="{{url('public/slide/assets/css/bootstrapTheme.css')}}" rel="stylesheet">
    <link href="{{url('public/slide/assets/css/custom.css')}}" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="{{url('public/slide/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('public/slide/owl-carousel/owl.theme.css')}}" rel="stylesheet">

    <!-- Prettify -->
    <link href="{{url('assets/js/google-code-prettify/prettify.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{url('public/css/style.css')}}" >
    <link rel="stylesheet" href="{{url('public/css/font-awesome.min.css')}}" >
    
    
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                  {{$st->magazine}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Cover Page</a></li>
                    <li><a href="{{ url('/issues') }}">All Issues</a></li>
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <form id="search" class="navbar-form" method="post" action="{{url('search')}}">
                        {{ csrf_field() }}
        <div class="form-group" style="display:inline;">
          <div class="input-group">
            <input name="search" class="form-control" type="text">
            <span id="submit" onclick="submit()" class="input-group-addon" type="submit"><span class="glyphicon glyphicon-search"></span></span>
          </div>
        </div>
      </form>
                    <!-- Authentication Links -->
                    
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
 <div class="row">
    <div class="col-md-12 footer">
      <div class="col-md-1"></div>
         <div class="col-md-7">
        <h5>&copy; {{$st->magazine}}</h5>
        </div>
    
        <div class="col-md-4">
            @if(!empty($st->fb))
        <a class="social-icon" href="{{$st->fb}}"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
            @endif
             @if(!empty($st->tw))
	            <a class="social-icon" href="{{$st->tw}}"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
            @endif
            @if(!empty($st->gplus))
	            <a class="social-icon" href="{{$st->gplus}}"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
            @endif
            @if(!empty($st->pin))
	            <a class="social-icon" href="{{$st->pin}}"><i id="social-em" class="fa fa-pinterest-square fa-3x social"></i></a>
            @endif
        </div>

     </div>
    
    </div>   
</div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="{{url('public/js/notify.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <script src="{{url('public/slide/owl-carousel/owl.carousel.min.js')}}"></script>

    <!-- Frontpage Demo -->
    <script>

  $(document).ready(function() {
      $("#old-issue").owlCarousel({
        autoPlay: 3000,
        items : {{$st->old_item}},
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
@if(session('show_error') != '' )
           <script>
               $.notify(
  "{{session('show_error')}}",
  { position:"right bottom", className:"error" }
);
    </script>
                
                {{--*/session(['show_error' => ''])/*--}}
                 {{--*/session(['show_success' => ''])/*--}}
   @elseif(session('show_success') != '' )
           <script>
               $.notify(
  "{{session('show_success')}}",
  { position:"right bottom", className:"success" }
);
    </script>
                
                {{--*/session(['show_success' => ''])/*--}}
        @endif  
</body>
</html>
