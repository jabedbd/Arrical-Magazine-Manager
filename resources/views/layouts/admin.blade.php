<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Magazine Manager</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('public/css/style.css')}}" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
     <script>tinymce.init({ selector:'textarea' });</script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <link href="{{url('public/slide/assets/css/bootstrapTheme.css')}}" rel="stylesheet">
    <link href="{{url('public/slide/assets/css/custom.css')}}" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <link href="{{url('public/slide/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{url('public/slide/owl-carousel/owl.theme.css')}}" rel="stylesheet">

    <!-- Prettify -->
    <link href="{{url('assets/js/google-code-prettify/prettify.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{url('public/css/style.css')}}" >
     <link rel="stylesheet" href="{{url('public/css/admin.css')}}" >
    <link rel="stylesheet" href="{{url('public/css/font-awesome.min.css')}}" >
    
       <link rel="stylesheet" href="{{url('public/file/css/fileinput.min.css')}}" >
      <link rel="stylesheet" href="{{url('public/css/bootstrap-tagsinput.css')}}" >
    <link rel="stylesheet" href="{{url('public/css/jquery.dataTables.min.css')}}" >
    <!-- Javascript --> 
    
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{{url('public/file/js/fileinput.min.js')}}"></script>
    <script src="{{url('public/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{url('public/js/jquery.dataTables.min.js')}}"></script>
     <script src="{{url('public/js/notify.min.js')}}"></script>
    
</head>
<body id="app-layout">
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
        <?php 
        
        $path =Route::getCurrentRoute()->getPath();
        ?>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li @if($path == "admin") class="active" @endif><a href="{{url('admin')}}">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="{{url('edit-info')}}" >Admin Info<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
        </li>          
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Issue Manager<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
               <li class="divider"></li>
            <li><a href="{{URL::to('issue/add')}}">Add New Issue</a></li>
              <li class="divider"></li>
            <li><a href="{{URL::to('issue/all')}}">All Issues</a></li>
          </ul>
        </li>  

          </li>        
        <li @if($path == "static") class="active" @endif ><a href="{{url('static')}}">Static Pages<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
        <li @if($path == "settings") class="active" @endif ><a  href="{{url('settings')}}">Settings<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a></li>
        <li ><a target='_blank' href="{{url('/')}}">Visit Site<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-globe"></span></a></li>
        <li ><a href="{{url('logout')}}">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

    @yield('content')
 <div class="row">
    <div class="col-md-12 footer">
      <div class="col-md-1"></div>
         <div class="col-md-7">
        <h5>&copy; Magazine Manager</h5>
             <?php
$string = file_get_contents("http://studioarrival.com/software/update.php");
$update = json_decode($string, true);
$latest = $update['version'];
$url = $update['url'];
$date = $update['date'];
$copy = $update['copy'];
$custom = $update['custom'];
$current = config('app.version');
?>
             <?php 
             $settings = DB::table('settings')->where('id',1)->first();
             ?>
          @if($current != $latest && $settings->update_notefication == 0)
            
    A New version is available. <a class="btn btn-xs btn-success" href="update/on">Turn on Notification</a>
             @endif
        </div>
    
        <div class="col-md-4">
        <a class="social-icon" href="#"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a class="social-icon" href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a class="social-icon" href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a class="social-icon" href="#"><i id="social-em" class="fa fa-pinterest-square fa-3x social"></i></a>
        </div>

     </div>
    
    </div>   
</div>
    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <script src="{{url('public/slide/owl-carousel/owl.carousel.min.js')}}"></script>
 


    <!-- Frontpage Demo -->
    <script>

  $(document).ready(function() {
      $("#old-issue").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    </script>

   
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Version Available!</h4>
      </div>
      <div class="modal-body">
          <h4>You Are using {{config('app.version')}}!  Our New Version is {{$latest}}</h4>
          <p>Last Update {{$date}}!</p>
          {{$custom}} </br>
        <a href="{{$url}}" class="btn btn-primary">Get The Latest Version</a></br>
        <p>&nbsp;</p> <a href="{{url('update/off')}}" class="btn btn-primary">Turn off Notification</a>
      </div>
      <div class="modal-footer">
          {{$copy}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<?php 

if($current != $latest && $settings->update_notefication == 1){
    
    ?>
<script>
$('#myModal').modal('show');
</script>
<?php
}
?>
</body>
</html>
