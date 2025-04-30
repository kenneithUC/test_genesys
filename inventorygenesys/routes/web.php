<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;

// Redirect root to inventory list
Route::get('/', function () {
    return redirect()->route('inventory.index');
});

// Dashboard route (after login)
Route::get('/dashboard', function () {
    return redirect()->route('inventory.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Redirect GET /purchase to form
    Route::get('purchase', function () {
        return redirect()->route('purchase.create');
    });
    // Redirect GET /sale to form
    Route::get('sale', function () {
        return redirect()->route('sale.create');
    });
    Route::resource('inventory', InventoryController::class)->except(['show']);
    Route::get('purchase/create', [PurchaseController::class,'create'])->name('purchase.create');
    Route::post('purchase', [PurchaseController::class,'store'])->name('purchase.store');
    Route::get('purchase/{purchase}/slip', [PurchaseController::class,'slip'])->name('purchase.slip');

    Route::get('sale/create', [SaleController::class,'create'])->name('sale.create');
    Route::post('sale', [SaleController::class,'store'])->name('sale.store');
    Route::get('sale/{sale}/slip', [SaleController::class,'slip'])->name('sale.slip');
});

// Load authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
