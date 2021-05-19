<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;



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


Route::get('/login', function () {
    return view('login');
})->name('login');



Route::get('/register', function () {
    return view('register');
});

Route::get('/interface', [BlogController::class, 'writerinterface']);
Route::get('/', [BlogController::class, 'index']);
Route::get('/overview', [BlogController::class, 'index']);
Route::get('/overview/getblogpostbycategories', [Blogcontroller::class, 'getblogpostbycategories']);
Route::get('/blog/{id}', [BlogController::class,  'blogview']);
Route::get('Newslettermail', [BlogController::class, 'SendNewsletter'] );
Route::get('/newblog', [BlogController::class, 'indexnewblog']);

Route::post('/overview', [BlogController::class, 'store']);
Route::post('/overview/getblogpostbycategories', [Blogcontroller::class, 'getblogpostbycategories']);
Route::post('/blog', [BlogController::class,  'postcomment'])->middleware('auth');
Route::post('/blog/{id}/edit', [BlogController::class,  'editblog']);
Route::post('/test', [BlogController::class,  'UpdateBlog']);
Route::post('/blog/{id}', [BlogController::class,  'deleteblog']);

Auth::routes();


