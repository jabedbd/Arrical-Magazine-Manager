@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
  $("#bookmarkme").click(function() {
    if (window.sidebar) { // Mozilla Firefox Bookmark
      window.sidebar.addPanel(location.href,document.title,"");
    } else if(window.external) { // IE Favorite
      window.external.AddFavorite(location.href,document.title); }
    else if(window.opera && window.print) { // Opera Hotlist
      this.title=document.title;
      return true;
    }
  });
});

</script>
<meta property="og:url"           content="{{url('view/issue/')}}/{{$issue->id}}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{$issue->issue}}" />
	<meta property="og:description"   content="{{$issue->des}}" />
	<meta property="og:image"         content="{{url('public/cover')}}/{{$issue->cover}}" />
<div class="container-full">
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">ISSUE: {{$issue->issue}}</div>

                <div class="panel-body">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 old-bg ">
                       <div class="responsive-video">
                      <embed src="{{url('public/web')}}/{{$issue->file}}" width="100%" height="auto" type='application/pdf'>
                        </div>
                       <div class="col-md-1"></div>                   
                    </div>
                         <div class="col-md-5 dt-bg">
                        </br>
                        Issue: {{$issue->issue}} </br></br>
                        Published on: {{date("d M Y", strtotime($issue->publish_date))}} </br></br>
                        Total Views: {{$issue->view}} </br></br>
                        Total Downloads: {{$issue->download}} </br></br>
                         <a class="btn btn-primary shadow" href="{{url('public/web/viewer.html?file=')}}{{$issue->file}}">Read in Full Screen</a>
                         <a class="btn btn-primary shadow" href="{{url('download/issue/')}}/{{$issue->id}}" >Download</a>
                         <a class="btn btn-primary shadow" id="bookmarkme" href="#" rel="sidebar" title="{{$issue->issue}}">Add to Favorite</a> </br> </br>
<div class="panel panel-default">
<div class="panel-heading text-center">Description</div>
   
</div>
<div class="des">
 {!!$issue->des!!}
</div>
<div class="panel panel-default">
<div class="panel-heading text-center">Share with Friends</div>
</div>
<center><a href="https://web.facebook.com/sharer.php?u={{url('view/issue/')}}/{{$issue->id}}" target="_blank" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
<a href="https://plus.google.com/share?url={{url('view/issue/')}}/{{$issue->id}}" target="_blank" class="btn-social btn-google-plus"><i class="fa fa-google-plus"></i></a>
<a href="http://twitter.com/intent/tweet?text={{$issue->issue}}&url={{url('view/issue/')}}/{{$issue->id}}" target="_blank" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></center>
 
                             
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
