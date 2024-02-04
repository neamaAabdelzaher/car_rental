<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\BlogController;
use App\Http\Controllers\website\MainController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\dashboard\CarsController;
use App\Http\Controllers\dashboard\UsersController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\CommentsController;
use App\Http\Controllers\dashboard\MessagesController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\website\CarsListingController;
use App\Http\Controllers\dashboard\CategoriesController;
use App\Http\Controllers\dashboard\TestimonialsController;
use App\Http\Controllers\website\ShowTestimonialsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!s
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::group(['prefix' => 'dashboard', 'as' => 'dashboard','middleware'=>['verified','dashboardMiddleware']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('.index');
    Route::group(['prefix' => 'users', 'as' => '.users.'], function () {

        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/store', [UsersController::class, 'store'])->name('store');
        Route::get('/edit/{user_id}', [UsersController::class, 'edit'])->name('edit');
        Route::put('/update/{user_id}', [UsersController::class, 'update'])->name('update');



    });
    Route::group(['prefix' => 'categories', 'as' => '.categories.'], function () {

        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{category_id}', [CategoriesController::class, 'edit'])->name('edit');
        Route::put('/update/{category_id}', [CategoriesController::class, 'update'])->name('update');
        Route::get('/delete/{category_id}', [CategoriesController::class, 'destroy'])->name('delete');


    });
    Route::group(['prefix' => 'cars', 'as' => '.cars.'], function () {

        Route::get('/', [CarsController::class, 'index'])->name('index');
        Route::get('/create', [CarsController::class, 'create'])->name('create');
        Route::post('/store', [CarsController::class, 'store'])->name('store');
        Route::get('/edit/{car_id}', [CarsController::class, 'edit'])->name('edit');
        Route::put('/update/{car_id}', [CarsController::class, 'update'])->name('update');
        Route::get('/delete/{car_id}', [CarsController::class, 'destroy'])->name('delete');


    });
    Route::group(['prefix' => 'testimonials', 'as' => '.testimonials.'], function () {

        Route::get('/', [TestimonialsController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialsController::class, 'create'])->name('create');
        Route::post('/store', [TestimonialsController::class, 'store'])->name('store');
        Route::get('/edit/{testimonial_id}', [TestimonialsController::class, 'edit'])->name('edit');
        Route::put('/update/{testimonial_id}', [TestimonialsController::class, 'update'])->name('update');
        Route::get('/delete/{testimonial_id}', [TestimonialsController::class, 'destroy'])->name('delete');

    });
    Route::group(['prefix' => 'messages', 'as' => '.messages.'], function () {
        Route::get('/', [MessagesController::class, 'index'])->name('index');
        Route::get('/show/{message_id}', [MessagesController::class, 'show'])->name('show');
        Route::get('/delete/{message_id}', [MessagesController::class, 'destroy'])->name('delete');
        Route::get('/mark-as-read', [MessagesController::class, 'markAsRead'])->name('markAsRead');


    });
    

});

/* website route*/ 
Route::group(['prefix' => 'car_rental', 'as' => 'website'], function () {
    Route::get('/', [MainController::class, 'index'])->name('.index');
    Route::group(['prefix' => 'listing', 'as' => '.listing.'], function () {
    Route::get('/', [CarsListingController::class, 'index'])->name('index');
    Route::get('/show/{car_id}', [CarsListingController::class, 'show'])->name('show');

    });
    Route::group(['prefix' => 'testimonials', 'as' => '.testimonials.'], function () {
    Route::get('/', [ShowTestimonialsController::class, 'index'])->name('index');

    });
    Route::group(['prefix' => 'blog', 'as' => '.blog.'], function () {
        Route::get('/', BlogController::class)->name('blog');

    });
    Route::group(['prefix' => 'about', 'as' => '.about.'], function () {
        Route::get('/', AboutController::class)->name('about');

    });
    Route::group(['prefix' => 'messages', 'as' => '.messages.'], function () {
        Route::get('/', ContactController::class)->name('index');
        Route::post('/send', [MessagesController::class, 'store'])->name('store');

    });
    Route::group(['prefix' => 'comments', 'as' => '.comments.'], function () {
        Route::get('/', [CommentsController::class, 'index'])->name('index');
        Route::post('store', [CommentsController::class, 'store'])->name('store');
        Route::post('reply', [CommentsController::class, 'reply'])->name('reply');
 


    });

});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\website\MainController::class, 'index'])->name('main');

