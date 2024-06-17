<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd(auth()->user());
    return view('index');
})->name('index');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::post('/profile/create',[UsersController::class,'store'])->name('profile.store');
Route::post('/profile/image',[UsersController::class,'updateImage'])->name('profile.image');
Route::post('/profile/akun',[UsersController::class,'updateAkun'])->name('profile.akun');


Route::get('/pop-up', function(){
    return view('pop-up');
})->name('pop-up');

Route::get('/login',function(){
    Auth::loginUsingId(1);
});
