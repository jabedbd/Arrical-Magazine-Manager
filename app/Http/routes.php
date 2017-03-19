<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $settings = DB::table('settings')->where('id',1)->first();
    $latest = DB::table('issues')->where('status',1)->orderBy('publish_date', 'desc')->first();
    if($settings->old_issue_type == 0){
        $old = DB::table('issues')->where('status',1)->where('id','!=',$latest->id)->inRandomOrder()->limit($settings->old_issue)->get();
    }
    else {
        $old = DB::table('issues')->where('status',1)->where('id','!=',$latest->id)->orderBy('publish_date', 'desc')->limit($settings->old_issue)->get();
    }
    
    return view('welcome', compact('latest','old','settings'));
});

Route::auth();

Route::get('/admin', 'HomeController@index');
Route::get('/issues', 'IssueController@index');
Route::get('/view/issue/{id}', 'IssueController@view');
Route::get('/download/issue/{id}', 'IssueController@downlaod');
Route::post('contact-us', 'IssueController@SendMail');
Route::post('search', 'IssueController@search');
Route::get('/about-us', 'IssueController@about');
Route::get('/contact-us', 'IssueController@contact');
Route::get('/settings', 'HomeController@settings');
Route::post('/settings', 'HomeController@UpdateSettings');
Route::get('/static', 'HomeController@StaticPage');
Route::post('/static', 'HomeController@UpdatePage');
Route::get('/edit-info', 'HomeController@EditInfo');
Route::post('/edit-info', 'HomeController@SaveInfo');
Route::get('/issue/add', 'HomeController@AddIssue');
Route::post('/issue/add', 'HomeController@SaveIssue');
Route::get('/issue/all', 'HomeController@AllIssue');
Route::get('/issue/edit/{id}', 'HomeController@EditIssue');
Route::post('/issue/edit/{id}', 'HomeController@UpdateIssue');
Route::get('/issue/{action}/{id}', 'HomeController@ChangeStatus');

Route::get('/update/{action}', 'HomeController@UpdateNote');

