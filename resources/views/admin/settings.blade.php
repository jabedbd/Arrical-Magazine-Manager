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
                <div class="panel-heading">Settings</div>
<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">General</a></li>
                             <li><a href="#issue" data-toggle="tab">Issue Settings</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Social Settings</a></li>
                            
                        </ul>
                </div>
    <form action="" method="post">
        {{ csrf_field() }}
                <div class="panel-body">
                    <div class="tab-content">
                       
                        <div class="tab-pane fade in active" id="tab1primary">
                        
                          <div class="form-group">
  <label>Magazine Name:</label>
  <input type="text" class="form-control" id="site" name="site" value="{{$settings->magazine}}">
</div>
                    
                       <div class="form-group">
  <label>Address:</label>
  <input type="text" class="form-control" id="address" name="address" value="{{$settings->address}}">
</div>
                                        <div class="form-group">
  <label>Contact Email:</label>
  <input type="text" class="form-control" id="email" name="email" value="{{$settings->email}}">
</div>
                                  <div class="form-group">
  <label>Contact Number:</label>
  <input type="text" class="form-control" id="number" name="number" value="{{$settings->mobile}}">
</div>
                            
                        
                        
                        </div>
                        
                        <div class="tab-pane fade" id="issue">
                        
                          <div class="form-group">
  <label>Home Page Old Issue Limit:</label>
  <input type="text" class="form-control" id="old_issue" name="old_issue" value="{{$settings->old_issue}}">
</div>
                    
                       <div class="form-group">
  <label>Home Page Old Issue Order:</label>
     <select class="form-control" id="old_issue_type" name="old_issue_type">
    <option value="0" @if($settings->old_issue_type == 0) selected @endif>Random</option>
    <option value="1" @if($settings->old_issue_type == 1) selected @endif>Recent</option>
  </select>
</div>
                             <div class="form-group">
  <label>Old Issue in a Row:</label>
    <input type="text" class="form-control" id="old_item" name="old_item" value="{{$settings->old_item}}">

</div>
                                        <div class="form-group">
  <label>All Issue Pagination:</label>
  <input type="text" class="form-control" id="all_issue" name="all_issue" value="{{$settings->all_issue}}">
</div>
                                  <div class="form-group">
  <label>All Issue Order:</label>
   <select class="form-control" id="all_issue_order" name="all_issue_order">
    <option value="desc"  @if($settings->all_issue_order == 'desc') selected @endif>Descending</option>
    <option value="asc" @if($settings->all_issue_order == 'asc') selected @endif>Ascending</option>
  </select>
</div>
                            <div class="form-group">
  <label>Item in a Row:</label>
   <select class="form-control" id="item" name="item">
    <option value="5"  @if($settings->item == '5') selected @endif>2 Items</option>
    <option value="4" @if($settings->item == '4') selected @endif>3 Items</option>
    <option value="3" @if($settings->item == '3') selected @endif>4 Items</option>
    <option value="2" @if($settings->item == '2') selected @endif>5 Items</option>
  </select>
</div>
                            
                        
                        
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                        
                         <div class="form-group">
  <label>Facebook URL:</label>
  <input type="text" class="form-control" id="fb" name="fb" value="{{$settings->fb}}">
</div>
                             <div class="form-group">
  <label>Twitter URL:</label>
  <input type="text" class="form-control" id="tw" name="tw" value="{{$settings->tw}}">
</div>
                            
                             <div class="form-group">
  <label>G+ URL:</label>
  <input type="text" class="form-control" id="gplus" name="gplus" value="{{$settings->gplus}}">
</div>
                             <label>Pinterest URL:</label>
  <input type="text" class="form-control" id="pin" name="pin" value="{{$settings->pin}}">
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
