<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager; //удалить если сломается Voyager
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Main;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AvatarController;
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

Route::get('/', [Main::class, 'Product'])->name('home');

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/catalog1', [ProductController::class, 'index']);
Route::get('/products/{id}', [Main::class, 'ProductId'])->name('product');
Route::post('/products/reviews', [Main::class, 'addReview'])->name('reviewsAdd');

//Корзина
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::post('/cart-order', [ProductController::class, 'cartOrder'])->name('cart.order');

Auth::routes();

//Личный кабинет
Route::get('/profile', [ProfileController::class, 'profilePage'])->name('profile');
//загрузка фото
Route::post('/upload-avatar', [AvatarController::class, 'upload'])->name('avatar.upload');



//Каталог
Route::get('/catalog', [ProductController::class, 'catalogPage'])->name('catalog.list');
Route::get('/sortbyprice',[ProductController::class,'sortby']);
Route::get('/sortbypriceMin',[ProductController::class,'sortbyMin']);

Route::get('/sortbucategoreys',[ProductController::class,'sortcategory'])->name('sortcategory');

//Поиск
Route::get('/search', [ProductController::class,'search'])-> name('search');

Route::post('/send-email',[ContactController::class, "sendContactForm"])->name('send.email');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});






