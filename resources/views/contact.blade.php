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
              
<div class="col-md-8">
            <div class="well well-sm">
                <form action="" method="post">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 contact">
            <form>
            <?php 
                $set = DB::table('settings')->where('id',1)->first();
                ?>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                {{$set->address}} </br>
                <abbr title="Phone">
                   Phone:</abbr>
               {{$set->mobile}}
            </address>
            <address>
                <strong>Editor: {{Auth::user()->fullname}}</strong><br>
                <a href="mailto:{{$set->email}}">{{$set->email}}</a>
            </address>
            </form>
        </div>                                   
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
