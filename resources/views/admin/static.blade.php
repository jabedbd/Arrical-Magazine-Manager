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
                <div class="panel-heading">Static Pages</div>
<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">About Us</a></li>
                            
                        </ul>
                </div>
    <form action="" method="post">
        {{ csrf_field() }}
                <div class="panel-body">
                    <div class="tab-content">
                       
                        <div class="tab-pane fade in active" id="tab1primary">
                        
 <textarea rows="15" name="content">{!!$about->content!!}</textarea>              
                        
                        
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                        
</div>
                        
                        
                        
                        
                        
                        </div>
                        
                    </div>
     <div class="panel-footer settings">
        <button type="submit" class="btn btn-primary settings">Save Page</button>
    </div>
        </form>
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
