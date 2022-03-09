<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\aboutuscontroller;
use App\Http\Controllers\frontend\accomodationcontroller;
use App\Http\Controllers\frontend\blogcontroller;

use App\Http\Controllers\backend\Contactcontroller;
use App\Http\Controllers\frontend\elementscontroller;
use App\Http\Controllers\frontend\gallerycontroller;
use App\Http\Controllers\frontend\homecontroller;
use App\Http\Controllers\backend\AccomodationController as accomodation;
use App\Http\Controllers\backend\ExampleController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\frontend\contactcontroller as FrontendContactcontroller;

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


Route::get('/', [homecontroller::class,'index']);
Route::get('/aboutus', [aboutuscontroller::class,'index']);
Route::get('/accomodation', [accomodationcontroller::class,'index']);
Route::get('/contact', [FrontendContactcontroller::class,'index']);
Route::get('/blog', [blogcontroller::class,'index']);
Route::get('/elements', [elementscontroller::class,'index']);
Route::get('/gallery', [gallerycontroller::class,'index']);
Route::get('/blogSingle', [blogcontroller::class,'blogSingle']);
Route::get('/accomodation/create',[accomodation::class,'create']);
Route::post('/accomodation/store',[accomodation::class,'store']);

Route::middleware('auth')->group(function () {
    Route::get('/examples/index',[ExampleController::class,'index']);
    Route::get('/examples/create',[ExampleController::class,'create'])->name('examples.create');
    Route::post('/examples/store',[ExampleController::class,'store'])->name('examples.store');
    Route::delete('/examples/{id}',[ExampleController::class,'destroy'])->name('examples.destroy');
    Route::put('/examples/{id}',[ExampleController::class,'update'])->name('examples.update');
    Route::get('/examples/{id}',[ExampleController::class,'edit'])->name('examples.edit');
    
    Route::get('/about/index',[AboutController::class,'index']);
    Route::get('/about/create',[AboutController::class,'create'])->name('about.create');
    Route::post('/about/store',[AboutController::class,'store'])->name('about.store');
    Route::delete('/about/{id}',[AboutController::class,'destroy'])->name('about.destroy');
    Route::put('/about/{id}',[AboutController::class,'update'])->name('about.update');
    Route::get('/about/{id}',[AboutController::class,'edit'])->name('about.edit'); 

    Route::get('/contact/index',[ContactController::class,'index']);
    Route::get('/contact/create',[ContactController::class,'create'])->name('contact.create');
    Route::delete('/contact/{id}',[ContactController::class,'destroy'])->name('contact.destroy');
    Route::put('/contact/{id}',[ContactController::class,'update'])->name('contact.update');
    Route::get('/contact/{id}',[ContactController::class,'edit'])->name('contact.edit'); 
});


Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');