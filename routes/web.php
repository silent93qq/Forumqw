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

    return view('forum',compact('threads'));
});
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_profile');

Route::post('/changepassword', function (Request $request)
    {
        return view('changepassword', array('user' => Auth::user()));
});

Auth::routes();

Route::get('/changepassword',function (){
   return view('auth.change_password');
});

Route::post('change/password',function () {
    $User = User::find(Auth::user()->id);
    if (Hash::check(Input::get('passwordold'), $User['password']) && Input::get('password') == Input::get('password_confirmation')){

    $User->password = bcrypt(Input::get('password'));
    $User->save();
    return back()->with('success', 'Password Changed');
}
else{
    return back()->with('error','Password not Changed');
}

});


Route::resource('/thread','ThreadController');

Route::resource('comment','CommentController',['only'=>['update']]);

Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');

Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');

Route::get('/thread/{id}', ['as' => 'thread.show', 'uses' => 'ThreadController@show']);


Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('Notification)','ThreadController@Notification')->name('Notification');

//Route::get('/home', 'HomeController@index')->name('home');
