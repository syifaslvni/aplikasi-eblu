<?php

use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubJasaController;
//use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\JenisJasaController;
use App\Http\Controllers\Admin\SubSubJasaController;
// use App\Http\Controllers\Frontend\SubJasaController as FrontendSubJasaController;
// use App\Http\Controllers\Frontend\JenisJasaController as FrontendJenisJasaController;
// use App\Http\Controllers\Frontend\SubSubJasaController as FrontendSubSubJasaController;
use App\Http\Controllers\Frontend\ProductJasaController as FrontendProductJasaController;
use App\Http\Controllers\Frontend\VisitorJasaController as FrontendVisitorJasaController;
use App\Http\Controllers\Frontend\PostJasaController as FrontendPostJasaController;

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
    return view('welcome');
});

//home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/post/{slug}', [HomeController::class, 'showPostDetail'])->name('home.post.detail');
Route::get('/categories', [HomeController::class, 'showCategories'])->name('home.categories');
Route::get('/categories/{slug}', [HomeController::class, 'showPostByCategory'])->name('home.posts.categories');

//visitor
// Route::post('/welcome', [VisitorController::class, 'create'])->name('visitors.create');

//frontend
// Route::get('/jenisjasas', [FrontendJenisJasaController::class, 'index'])->name('jenisjasas.index');
// Route::get('/jenisjasas/{jenisjasa}', [FrontendJenisJasaController::class, 'show'])->name('jenisjasas.show');

// Route::get('/subjasas', [FrontendSubJasaController::class, 'index'])->name('subjasas.index');
// Route::get('/subjasas/{subjasa}', [FrontendJenisJasaController::class, 'show'])->name('subjasas.show');

// Route::get('/subsubjasas', [FrontendSubSubJasaController::class, 'index'])->name('subsubjasas.index');
// Route::get('/subsubjasas/{subsubjasa}', [FrontendJenisJasaController::class, 'show'])->name('subsubjasas.show');

// Route::get('/products', [FrontendProductJasaController::class, 'index'])->name('products.index');
// Route::get('/products/{product}', [FrontendProductJasaController::class, 'show'])->name('products.show');

// Route::get('/welcome', [FrontendVisitorJasaController::class, 'welcome'])->name('visitors.store.visitor');
// Route::get('/home', [FrontendVisitorJasaController::class, 'home'])->name('visitors.home');




Auth::routes([
    'register' => false
]);

Route::prefix('dashboard')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        //dashboard
        Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

        //jenis jasa
        Route::get('/jenisjasa/select', [JenisJasaController::class, 'select'])->name('jenisjasa.select');
        Route::resource('/jenisjasa', JenisJasaController::class);

        //sub jasa
        Route::get('/subjasa/select', [SubJasaController::class, 'select'])->name('subjasa.select');
        Route::resource('/subjasa', SubJasaController::class);

        //subsub jasa
        Route::get('/subsubjasa/select', [SubSubJasaController::class, 'select'])->name('subsubjasa.select');
        Route::resource('/subsubjasa', SubSubJasaController::class);

        //categories
        Route::get('/categories/select', [CategoryController::class, 'select'])->name('categories.select');
        Route::resource('/categories', CategoryController::class);

        //post
        Route::get('/posts/select', [PostController::class, 'select'])->name('posts.select');
        Route::resource('/posts', PostController::class);

        // product
        Route::resource('/products', ProductController::class);

        //visitor
        Route::resource('/visitors', VisitorController::class);


        //file manager
        Route::group(['prefix' => 'filemanager'], function () {
            Route::get('/index', 
            [FileManagerController::class, 'index'])
            ->name('filemanager.index');
            Lfm::routes();
        });


});