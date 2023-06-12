<?php

use App\Http\Controllers;
use App\Http\Controllers\Client;
use App\Http\Controllers\Category;
use App\Http\Controllers\Group;
use App\Http\Controllers\Tag;
use App\Http\Controllers\Color;
use App\Http\Controllers\User;
use App\Http\Controllers\Product;
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
Route::group(['prefix' => 'admin'], function () {
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

    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', Group\IndexController::class)->name('group.index');
        Route::get('/create', Group\CreateController::class)->name('group.create');
        Route::post('/', Group\StoreController::class)->name('group.store');
        Route::get('/{group}', Group\ShowController::class)->name('group.show');
        Route::get('/{group}/edit', Group\EditController::class)->name('group.edit');
        Route::patch('/{group}', Group\UpdateController::class)->name('group.update');
        Route::delete('/{group}', Group\DestroyController::class)->name('group.destroy');
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

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', User\IndexController::class)->name('user.index');
        Route::get('/create', User\CreateController::class)->name('user.create');
        Route::post('/', User\StoreController::class)->name('user.store');
        Route::get('/{user}', User\ShowController::class)->name('user.show');
        Route::get('/{user}/edit', User\EditController::class)->name('user.edit');
        Route::patch('/{user}', User\UpdateController::class)->name('user.update');
        Route::delete('/{user}', User\DestroyController::class)->name('user.destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', Product\IndexController::class)->name('product.index');
        Route::get('/create', Product\CreateController::class)->name('product.create');
        Route::post('/', Product\StoreController::class)->name('product.store');
        Route::get('/{product}', Product\ShowController::class)->name('product.show');
        Route::get('/{product}/edit', Product\EditController::class)->name('product.edit');
        Route::patch('/{product}', Product\UpdateController::class)->name('product.update');
        Route::delete('/{product}', Product\DestroyController::class)->name('product.destroy');
    });
});

Route::get('/{any?}', Client\IndexController::class)->where('any', '.*');

