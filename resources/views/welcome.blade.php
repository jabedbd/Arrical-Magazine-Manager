@extends('layouts.app')

@section('content')
<div class="container-full">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Latest Issue</div>

                <div class="panel-body">
                   
                       <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="letest-cover">
                            <a href="view/issue/{{$latest->id}}">
                       <img width="100%" src="{{url('public/cover/')}}/{{$latest->cover}}" />
                       </a>
                       </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Old Issues</div>

                <div class="panel-body">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 old-bg">
                      <div id="old-issue" class="owl-demo">
                 @foreach($old as $ol)
                <div class="item">
                    <a href="view/issue/{{$ol->id}}">
                  <img width="100%" src="{{url('public/cover')}}/{{$ol->cover}}" alt="{{$ol->issue}}"></a>
                   <a href="view/issue/{{$latest->id}}" class="btn btn-primary btn-block" >{{$ol->issue}}</a>
                </div>
                          @endforeach
          

              </div>

                                         
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
