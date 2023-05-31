<?php

use App\Http\Controllers;
use App\Http\Controllers\Category;
use App\Http\Controllers\Tag;
use App\Http\Controllers\Color;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', Category\IndexController::class)->name('category.index');
    Route::get('/create', Category\CreateController::class)->name('category.create');
    Route::post('/', Category\StoreController::class)->name('category.store');
    Route::get('/{category}', Category\ShowController::class)->name('category.show');
    Route::get('/{category}/edit', Category\EditController::class)->name('category.edit');
    Route::patch('/{category}', Category\UpdateController::class)->name('category.update');
    Route::delete('/{category}', Category\DestroyController::class)->name('category.destroy');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', Tag\IndexController::class)->name('tag.index');
    Route::get('/create', Tag\CreateController::class)->name('tag.create');
    Route::post('/', Tag\StoreController::class)->name('tag.store');
    Route::get('/{tag}', Tag\ShowController::class)->name('tag.show');
    Route::get('/{tag}/edit', Tag\EditController::class)->name('tag.edit');
    Route::patch('/{tag}', Tag\UpdateController::class)->name('tag.update');
    Route::delete('/{tag}', Tag\DestroyController::class)->name('tag.destroy');
});

Route::group(['prefix' => 'colors'], function () {
    Route::get('/', Color\IndexController::class)->name('color.index');
    Route::get('/create', Color\CreateController::class)->name('color.create');
    Route::post('/', Color\StoreController::class)->name('color.store');
    Route::get('/{color}', Color\ShowController::class)->name('color.show');
    Route::get('/{color}/edit', Color\EditController::class)->name('color.edit');
    Route::patch('/{color}', Color\UpdateController::class)->name('color.update');
    Route::delete('/{color}', Color\DestroyController::class)->name('color.destroy');
});
