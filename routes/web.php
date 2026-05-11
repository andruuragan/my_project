<?php

use App\Http\Controllers\Catalog\IndexController;
use App\Http\Controllers\Catalog\CreateController;
use App\Http\Controllers\Catalog\StoreController;
use App\Http\Controllers\Catalog\SearchController;
use App\Http\Controllers\Catalog\ShowController;
use App\Http\Controllers\Catalog\EditController;
use App\Http\Controllers\Catalog\UpdateController;
use App\Http\Controllers\Catalog\DestroyController;
use App\Http\Controllers\Catalog\CatalogImageController;
use App\Http\Controllers\DescriptionController;


use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| CATALOG (ADMIN CRUD)
|--------------------------------------------------------------------------
*/

Route::get('/catalog', IndexController::class)->name('catalog.index');
Route::get('/catalog/create', CreateController::class)->name('catalog.create');
Route::post('/catalog', StoreController::class)->name('catalog.store');
Route::get('/catalog/search', SearchController::class)->name('catalog.search');

Route::get('/catalog/{catalog}/edit', EditController::class)
    ->name('catalog.edit');

Route::patch('/catalog/{catalog}', UpdateController::class)
    ->name('catalog.update');

Route::delete('/catalog/{catalog}', DestroyController::class)
    ->name('catalog.destroy');

Route::delete('/catalog/{catalog}/image', [CatalogImageController::class, 'removeImage'])
    ->name('catalog.image.remove');

/*
|--------------------------------------------------------------------------
| ADMIN SHOW (окремо від публічного)
|--------------------------------------------------------------------------
*/

Route::get('/admin/catalog/{catalog}', ShowController::class)
    ->name('admin.catalog.show');
Route::resource('descriptions', DescriptionController::class);

/*
|--------------------------------------------------------------------------
| PUBLIC CATALOG (для клієнтів)
|--------------------------------------------------------------------------
*/

Route::get('/catalog/{catalog}', [CatalogController::class, 'publicShow'])
    ->name('catalog.public.show');

/*
|--------------------------------------------------------------------------
| STATIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/dymohody-ta-komplektuyuchi', [ShopController::class, 'index'])
    ->name('shop.index');

Route::get('/dymsystems', function () {
    return redirect()->route('main.index');
});
