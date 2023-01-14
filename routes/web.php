<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowTweets
};
use App\Http\Livewire\User\UploadPhoto;

// Route::get('/tweets', ShowTweets::class);

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])
        ->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            Route::get('/tweets', ShowTweets::class)
                    ->name('tweets.index');
            Route::get('/upload', UploadPhoto::class)
                    ->name('upload.photo.user');
});
