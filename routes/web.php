<?php

use App\Http\Controllers\CashOutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseItemsController;
use App\Http\Controllers\ReceiveCashController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProvidersController;
use App\Http\Controllers\UsersController;
use App\Models\ExpenseItems;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['auth:web']
],function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    
    Route::group([],function(){
        Route::get('users',[UsersController::class,'index'])->name('users.index');
        Route::get('users/create',[UsersController::class,'create'])->name('users.create');
        Route::post('users/store',[UsersController::class,'store'])->name('users.store');
        Route::get('users/edit/{id}',[UsersController::class,'edit'])->name('users.edit');
        Route::put('users/update/{id}',[UsersController::class,'update'])->name('users.update');
        Route::delete('users/delete/{id}',[UsersController::class,'destroy'])->name('users.delete');
    
        
    });
    
    Route::group([],function(){
        Route::get('clients',[ClientController::class,'index'])->name('clients.index');
        Route::get('clients/create',[ClientController::class,'create'])->name('clients.create');
        Route::post('clients/store',[ClientController::class,'store'])->name('clients.store');
        Route::get('clients/edit/{id}',[ClientController::class,'edit'])->name('clients.edit');
        Route::put('clients/update/{id}',[ClientController::class,'update'])->name('clients.update');
        Route::delete('clients/delete/{id}',[ClientController::class,'destroy'])->name('clients.delete');
        
    });
    
    
    Route::group([],function(){
        Route::get('service_providers',[ServiceProvidersController::class,'index'])->name('service_providers.index');
        Route::get('service_providers/create',[ServiceProvidersController::class,'create'])->name('service_providers.create');
        Route::post('service_providers/store',[ServiceProvidersController::class,'store'])->name('service_providers.store');
        Route::get('service_providers/edit/{id}',[ServiceProvidersController::class,'edit'])->name('service_providers.edit');
        Route::put('service_providers/update/{id}',[ServiceProvidersController::class,'update'])->name('service_providers.update');
        Route::delete('service_providers/delete/{id}',[ServiceProvidersController::class,'destroy'])->name('service_providers.delete');
        
        
    });
    
    
    Route::group([],function(){
        Route::get('services',[ServiceController::class,'index'])->name('services.index');
        Route::get('services/create',[ServiceController::class,'create'])->name('services.create');
        Route::post('services/store',[ServiceController::class,'store'])->name('services.store');
        Route::get('services/edit/{id}',[ServiceController::class,'edit'])->name('services.edit');
        Route::put('services/update/{id}',[ServiceController::class,'update'])->name('services.update');
        Route::delete('services/delete/{id}',[ServiceController::class,'destroy'])->name('services.delete');
        
        
    });
    
    
    Route::group([],function(){
        Route::get('receive_cash',[ReceiveCashController::class,'index'])->name('receive_cash.index');
        Route::get('receive_cash/create',[ReceiveCashController::class,'create'])->name('receive_cash.create');
        Route::post('receive_cash/store',[ReceiveCashController::class,'store'])->name('receive_cash.store');
        Route::get('receive_cash/edit/{id}',[ReceiveCashController::class,'edit'])->name('receive_cash.edit');
        Route::put('receive_cash/update/{id}',[ReceiveCashController::class,'update'])->name('receive_cash.update');
        Route::delete('receive_cash/delete/{id}',[ReceiveCashController::class,'destroy'])->name('receive_cash.delete');
        
        
    });
    
    Route::group([],function(){
        Route::get('cash_out',[CashOutController::class,'index'])->name('cash_out.index');
        Route::get('cash_out/create',[CashOutController::class,'create'])->name('cash_out.create');
        Route::post('cash_out/store',[CashOutController::class,'store'])->name('cash_out.store');
        Route::get('cash_out/edit/{id}',[CashOutController::class,'edit'])->name('cash_out.edit');
        Route::put('cash_out/update/{id}',[CashOutController::class,'update'])->name('cash_out.update');
        Route::delete('cash_out/delete/{id}',[CashOutController::class,'destroy'])->name('cash_out.delete');
        
        
    });
    
    Route::group([],function(){
        Route::get('expense_items',[ExpenseItemsController::class,'index'])->name('expense_items.index');
        Route::get('expense_items/create',[ExpenseItemsController::class,'create'])->name('expense_items.create');
        Route::post('expense_items/store',[ExpenseItemsController::class,'store'])->name('expense_items.store');
        Route::get('expense_items/edit/{id}',[ExpenseItemsController::class,'edit'])->name('expense_items.edit');
        Route::put('expense_items/update/{id}',[ExpenseItemsController::class,'update'])->name('expense_items.update');
        Route::delete('expense_items/delete/{id}',[ExpenseItemsController::class,'destroy'])->name('expense_items.delete');
        
        
    });
});