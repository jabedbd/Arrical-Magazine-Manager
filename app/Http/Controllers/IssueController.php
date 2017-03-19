<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Mail;
class IssueController extends Controller
{
    
    public function index(){
        $settings = DB::table('settings')->where('id',1)->first();
        $all = DB::table('issues')->where('status',1)->orderBy('publish_date', $settings->all_issue_order)->paginate($settings->all_issue);
        
        return view('allissue', compact('all','settings'));
    }
    
    
    public function view($id){
        $issue = DB::table('issues')->where('id',$id)->where('status',1)->first();
        DB::table('issues')->where('id',$id)->where('status',1)->increment('view');
        return view('view', compact('issue'));
    }
    
       public function contact(){
        
        $setting = DB::table('settings')->where('id',1)->first();
        return view('contact', compact('setting'));
    }
    
    public function about(){
       $about =  DB::table('static')->where('id',1)->first();
        
        return view('about', compact('about'));
    }
    
      public function downlaod($id){
        
          $issue = DB::table('issues')->where('id',$id)->where('status',1)->first();
          DB::table('issues')->where('id',$id)->where('status',1)->increment('download');
          
          $url = 'download.php?file=public/web/'.$issue->file;
        
        return redirect($url);
    }
    
    
     public function SendMail(Request $request){
        $data = $request->only('name', 'email');
        $data['messageLines'] = explode("\n", $request->message);

    Mail::send('contact', $data, function ($message) use ($data) {
       $settings = DB::table('settings')->where('id',1)->first();
      $message->subject('Contact From: '.$data['name'])
              ->from($data['email'], $data['name'])
              ->to($settings->email)
              ->replyTo($data['email']);
    });

$request->session()->put('show_success', 'Thank you!');
        return back();
    }
    
        public function search(Request $request){
        $search = $request->search;
        $all = DB::table('issues')->where('issue','like', '%'.$search.'%')->paginate(10);
        $result  = count($all);
        return view('result', compact('all','result'));
    }
    
    
  
}