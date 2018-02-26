<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input as input;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $threads=App\Thread::paginate(15);
    $notifs=App\NotificationMail::paginate(15);
    return view('forum',compact('threads'),compact('notifs'));
});

Auth::routes();

Route::get('/profile', 'UserController@index')->name('profile');
Route::post('/profile', 'UserController@UpdateProfile');


Route::get('/changepassword','ProfileController@index');
Route::post('change/password','ProfileController@ResetPassword');


Route::resource('/thread','ThreadController');

Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');

Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');

Route::get('/thread/{id}', ['as' => 'thread.show', 'uses' => 'ThreadController@show']);

Route::post('/thread/notif/{thread}','NotificationMailController@store')->name('notific');