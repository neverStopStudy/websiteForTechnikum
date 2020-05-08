<?php

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

//Route::get('/', function () {
//    return view('welcome')->name('welcome');
//});


//Route::group(['middleware' => 'role:project-manager'], function() {
//    Route::get('/dashboard', function() {
//        return 'Добро пожаловать, Менеджер проекта';
//    });
//});
use App\User;

// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('mail', function () {
//    $user = Auth::user();
//    dd(auth()->user()->hasRole('admin'));
//    dd(User::with('roles')->where('roles','admin')->get());

//    dd(User::with('roles')->where('roles','admin')->get());
//    $user->notify(new App\Notifications\NewUser($user));
//    dd(auth()->user()->unreadNotifications);

    return view('welcome')->name('welcome');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['group' => 'admin', 'middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        Route::get('/', 'ArticlesController@welcome')->name('welcome');
        Route::get('/articles', 'ArticlesController@index')->name('admin.article.index');
        Route::get('/article/create', 'ArticlesController@create')->name('admin.article.create');
        Route::post('/article/store', 'ArticlesController@store')->name('admin.article.store');
        Route::get('/article/{id}/show', 'ArticlesController@show')->name('admin.article.show');
        Route::get('/article/{id}/edit', 'ArticlesController@edit')->name('admin.article.edit');
        Route::put('/article/{id}/update', 'ArticlesController@update')->name('admin.article.update');
        Route::get('/article/{id}/delete', 'ArticlesController@destroy')->name('admin.article.destroy');

        Route::get('/users', 'UsersController@index')->name('admin.users.index');
        Route::get('/user/create', 'UsersController@create')->name('admin.user.create');
        Route::post('/user/store', 'UsersController@store')->name('admin.user.store');
        Route::get('/user/{id}/show', 'UsersController@show')->name('admin.user.show');
        Route::get('/user/{id}/edit', 'UsersController@edit')->name('admin.user.edit');
        Route::put('/user/{id}/update', 'UsersController@update')->name('admin.user.update');
        Route::get('/user/{id}/delete', 'UsersController@destroy')->name('admin.user.destroy');
        
        Route::resource('role', 'RolesController');
        
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
    
        Route::resource('group', 'GroupsController');
        Route::get('group/{group}/user/{user}/delete', 'GroupsController@deleteUserFromGroup')->name('group.delete.user');     
    
        Route::resource('subject', 'SubjectsController');
        
        Route::group(['group' => 'material','prefix'=> 'material','namespace'=> 'Admin'], function (){
            Route::get('/', 'MaterialsController@index')->name('admin.material.index');
            Route::get('/create', 'MaterialsController@create')->name('admin.material.create');
            Route::post('/store', 'MaterialsController@store')->name('admin.material.store');
            Route::get('/{id}/show', 'MaterialsController@show')->name('admin.material.show');
            Route::get('/{id}/edit', 'MaterialsController@edit')->name('admin.material.edit');
            Route::put('/{id}/update', 'MaterialsController@update')->name('admin.material.update');
            Route::get('/{id}/delete', 'MaterialsController@destroy')->name('admin.material.destroy');
        });
              
    });
    Route::group(['group' => 'teacher', 'middleware' => 'role:teacher', 'prefix' => 'teacher','namespace'=> 'Teacher'], function () {  
        Route::get('/ownmaterials','MaterialsController@ownmaterials')->name('teacher.material.ownmaterial');
        Route::get('/', 'MaterialsController@index')->name('teacher.material.index');
        Route::get('/create', 'MaterialsController@create')->name('teacher.material.create');
        Route::post('/store', 'MaterialsController@store')->name('teacher.material.store');
        Route::get('/{id}/show', 'MaterialsController@show')->name('teacher.material.show');
        Route::get('/{id}/edit', 'MaterialsController@edit')->name('teacher.material.edit');
        Route::put('/{id}/update', 'MaterialsController@update')->name('teacher.material.update');
        Route::get('/{id}/delete', 'MaterialsController@destroy')->name('teacher.material.destroy');
    });   
});
    


Route::get('download/{path}', 'DownloadFilesController@download')->name('download');

Route::post('/user/store', 'UsersController@store')->name('admin.user.store');
Route::get('/user/{id}/show', 'UsersController@show')->name('admin.user.show');
Route::get('/user/{id}/edit', 'UsersController@edit')->name('user.edit');
Route::put('/user/{id}/update', 'UsersController@update')->name('admin.user.update');
Route::post('/comment/store', 'CommentsController@store')->name('comment.store')->middleware('auth');

Route::get('/', 'ArticlesController@welcome')->name('user.article.index');
Route::get('/article/create', 'ArticlesController@create')->name('user.article.create');
Route::post('/article/store', 'ArticlesController@store')->name('user.article.store');
Route::get('/article/{id}/show', 'ArticlesController@show')->name('user.article.show');
Route::get('/article/{id}/edit', 'ArticlesController@edit')->name('user.article.edit');
Route::put('/article/{id}/update', 'ArticlesController@update')->name('user.article.update');
Route::get('/article/{id}/delete', 'ArticlesController@destroy')->name('user.article.destroy');

Auth::routes();



