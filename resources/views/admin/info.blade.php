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
                <div class="panel-heading">Edit Admin Info</div>
<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">General Info</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Change Password</a></li>
                            
                        </ul>
                </div>
    <form action="" method="post">
        {{ csrf_field() }}
                <div class="panel-body">
                    <div class="tab-content">
                       
                        <div class="tab-pane fade in active" id="tab1primary">
                        
                          <div class="form-group">
  <label>Username:</label>
  <input type="text" class="form-control" id="username" name="username" value="{{Auth::user()->name}}">
</div>
                                                   <div class="form-group">
  <label>Full Name:</label>
  <input type="text" class="form-control" id="fullname" name="fullname" value="{{Auth::user()->fullname}}">
</div>
                    
                       <div class="form-group">
  <label>Email:</label>
  <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                            </div>     
                        
                        
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                        
                         <div class="form-group">
  <label>New Password:</label>
  <input type="password" class="form-control" id="password" name="password">
</div>
                             <div class="form-group">
  <label>Confirm Password:</label>
  <input type="password" class="form-control" id="cpass" name="cpass">
</div>
                            
                        
                        
                        
                        </div>
                        
                    </div>
     <div class="panel-footer settings">
        <button type="submit" class="btn btn-primary settings">Save Settings</button>
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
