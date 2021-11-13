<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialSettingsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutSettingController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageSettingController;
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
// Frontend
Route::get('/',[FrontendController::class, 'index'])->name('home');
Route::get('/single-news/{id}',[FrontendController::class, 'singleBlog'])->name('singleBlog');
Route::get('/news',[FrontendController::class, 'blog'])->name('blog');
Route::get('/about',[FrontendController::class, 'about'])->name('about');
Route::get('/flag',[FrontendController::class, 'flag'])->name('flag');
Route::get('/gerb',[FrontendController::class, 'gerb'])->name('gerb');
Route::get('/madhiya',[FrontendController::class, 'madhiya'])->name('madhiya');
Route::get('/image-gallery',[FrontendController::class, 'image'])->name('image');
Route::get('/contact',[FrontendController::class, 'contact'])->name('contact');
// Contact with admin
Route::post('/contact-admin', [FrontendController::class, 'contactAdmin'])->name('contactAdmin');
//Language
Route::get('/lang/{lang}', [PagesController::class, 'lang'])->name('lang');
// Admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resources([
        'categories' => CategoryController::class,
        'blogs' => BlogController::class,
        'links'=> LinkController::class,
        'results'=> ResultController::class,
        'sliders'=> SliderController::class,
        'images'=> ImageController::class,
        'settings'=> SettingController::class,
        'social'=>SocialSettingsController::class,
        'about'=>AboutSettingController::class,
        'contact'=>ContactController::class,
        'page'=>PageSettingController::class,
    ]);
    // Active and inactive
    Route::post('/activation-blog/{id}', [PagesController::class, 'activation'])->name('activation');
    Route::post('/activation-links/{id}', [PagesController::class, 'linkActivation'])->name('linkActive');
    Route::post('/activation-results/{id}', [PagesController::class, 'resultActivation'])->name('resultActive');
    Route::post('/activation-sliders/{id}', [PagesController::class, 'sliderActivation'])->name('sliderActive');
    Route::post('/activation-images/{id}', [PagesController::class, 'imageActivation'])->name('imageActive');
    Route::post('/activation-social/{id}', [PagesController::class, 'socialActivation'])->name('socialActive');
});


Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
