<?php

use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\LandingPageController as LandingPage;
use App\Http\Controllers\DashboardController as Dashboard;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\Authentication\AuthenticationController as AuthContr;


// Landing page
Route::get('/',[LandingPage::class,'landingPage']);
Route::permanentRedirect('/home','/');


// Authentication
Route::get('/login',[AuthContr::class,'loginView'])->name('login');
Route::post('/login',[AuthContr::class,'loginPost']);
Route::get('/logout',[AuthContr::class,'logoutReq'])->middleware(['auth']);

// Dashboard
Route::get('/dashboard',[Dashboard::class,'dashboard']);

// Users
Route::group(['prefix'=>'/user','middleware'=>['auth']],function(){
    // My profile
    Route::get('/myProfile',[User::class,'myProfile']);
    Route::post('/myProfile',[User::class,'myProfilePatch']);
});


// Settings
Route::group(['prefix'=>'/settings','middleware'=>['auth']],function(){
    // Texts and links
    Route::get('/textsAndLinks',[LandingPage::class,'textSetings']);
});

