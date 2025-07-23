<?php

use App\Livewire\Order\Display;
use App\Livewire\Order\OrderList;
use App\Livewire\Pos\Pos;
use App\Livewire\Pos\PosMain;
use App\Livewire\Product\ListProduct;
use App\Livewire\Product\Product;
use App\Livewire\Product\ProductIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/product', Product::class)->middleware(['auth'])->name('product');
Route::get('/order', OrderList::class)->middleware(['auth'])->name('order.list');
Route::get('/display', Display::class)->middleware(['auth'])->name('display');
Route::get('/pos', PosMain::class)->middleware(['auth'])->name('pos');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
