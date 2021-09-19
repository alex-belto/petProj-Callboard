<?php


use Illuminate\Support\Facades\Route;

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
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


use App\Http\Controllers\PostsController;

    Route::get('/', [PostsController::class, 'showPosts']);
    Route::match(['GET', 'POST'], '/post/edit/{id}/', [PostsController::class, 'edit']);
    Route::get('/post/delete/{id}', [PostsController::class, 'delPost']);
    Route::get('/category/{id}', [PostsController::class, 'showCategory']);
    Route::get('/subcategory/{id}/', [PostsController::class, 'showSubcategory']);
    Route::post('/subcategory/{id}/', [PostsController::class, 'addPost']) -> middleware('auth');

    //admin
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
    Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function(){

        Route::get('/', [AdminPostController::class, 'show']); //show posts
        Route::get('/post/delete/{id}', [AdminPostController::class, 'delPost']);
        Route::match(['GET', 'POST'], '/post/{id}', [AdminPostController::class, 'edit']); //post edit
        Route::get('/users/', [AdminUserController::class, 'show']); //show users
        Route::match(['GET', 'POST'], '/user/{id}', [AdminUserController::class, 'edit']); //user profile edit
        Route::get('/users/role_del/{role_id}/{user_id}/', [AdminUserController::class, 'delRole']); //delete
        Route::match(['GET', 'POST'], '/users/role_add/{user_id}/', [AdminUserController::class, 'addRole']);
    });
