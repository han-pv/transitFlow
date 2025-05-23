<?php

use App\Http\Controllers\Client\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\TeamMemberController;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::get('team-members', [TeamMemberController::class, 'index'])->name('team-members');

Route::get('about', [AboutController::class, 'index'])->name('about');

Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');

Route::controller(BlogController::class)
    ->prefix('blogs')
    ->name('blogs.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9\-]+');
    });

Route::controller(ContactController::class)
    ->prefix('contacts')
    ->name('contacts.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store');
    });