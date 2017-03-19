@extends('layouts.app')

@section('content')
<div class="container-full">
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">About Us</div>

                <div class="panel-body">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 about-bg">
              
              {!!$about->content!!}
                                   
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
