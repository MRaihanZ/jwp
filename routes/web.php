<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthCheck;

Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [CustomerController::class, 'detail'])->name('detail');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/catalog', [CatalogController::class, 'catalog'])->name('admin.catalog');

Route::get('/admin/catalog/create', [CatalogController::class, 'showCatalogCreate'])->name('admin.catalog.show.create');
Route::post('/admin/catalog/create', [CatalogController::class, 'actionCatalogCreate'])->name('admin.catalog.action.create');

Route::get('/admin/catalog/update/{slug}', [CatalogController::class, 'showCatalogUpdate'])->name('admin.catalog.show.update');
Route::post('/admin/catalog/update/{slug}', [CatalogController::class, 'actionCatalogUpdate'])->name('admin.catalog.action.update');

Route::get('/admin/catalog/delete/{slug}', [CatalogController::class, 'catalogDelete'])->name('admin.catalog.action.delete');

Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');

Route::post('/order/{slug}', [CustomerController::class, 'orderStore'])->name('order');

Route::get('/admin/order/{firstSlug}/{secondSlug}', [OrderController::class, 'update'])->name('admin.order.update');

Route::get('/admin/order/{slug}', [OrderController::class, 'delete'])->name('admin.order.delete');
