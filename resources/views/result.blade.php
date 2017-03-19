@extends('layouts.app')

@section('content')
<div class="container-full">
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">All Issues</div>

                <div class="panel-body">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 old-bg ">
                        @if ($result > '0')
                        @foreach($all as $issue)
                <div class="col-md-4 top-buffer">
                    <a href="{{url('view/issue')}}/{{$issue->id}}">
      <img width="100%" src="{{url('public/cover')}}/{{$issue->cover}}" alt="{{$issue->issue}}">
                        </a>
                   <a href="{{url('view/issue')}}/{{$issue->id}}" class="btn btn-primary btn-block" >{{$issue->issue}}</a>
    </div>
                        @endforeach
   @else 
            Nothing Found!
                        @endif
                                 
                    </div>
                   
                           </div>
                    <div class="panel-footer page-bg">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 page-bg">
                     {{ $all->links() }} 
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
