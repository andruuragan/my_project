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
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\CategoryPageController;
use App\Http\Controllers\SingleWallSystemController;
use App\Http\Controllers\SandwichSystemController;
use App\Http\Controllers\FittingsSystemController;
use Illuminate\Support\Facades\Mail;


/* ==========================================================================
|  1. PUBLIC PAGES & AUTH CONTROL (Breeze)
|  ========================================================================== */

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/categories', [CategoryPageController::class, 'index'])
    ->name('categories.index');
    Route::post('/search-chimneys', [CategoryPageController::class, 'search']);
    Route::get('/systema-odnostinnih-dimohodiv', SingleWallSystemController::class)
    ->name('single-wall-system');
   Route::get('/termo-sendvich-dimohidna-systema', SandwichSystemController::class)
    ->name('sandwich-system');
    Route::get(
    '/systema-kriplen-homutiv-ta-komplektuyuchih',
    [FittingsSystemController::class, 'index']
)->name('fittings-system');
Route::get('/dymohody-ta-komplektuyuchi', [ShopController::class, 'index'])->name('shop.index');
Route::get('/catalog/{catalog}', [CatalogController::class, 'publicShow'])->name('catalog.public.show');

Route::get('/dymsystems', function () {
    return redirect()->route('main.index');
});



Route::get('/socket-test', function () {

    $errno = 0;
    $errstr = '';

   $fp = @stream_socket_client("tcp://smtp.gmail.com:587", $errno, $errstr, 10);

    if (!$fp) {
        return response()->json([
            'connect' => false,
            'errno' => $errno,
            'error' => $errstr,
        ]);
    }

    stream_set_timeout($fp, 5);

    $meta = stream_get_meta_data($fp);
    $banner = fread($fp, 1024);

    fclose($fp);

    return response()->json([
        'connect' => true,
        'meta' => $meta,
        'banner' => base64_encode($banner),
        'raw' => $banner,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/wishlist/toggle/{catalog}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/profile/wishlist', [WishlistController::class, 'index'])->name('profile.wishlist');
});


/* ==========================================================================
|  2. CUSTOMER AREA (Auth Required)
|  ========================================================================== */

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{catalog}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders');
    Route::get('/profile/orders/{order}', [OrderController::class, 'show'])->name('profile.orders.show');
    Route::get('/orders/{order}/excel', [OrderController::class, 'exportExcel'])->name('orders.export.excel');
});

Route::get('/cart/state', [CartController::class, 'state']);

/* ==========================================================================
|  3. ADMIN PANEL (Strict Protection)
|  ========================================================================== */

// Точка входа в админку — СНАРУЖИ префиксной группы, чтобы редиректы не ломали URL
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.index');

// Все остальные внутренние страницы админки
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    /* --- Управление каталогом (CRUD) --- */
    Route::get('/catalog', IndexController::class)->name('catalog.index');
    Route::get('/catalog/create', CreateController::class)->name('catalog.create');
    Route::post('/catalog', StoreController::class)->name('catalog.store');
    Route::get('/catalog/search', SearchController::class)->name('catalog.search');
    Route::get('/catalog/{catalog}/edit', EditController::class)->name('catalog.edit');
    Route::patch('/catalog/{catalog}', UpdateController::class)->name('catalog.update');
    Route::delete('/catalog/{catalog}', DestroyController::class)->name('catalog.destroy');
    Route::delete('/catalog/{catalog}/image', [CatalogImageController::class, 'removeImage'])->name('catalog.image.remove');
    Route::get('/catalog/{catalog}/show', \App\Http\Controllers\Catalog\ShowController::class)->name('admin.catalog.show');

    /* --- Описания товаров --- */
    Route::resource('descriptions', DescriptionController::class);

    /* --- Управление пользователями и их заказами --- */
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('/users/{user}/orders', [\App\Http\Controllers\Admin\AdminUserOrderController::class, 'index'])->name('admin.users.orders');

    /* --- Управление заказами интернет-магазина --- */
    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/search', [AdminOrdersController::class, 'search'])->name('admin.orders.search');
    Route::get('/orders/export', [AdminOrdersController::class, 'export'])->name('admin.orders.export');
    Route::patch('/orders/{order}/status', [AdminOrdersController::class, 'updateStatus'])->name('admin.orders.status');
    Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::post('/products/{id}/reset-likes', [AdminController::class, 'resetLikes'])->name('admin.products.reset-likes');
});
// Сторінка калькулятора димоходу
Route::view('/chimney-calculator', 'pages.chimney-calculator')
    ->name('chimney.calculator');

// Сторінка інструкції "Як обрати діаметр димоходу"
Route::view('/how-to-choose-chimney-diameter', 'pages.diameter')
    ->name('chimney.diameter');

// Сторінка правил безпечного монтажу системи
Route::view('/montazh-dymohodu-pravyla', 'pages.installation-rules')
    ->name('chimney.installation-rules');
    // Обробка заявок на монтаж з форми
Route::post('/order-installation', [App\Http\Controllers\CheckoutController::class, 'storeLead'])
    ->name('leads.store');
    Route::get('/blog/pomylky-montazhu', [BlogController::class, 'showInstallationErrors'])->name('blog.installation-errors');
Route::get('/useful-info', [App\Http\Controllers\UsefulController::class, 'index'])->name('useful.index');
/* ==========================================================================
|  4. SYSTEM INCLUDES
|  ========================================================================== */
Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
Route::post('/contacts/send', [App\Http\Controllers\ContactsController::class, 'send'])->name('contact.send');
require __DIR__.'/auth.php';
