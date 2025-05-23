<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;


Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(BlogController::class)
            ->middleware('can:blogs')
            ->prefix('blogs')
            ->name('blogs.')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{blog}/edit', 'edit')->name('edit');
                Route::put('{id}', 'update')->name('update');
                Route::delete('{id}', 'destroy')->name('destroy');

                Route::get('', 'index')->name('index');
                Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9\-]+');

            });

        Route::controller(UserController::class)
            ->middleware('can:users')
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
            });

        Route::controller(TeamMemberController::class)
            ->middleware('can:team-members')
            ->prefix('team-members')
            ->name('team-members.')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);

                Route::get('', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
        
                Route::patch('{id}', 'toggle-active')->name('toggle-active')->where(['id' => '[0-9]+']);
            });

        Route::controller(TestimonialController::class)
            ->middleware('can:testimonials')
            ->prefix('testimonials')
            ->name('testimonials.')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);

                Route::get('', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
            });

        Route::controller(ContactController::class)
            ->middleware('can:contacts')
            ->prefix('contacts')
            ->name('contacts.')
            ->group(function () {
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
                Route::post('update-responded', 'updateResponded')->name('updateResponded');

                Route::get('', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
            });

        Route::controller(BannerController::class)
            ->middleware('can:banners')
            ->prefix('banners')
            ->name('banners.')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);

                Route::get('', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
            });

        Route::controller(AboutController::class)
            ->middleware('can:about')
            ->prefix('about')
            ->name('about.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('edit', 'edit')->name('edit');
                Route::put('', 'update')->name('update');
            });

        Route::controller(GalleryController::class)
            ->middleware('can:gallery')
            ->prefix('gallery')
            ->name('gallery.')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);

                Route::get('', 'index')->name('index');
            });
    });
