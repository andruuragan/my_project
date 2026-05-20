<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Catalog\IndexController;
use App\Http\Controllers\Catalog\CreateController;
use App\Http\Controllers\Catalog\StoreController;
use App\Http\Controllers\Catalog\SearchController;
use App\Http\Controllers\Catalog\EditController;
use App\Http\Controllers\Catalog\UpdateController;
use App\Http\Controllers\Catalog\DestroyController;
use App\Http\Controllers\Catalog\CatalogImageController;
use App\Http\Controllers\CatalogController;

use App\Http\Controllers\DescriptionController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminOrdersController;

/* =========================
| AUTH (Breeze)
========================= */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* =========================
| PUBLIC PAGES
========================= */

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/dymohody-ta-komplektuyuchi', [ShopController::class, 'index'])
    ->name('shop.index');

Route::get('/dymsystems', function () {
    return redirect()->route('main.index');
});

/* =========================
| ADMIN PAGE
========================= */

// Обертываем все роуты в группу с посредниками защиты
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    /* =========================
    | CATALOG (ADMIN CRUD)
    ========================= */
    // Чтобы постоянно не писать '/catalog', можно добавить префикс и имя (опционально, см. Вариант 2)
    Route::get('/catalog', IndexController::class)->name('catalog.index');
    Route::get('/catalog/create', CreateController::class)->name('catalog.create');
    Route::post('/catalog', StoreController::class)->name('catalog.store');
    Route::get('/catalog/search', SearchController::class)->name('catalog.search');
    Route::get('/catalog/{catalog}/edit', EditController::class)->name('catalog.edit');
    Route::patch('/catalog/{catalog}', UpdateController::class)->name('catalog.update');
    Route::delete('/catalog/{catalog}', DestroyController::class)->name('catalog.destroy');
    Route::delete('/catalog/{catalog}/image', [CatalogImageController::class, 'removeImage'])->name('catalog.image.remove');

    /* =========================
    | ADMIN SHOW & RESOURCES
    ========================= */
    Route::get('/admin/catalog/{catalog}', \App\Http\Controllers\Catalog\ShowController::class)->name('admin.catalog.show');
    Route::resource('descriptions', DescriptionController::class);

});


Route::get('/catalog/{catalog}', [CatalogController::class, 'publicShow'])
    ->name('catalog.public.show');

/* =========================
| DESCRIPTIONS
========================= */



/* =========================
| AUTH ROUTES
========================= */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});
Route::get('/admin/users/{user}/orders', [\App\Http\Controllers\Admin\AdminUserOrderController::class, 'index'])
    ->name('admin.users.orders');



Route::middleware('auth')->group(function () {

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{catalog}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    Route::post('/cart/update/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::post('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');



    Route::get('/profile/orders', [\App\Http\Controllers\OrderController::class, 'index'])
            ->name('profile.orders');
    Route::get('/profile/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])
        ->name('profile.orders.show');
    Route::get('/orders/{order}/excel', [OrderController::class, 'exportExcel'])
        ->name('orders.export.excel');


});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])
            ->name('admin.orders.destroy');


    });


Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/orders', [AdminOrdersController::class, 'index'])
            ->name('admin.orders.index');

        Route::get('/orders/search', [AdminOrdersController::class, 'search'])
            ->name('admin.orders.search');

        Route::get('/orders/export', [AdminOrdersController::class, 'export'])
            ->name('admin.orders.export');

        Route::patch('/orders/{order}/status', [AdminOrdersController::class, 'updateStatus'])
            ->name('admin.orders.status');
    });

Route::get('/cart/state', [CartController::class, 'state']);


require __DIR__.'/auth.php';
