@extends('layouts.admin')

@section('content')
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
<div class="container">
    <div class="row">
         <div class="col-md-2">
        </div>
        <div class="col-md-10">
        
            <div class="panel panel-default">
                <div class="panel-heading">All Issues</div>

                <div class="panel-body">
                    <script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>
                  <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Issue</th>
                <th>Cover</th>
                <th>Published Date</th>
                <th>Statistics</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Issue</th>
                <th>Cover</th>
                <th>Published Date</th>
                <th>Statistics</th>
                <th>Action</th>
                <th>Status</th>
                
            </tr>
        </tfoot>
        <tbody>
            @foreach($issues as $is)
            <tr>
                <td>{{$is->issue}}</td>
                <td><img width="100px" src="{{url('public/cover')}}/{{$is->cover}}"</td>
                <td>{{date("d M Y", strtotime($is->publish_date))}}</td>
                <td>Downloaded: {{$is->download}} </br> Viewed: {{$is->view}}</td>
                <td><a href="{{url('issue/edit')}}/{{$is->id}}" class="btn btn-primary btn-sm">
      <span class="glyphicon glyphicon-pencil"></span> Edit 
    </a> <a href="{{url('issue/remove')}}/{{$is->id}}" class="btn btn-danger btn-sm">
      <span class="glyphicon glyphicon-trash"></span>Remove
    </a> </td>
                <td>@if($is->status == 0)<a href="{{url('issue/publish')}}/{{$is->id}}" class="btn btn-danger btn-sm">
      <span class="glyphicon glyphicon-remove"></span> Unpublished 
    </a> @else <a href="{{url('issue/unpublish')}}/{{$is->id}}" class="btn btn-success btn-sm">
      <span class="glyphicon glyphicon-ok"></span> Published 
    </a> @endif</td>
            
            </tr>
            @endforeach
            </tbody>
    </table>
         

                        
                    </div>
    
                </div>
            </div>
        </div>
	</div>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
