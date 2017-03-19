<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = DB::table('issues')->where('status',1)->get();
        $total = count($issues);
        $download = DB::table('issues')->where('status',1)->pluck('download');
        $downloads = array_sum($download);
        $view = DB::table('issues')->where('status',1)->pluck('view');
        $views = array_sum($view);
        $hdl = max($download);
        $hview = max($view);
        $populer = DB::table('issues')->where('status',1)->orderBy('publish_date', 'desc')->first();
        $vpopuler = DB::table('issues')->where('view',$hview)->first();
        $dpopuler = DB::table('issues')->where('download',$hdl)->first();
        return view('admin.index',compact('total','downloads','views','populer','vpopuler','dpopuler'));
    }
    
    
    public function settings()
    {
        $settings = DB::table('settings')->where('id', 1)->first();
        return view('admin.settings', compact('settings'));
    }
    
    
    public function UpdateSettings(Request $request)
    {
        $name = $request->site;
        $address = $request->address;
        $email = $request->email;
        $mobile = $request->number;
        $fb = $request->fb;
        $tw = $request->tw;
        $gplus = $request->gplus;
        $pin = $request->pin;
        $old = $request->old_issue;
        $old_type = $request->old_issue_type;
        $all_issue = $request->all_issue;
        $all_order = $request->all_issue_order;
        $item = $request->item;
         $old_item = $request->old_item;
        DB::table('settings')->where('id',1)->update([
           'magazine' => $name,
            'address' => $address,
            'email' => $email,
            'mobile' => $mobile,
            'fb'   => $fb,
            'tw'   => $tw,
            'gplus' => $gplus,
            'pin' => $pin,
            'all_issue' => $all_issue,
            'all_issue_order' => $all_order,
            'old_issue' => $old,
            'old_issue_type' => $old_type,
            'item'  => $item,
            'old_item' => $old_item
            
        ]);
        $request->session()->put('show_success', 'Settings Updated!');
        return redirect('settings');
    }
    
    
     public function StaticPage()
    {
         $about = DB::table('static')->where('id',1)->first();
        return view('admin.static', compact('about'));
    }
    
      public function UpdatePage(Request $request)
    {
        $content = $request->content;
          DB::table('static')->where('id',1)->update([
             'content' => $content, 
          ]);
           $request->session()->put('show_success', 'Page Updated!');
        return redirect('static');
    }
    
     public function EditInfo()
    {
        return view('admin.info');
    }
    
      public function SaveInfo(Request $request)
    { 
        $username  = $request->username;
        $fullname = $request->fullname;
        $email   = $request->email;
        $password = $request->password;
        $cpass = $request->cpass;
        if(!empty($password)){
            if($password == $cpass){
                DB::table('users')->where('id',1)->update([
                   'name' => $username,
                    'fullname' => $fullname,
                    'password' =>  Hash::make($password),
                    'email'  => $email,
                ]);
              $request->session()->put('show_success', 'Password Updated!');  
            }
            else {
                
                $request->session()->put('show_error', 'Confirm Password not matched!'); 
            }
            
        }
          else {
              DB::table('users')->where('id',1)->update([
                   'name' => $username,
                    'fullname' => $fullname,
                    'email'  => $email,
                ]);
               $request->session()->put('show_success', 'Admin Info Updated!');  
          }
          
          
       
        return redirect('edit-info');
    }
    
     public function AddIssue()
    {
        
         return view('admin.add');
    }
    
     public function SaveIssue(Request $request)
    {
        $issue = $request->issue;
        $cover = $request->cover;
        $file = $request->file;
         $tags = $request->tags;
         $des = $request->des;
         if ($request->hasFile('cover')) {
             if ($request->hasFile('file')){
              if ($request->file('cover')->isValid()) {
                $coverext = $cover->extension();
                if($coverext == 'png' || $coverext == 'jpg' || $coverext == 'jpeg' || $coverext == 'bmp' ) {
                $fileext = $file->extension();
                $filename = time().'-'.mt_rand().'.'.$fileext;
                $path = 'public/web';
                $file->move($path, $filename);
                $covername = time().'-'.mt_rand().'.'.$coverext;
                $coverpath = 'public/cover';
                $cover->move($coverpath, $covername);
                if($fileext == 'pdf' || $fileext == 'PDF'){
                    DB::table('issues')->insert([
                       'issue' => $issue,
                        'tags' => $tags,
                        'des'  => $des,
                        'file' => $filename,
                        'cover' => $covername,
                        'status' => 1,
                        
                    ]);
                    
                   $request->session()->put('show_success', 'New Issue Added!');  
                }
                
                  else {
                      $request->session()->put('show_error', 'Magazine file is invalid!'); 
                  }
                }
                  else {
                     $request->session()->put('show_error', 'Cover Image is invalid!');  
                  }
                  
} 
           else {
               $request->session()->put('show_error', 'Cover Photo is not valid!'); 
           }
                 
             }
             else {
                 $request->session()->put('show_error', 'Magazine File Missing!'); 
             }

}
         else {
             $request->session()->put('show_error', 'Cover Page Missing!'); 
             
         }
         
        return redirect('issue/add');
    }
    
     public function AllIssue()
    {
         $issues = DB::table('issues')->where('status','!=',3)->get();
        return view('admin.all', compact('issues'));
    }
    
      public function EditIssue($id)
    {
        $issue = DB::table('issues')->where('status','!=',3)->where('id',$id)->first();
        return view('admin.edit', compact('issue'));
    }
    
     public function UpdateIssue(Request $request,$id)
    {
         $issue = $request->issue;
        $cover = $request->cover;
        $file = $request->file;
         $tags = $request->tags;
         $des = $request->des;
         if ($request->hasFile('cover')) {
              if ($request->file('cover')->isValid()) {
                $coverext = $cover->extension();
                $covername = time().'-'.mt_rand().'.'.$coverext;
                $coverpath = 'public/cover';
                $cover->move($coverpath, $covername);
               
                    DB::table('issues')->where('id',$id)->update([
                       'issue' => $issue,
                        'tags' => $tags,
                        'des'  => $des,
                        'cover' => $covername,
                        
                    ]);
                   
                }
              }
         else if($request->hasFile('file')){
             $fileext = $file->extension();
                $filename = time().'-'.mt_rand().'.'.$fileext;
                $filepath = 'public/web';
                $file->move($filepath, $filename);
              if($fileext == 'pdf' || $fileext == 'PDF'){
              DB::table('issues')->where('id',$id)->update([
                       'issue' => $issue,
                        'tags' => $tags,
                        'des'  => $des,
                        'file' => $filename,
                        
                    ]);
         }
         }
           else if($request->hasFile('file') && $request->hasFile('cover')){
                $coverext = $cover->extension();
                $covername = time().'-'.mt_rand().'.'.$coverext;
                $coverpath = 'public/cover';
                $cover->move($coverpath, $covername);
                $fileext = $file->extension();
                $filename = time().'-'.mt_rand().'.'.$fileext;
                $filepath = 'public/web';
                $file->move($filepath, $filename);
              if($fileext == 'pdf' || $fileext == 'PDF'){
              DB::table('issues')->where('id',$id)->update([
                       'issue' => $issue,
                        'tags' => $tags,
                        'des'  => $des,
                        'file' => $filename,
                        'cover' => $covername,
                        
                        
                    ]);
         }
         }
         else {
             
              DB::table('issues')->where('id',$id)->update([
                       'issue' => $issue,
                        'tags' => $tags,
                        'des'  => $des,
                        
                    ]);
             
         }
         
         
         $request->session()->put('show_success', 'Issue Updated!');  
         
        return redirect('issue/all');
    }
    
      public function ChangeStatus($action,$id,Request $request)
    {
          if($action == 'publish'){
              
              DB::table('issues')->where('id',$id)->update([
                 'status' => 1, 
              ]);
              $request->session()->put('show_success', 'Issue Published!'); 
          }
          
           else if($action == 'unpublish'){
              
              DB::table('issues')->where('id',$id)->update([
                 'status' => 0, 
              ]);
                $request->session()->put('show_success', 'Issue Unpublished!'); 
          }
          
          else if($action == 'remove'){
              
              DB::table('issues')->where('id',$id)->update([
                 'status' => 3 
              ]);
                $request->session()->put('show_success', 'Issue Removed!'); 
          }
          
          else {
             $request->session()->put('show_error', 'Invalid Request!'.$action); 
          }
        return redirect('issue/all');
    }
    
    
    public function UpdateNote($action){
       if($action == 'off'){
           DB::table('settings')->where('id',1)->update([
              'update_notefication' => 0 
           ]);
       } 
        
         if($action == 'on'){
           DB::table('settings')->where('id',1)->update([
              'update_notefication' => 1 
           ]);
       }
        
        return redirect('admin');
    
    }
    
}
