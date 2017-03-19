@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Panel</div>

                <div class="panel-body">
                   <div class="row">
    <div class="col-md-4">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-book fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">Total Issues</div>
          <div class="circle-tile-number text-faded ">{{$total}}</div>
          <a class="circle-tile-footer" href="{{url('issue/all')}}">View All <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
                       
       <div class="col-md-4">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-download fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">Total Downloads</div>
          <div class="circle-tile-number text-faded ">{{$downloads}}</div>
         <a class="circle-tile-footer" href="{{url('issue/all')}}">View All <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
                       
       <div class="col-md-4">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-eye fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded">Total Views</div>
          <div class="circle-tile-number text-faded ">{{$views}}</div>
         <a class="circle-tile-footer" href="{{url('issue/all')}}">View All <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>

     
 
  </div> 
                </div>
                
                
            
            </div>
         <div class="row"> 
        <div class="col-md-6">
     <div class="panel panel-default">
                <div class="panel-heading">Last Issue Statistics</div>

                <div class="panel-body">
                    <div class="col-md-6">
                    <img width="100%" src="{{url('public/cover')}}/{{$populer->cover}}"/>
                    </div>
                    <div class="col-md-6">
                        <h5>Name: {{$populer->issue}} </h5>
                   <h5>Total Downloads: {{$populer->download}}</h5>
                    <h5>Total views: {{$populer->view}}</h5>
                    <h5>Total score: {{$populer->view+$populer->download}}</h5>
                    </div>
                    
         </div>
            </div>
        </div>
              <div class="col-md-3">
     <div class="panel panel-default">
                <div class="panel-heading">Most Viewed Issue</div>

                <div class="panel-body">
                    <a href="{{url('issue/view')}}/{{$vpopuler->id}}">
                    <img width="100%" src="{{url('public/cover')}}/{{$vpopuler->cover}}"/>
                        </a>
                    
         </div>
            </div>
        </div>
                 <div class="col-md-3">
     <div class="panel panel-default">
                <div class="panel-heading">Most Downloaded Issue</div>

                <div class="panel-body">
                    <a href="{{url('issue/view')}}/{{$dpopuler->id}}">
                    <img width="100%" src="{{url('public/cover')}}/{{$dpopuler->cover}}"/>
                        </a>
                    
         </div>
            </div>
        </div>
        </div>
        </div>
            
            
            
            
            
        </div>
    </div>
</div>
@endsection
