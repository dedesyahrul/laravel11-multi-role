<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        $user = auth()->user();
        return match($user->role->name) {
            'superadmin' => redirect()->route('superadmin.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            default => redirect()->route('user.dashboard'),
        };
    })->name('dashboard');

    Route::group(['middleware' => RoleMiddleware::class . ':superadmin', 'prefix' => 'superadmin', 'as' => 'superadmin.'], function () {
        Route::get('/', function () {
            return view('superadmin.dashboard');
        })->name('dashboard');

        Route::middleware(['can:view-users'])->group(function () {
            // User management routes akan ditambahkan di sini
        });

        Route::middleware(['can:view-roles'])->group(function () {
            // Role management routes akan ditambahkan di sini
        });
    });

    Route::group(['middleware' => RoleMiddleware::class . ':admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::middleware(['can:view-content'])->group(function () {
            // Content management routes akan ditambahkan di sini
        });
    });

    Route::group(['middleware' => RoleMiddleware::class . ':user', 'prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', function () {
            return view('user.dashboard');
        })->name('dashboard');

        Route::middleware(['can:view-content'])->group(function () {
            // Content viewing routes akan ditambahkan di sini
        });
    });
});

require __DIR__.'/auth.php';
