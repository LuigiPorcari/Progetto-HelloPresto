<?php

use App\Http\Controllers\FoodBoxController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::delete('/user/destroy' , [PublicController::class , 'destroyUser'])->name('user.destroy');



Route::middleware(["auth"])->group(function(){
    Route::get('/FoodBox/create',[FoodBoxController::class , 'create'])->name('FoodBox.create');
    Route::post('revisor/request' , [RevisorController::class , 'becomeRevisor'])->name('become.revisor');
    Route::get('make/revisor/{user}' , [RevisorController::class , 'makeRevisor'])->name('make.revisor');
    // Route::get('revisor/index' , [RevisorController::class , 'index'])->name('revisor.index');
    // Route::patch('accept/{foodbox}' , [RevisorController::class , 'accept'])->name('accept');
    // // LOGICA DI RIFIUTO ARTICOLI
    // Route::patch('reject/{foodbox}' , [RevisorController::class , 'reject'])->name('reject');
});

Route::get('/category/{category}',[FoodBoxController::class , 'categoryShow'])->name('categoryShow');

Route::get('/foodbox/details/{foodbox}', [FoodBoxController::class, 'show'])->name('foodbox.show');

Route::middleware(["isRevisor"])->group(function(){
    Route::get('revisor/index' , [RevisorController::class , 'index'])->name('revisor.index');
    Route::patch('accept/{foodbox}' , [RevisorController::class , 'accept'])->name('accept');
    Route::patch('reject/{foodbox}' , [RevisorController::class , 'reject'])->name('reject');
    Route::patch('/undo/accept/reject' , [RevisorController::class , 'undoAcceptReject'])->name('undo');
});

Route::get('/search/foodbox' , [PublicController::class , 'searchFoodbox'])->name('foodbox.search');

Route::get('/foodbox/index' , [PublicController::class , 'index'])->name('foodbox.index');

Route::post('/language/{lang}', [PublicController::class , 'setLanguage'])->name('setLocale');

Route::get('/politichesullaprivacy', [PublicController::class, 'privacy'])->name('privacy');
