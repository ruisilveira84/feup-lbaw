<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\BidderSellerController;
use App\Models\Auction;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home
// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');


Route::controller(FAQController::class)->group(function() {
    Route::get('/faq', 'index');
});


Route::controller(ItemController::class)->group(function () {
    Route::put('/api/cards/{card_id}', 'create');
    Route::post('/api/item/{id}', 'update');
    Route::delete('/api/item/{id}', 'delete');
});

// Authentication
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});

// About us
Route::get('/aboutus', function () {
    return view('pages.aboutus', ['title' => "DibsOnBids - About Us"]); 
});

// Contacts
Route::get('/contacts', function () {
    return view('pages.contacts', ['title' => "DibsOnBids - Contacts"]); 
});

// Support
Route::get('/support', function () {
    return view('pages.support'); 
});

Route::controller(UserController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::get('/user/add-credit', 'showAddCreditForm')->name('add.credit.view');
    Route::post('/user/add-credit', 'addCredit')->name('user.add.credit');
    Route::get('/delete-account', 'showDeleteAccount')->name('delete.account.view');
    Route::post('/delete-account', 'deleteAccount')->name('delete.account');
});

Route::controller(BidderSellerController::class)->group(function () {
    Route::post('/profile', 'create')->name('bidderseller');
});

// Auction Details and Creation
Route::controller(AuctionController::class)->group(function () {
    Route::get('/auction/{id}', 'index')->name("showauction");
    Route::get('/createauction', fn () => view('pages.createauction', ["title" => "DibsOnBids - New Auction"]))->name('createauction');
    Route::post('/createauction', 'create');
    Route::get('/', 'list')->name('home');
    Route::get('/search', 'search')->name('auction.search');
    Route::get('/status/{status}', 'status')->name('status');
    Route::get('/category/{category}', 'getAuctionsByCategory')->name('category.show');
});

Route::controller(BidController::class)->group(function() {
    Route::post('/auction/{id}', 'bid')->name('bid');
});


Route::get('/terms', function () {
    return view('pages.terms', ['title' => "DibsOnBids - Terms Of Service"]);
})->name('terms');
