<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthCheck;

Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [CustomerController::class, 'detail'])->name('detail');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(AuthCheck::class)->name('admin.dashboard');
Route::get('/admin/catalog', [AdminController::class, 'catalog'])->middleware(AuthCheck::class)->name('admin.catalog');

Route::get('/admin/catalog/create', [AdminController::class, 'showCatalogCreate'])->middleware(AuthCheck::class)->name('admin.catalog.show.create');
Route::post('/admin/catalog/create', [AdminController::class, 'actionCatalogCreate'])->middleware(AuthCheck::class)->name('admin.catalog.action.create');

Route::get('/admin/catalog/update/{slug}', [AdminController::class, 'showCatalogUpdate'])->middleware(AuthCheck::class)->name('admin.catalog.show.update');
Route::post('/admin/catalog/update/{slug}', [AdminController::class, 'actionCatalogUpdate'])->middleware(AuthCheck::class)->name('admin.catalog.action.update');

Route::delete('/admin/catalog/delete/{slug}', [AdminController::class, 'catalogDelete'])->middleware(AuthCheck::class)->name('admin.catalog.action.delete');
