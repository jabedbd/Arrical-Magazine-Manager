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
                <div class="panel-heading">Add New Issue</div>
             
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
                <div class="panel-body">
                       
                        
                          <div class="form-group">
  <label>Issue Name:</label>
  <input type="text" class="form-control" id="issue" name="issue" required>
</div>
                                                   <div class="form-group">
  <label>Cover Page:</label>
  <input type="file" class="form-control" id="cover" name="cover">
                                                       <script>
$(document).on('ready', function() {
    $("#cover").fileinput({showCaption: false, showUpload: false});
});
</script>
</div>
                    
                       <div class="form-group">
  <label>Issue (PDF):</label>
    <input type="file" class="form-control" id="file" name="file">
                                                       <script>
$(document).on('ready', function() {
    $("#file").fileinput({showCaption: false, showUpload: false});
});
</script>
                            </div>     
                    
                     <div class="form-group">
                        <label>Description:</label> 
                         <textarea id="des" name="des" ></textarea>
                    </div>
                    
                     <div class="form-group">
                         <label>Tags (For SEO):</label></br>
  <input type="text" class="form-control" id="tags" name="tags" data-role="tagsinput">
                         
</div>

                        
                    </div>
     <div class="panel-footer settings">
        <button type="submit" class="btn btn-primary settings">Add Issue</button>
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
