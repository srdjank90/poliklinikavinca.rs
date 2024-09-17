<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard route
    Route::get('/backend', [App\Http\Controllers\Backend\BackendController::class, 'backend'])->name('backend');

    // Backend Pages
    Route::get('/backend/pages', [App\Http\Controllers\Backend\PageController::class, 'index'])->name('backend.pages.index');
    Route::post('/backend/pages/store', [App\Http\Controllers\Backend\PageController::class, 'store'])->name('backend.pages.store');
    Route::get('/backend/pages/edit/{id}', [App\Http\Controllers\Backend\PageController::class, 'edit'])->name('backend.pages.edit');
    Route::put('/backend/pages/update/{id}', [App\Http\Controllers\Backend\PageController::class, 'update'])->name('backend.pages.update');
    Route::delete('/backend/pages/delete/{id}', [App\Http\Controllers\Backend\PageController::class, 'destroy'])->name('backend.pages.delete');
    Route::get('/backend/pages/settings', [App\Http\Controllers\Backend\PageController::class, 'settings'])->name('backend.pages.settings');

    // Backend Posts
    Route::get('/backend/posts', [App\Http\Controllers\Backend\PostController::class, 'index'])->name('backend.posts.index');
    Route::post('/backend/posts/store', [App\Http\Controllers\Backend\PostController::class, 'store'])->name('backend.posts.store');
    Route::get('/backend/posts/edit/{id}', [App\Http\Controllers\Backend\PostController::class, 'edit'])->name('backend.posts.edit');
    Route::put('/backend/posts/update/{id}', [App\Http\Controllers\Backend\PostController::class, 'update'])->name('backend.posts.update');
    Route::delete('/backend/posts/delete/{id}', [App\Http\Controllers\Backend\PostController::class, 'destroy'])->name('backend.posts.delete');
    Route::get('/backend/posts/settings', [App\Http\Controllers\Backend\PostController::class, 'settings'])->name('backend.posts.settings');

    // Backend Posts Categories
    Route::get('/backend/posts/categories', [App\Http\Controllers\Backend\PostCategoryController::class, 'index'])->name('backend.posts.categories.index');
    Route::post('/backend/posts/categories/store', [App\Http\Controllers\Backend\PostCategoryController::class, 'store'])->name('backend.posts.categories.store');
    Route::delete('/backend/posts/categories/delete/{id}', [App\Http\Controllers\Backend\PostCategoryController::class, 'destroy'])->name('backend.pages.categories.delete');

    // Backend Products
    Route::get('/backend/products', [App\Http\Controllers\Backend\ProductController::class, 'index'])->name('backend.products.index');
    Route::post('/backend/products/store', [App\Http\Controllers\Backend\ProductController::class, 'store'])->name('backend.products.store');
    Route::get('/backend/products/edit/{id}', [App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('backend.products.edit');
    Route::get('/backend/products/landing/{id}', [App\Http\Controllers\Backend\ProductController::class, 'landing'])->name('backend.products.landing');
    Route::put('/backend/products/landing/{id}/update', [App\Http\Controllers\Backend\ProductController::class, 'landingUpdate'])->name('backend.products.landing.update');
    Route::put('/backend/products/landing/item/{id}/update', [App\Http\Controllers\Backend\ProductController::class, 'landingItemUpdate'])->name('backend.products.landing.item.update');
    Route::delete('/backend/products/landing/{id}', [App\Http\Controllers\Backend\ProductController::class, 'landingDelete'])->name('backend.products.landing.delete');
    Route::put('/backend/products/landing/{id}/update', [App\Http\Controllers\Backend\ProductController::class, 'landingUpdate'])->name('backend.products.landing.update');
    Route::put('/backend/products/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'update'])->name('backend.products.update');
    Route::delete('/backend/products/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'destroy'])->name('backend.products.delete');
    Route::post('/backend/products/images/store/{id}', [App\Http\Controllers\Backend\ProductController::class, 'imagesStore'])->name('backend.products.images.store');
    Route::delete('/backend/products/{productId}/images/remove/{imageId}', [App\Http\Controllers\Backend\ProductController::class, 'imageRemove'])->name('backend.products.images.remove');
    Route::get('/backend/products/settings', [App\Http\Controllers\Backend\ProductController::class, 'settings'])->name('backend.products.settings');
    Route::post('/backend/products/settings/metas/store', [App\Http\Controllers\Backend\ProductController::class, 'settingsMetasStore'])->name('backend.products.settings.metas.store');
    Route::get('/backend/products/time-offers', [App\Http\Controllers\Backend\ProductController::class, 'timeOffers'])->name('backend.products.timeOffers');

    // Backend Product Categories
    Route::get('/backend/products/categories', [App\Http\Controllers\Backend\ProductCategoryController::class, 'index'])->name('backend.products.categories.index');
    Route::post('/backend/products/categories/store', [App\Http\Controllers\Backend\ProductCategoryController::class, 'store'])->name('backend.products.categories.store');
    Route::put('/backend/products/categories/update/{id}', [App\Http\Controllers\Backend\ProductCategoryController::class, 'update'])->name('backend.products.categories.update');
    Route::delete('/backend/products/categories/delete/{id}', [App\Http\Controllers\Backend\ProductCategoryController::class, 'destroy'])->name('backend.products.categories.delete');
    // Backend Product Meta
    Route::post('/backend/products/meta/store', [App\Http\Controllers\Backend\ProductMetaController::class, 'store'])->name('backend.products.meta.store');
    Route::delete('/backend/products/meta/delete/{id}', [App\Http\Controllers\Backend\ProductMetaController::class, 'destroy'])->name('backend.products.meta.delete');
    // Backend Product Actions
    Route::get('/backend/products/actions', [App\Http\Controllers\Backend\ProductActionController::class, 'index'])->name('backend.products.actions.index');
    Route::post('/backend/products/actions/store', [App\Http\Controllers\Backend\ProductActionController::class, 'store'])->name('backend.products.actions.store');
    Route::put('/backend/products/actions/update/{id}', [App\Http\Controllers\Backend\ProductActionController::class, 'update'])->name('backend.products.actions.update');
    Route::delete('/backend/products/actions/delete/{id}', [App\Http\Controllers\Backend\ProductActionController::class, 'destroy'])->name('backend.products.actions.delete');

    // Backend Packages
    Route::get('/backend/packages', [App\Http\Controllers\Backend\GoldPackageController::class, 'index'])->name('backend.packages.index');
    Route::post('/backend/packages/store', [App\Http\Controllers\Backend\GoldPackageController::class, 'store'])->name('backend.packages.store');
    Route::get('/backend/packages/edit/{id}', [App\Http\Controllers\Backend\GoldPackageController::class, 'edit'])->name('backend.packages.edit');
    Route::put('/backend/packages/update/{id}', [App\Http\Controllers\Backend\GoldPackageController::class, 'update'])->name('backend.packages.update');
    Route::delete('/backend/packages/delete/{id}', [App\Http\Controllers\Backend\GoldPackageController::class, 'destroy'])->name('backend.packages.delete');
    Route::get('/backend/packages/settings', [App\Http\Controllers\Backend\GoldPackageController::class, 'settings'])->name('backend.packages.settings');

    // Backend Orders
    Route::get('/backend/orders', [App\Http\Controllers\Backend\OrderController::class, 'index'])->name('backend.orders.index');
    Route::get('/backend/orders/edit/{id}', [App\Http\Controllers\Backend\OrderController::class, 'edit'])->name('backend.orders.edit');
    Route::post('/backend/orders/update-status/{id}', [App\Http\Controllers\Backend\OrderController::class, 'updateStatus'])->name('backend.orders.update.status');
    Route::get('/backend/orders/invoice/{id}/pdf', [App\Http\Controllers\Backend\OrderController::class, 'downloadInvoice'])->name('backend.orders.invoice.download');
    Route::get('/backend/orders/invoice/{id}', [App\Http\Controllers\Backend\OrderController::class, 'invoice'])->name('backend.orders.invoice');
    Route::get('/backend/orders/settings', [App\Http\Controllers\Backend\OrderController::class, 'settings'])->name('backend.orders.settings');
    Route::delete('/backend/orders/delete/{id}', [App\Http\Controllers\Backend\OrderController::class, 'destroy'])->name('backend.orders.delete');

    // Backend Files
    Route::get('/backend/files', [App\Http\Controllers\Backend\FileController::class, 'index'])->name('backend.files.index');
    #Route::get('/backend/orders/edit/{id}', [App\Http\Controllers\Backend\OrderController::class, 'edit'])->name('backend.orders.edit');
    #Route::post('/backend/orders/update-status/{id}', [App\Http\Controllers\Backend\OrderController::class, 'updateStatus'])->name('backend.orders.update.status');
    #Route::get('/backend/orders/invoice/{id}/pdf', [App\Http\Controllers\Backend\OrderController::class, 'downloadInvoice'])->name('backend.orders.invoice.download');
    #Route::get('/backend/orders/invoice/{id}', [App\Http\Controllers\Backend\OrderController::class, 'invoice'])->name('backend.orders.invoice');
    #Route::get('/backend/orders/settings', [App\Http\Controllers\Backend\OrderController::class, 'settings'])->name('backend.orders.settings');
    Route::delete('/backend/orders/delete/{id}', [App\Http\Controllers\Backend\FileController::class, 'destroy'])->name('backend.files.delete');

    // Backend Options
    Route::post('/backend/options/store', [App\Http\Controllers\Backend\OptionController::class, 'store'])->name('backend.options.store');

    // Backend SEO
    Route::get('/backend/seo', [App\Http\Controllers\Backend\SeoController::class, 'index'])->name('backend.seo.index');
    Route::get('/backend/seo/{model}/{id}', [App\Http\Controllers\Backend\SeoController::class, 'show'])->name('backend.seo.show');
    Route::post('/backend/seo/{model}/{id}/update', [App\Http\Controllers\Backend\SeoController::class, 'update'])->name('backend.seo.update');

    // Backend Settings
    Route::get('/backend/settings', [App\Http\Controllers\Backend\SettingsController::class, 'index'])->name('backend.settings.index');
    Route::get('/backend/settings/seo', [App\Http\Controllers\Backend\SettingsController::class, 'seo'])->name('backend.settings.seo');
    Route::get('/backend/settings/theme', [App\Http\Controllers\Backend\SettingsController::class, 'theme'])->name('backend.settings.theme');

    // Backend Settings Shippings
    Route::get('/backend/settings/shippings', [App\Http\Controllers\Backend\ShippingController::class, 'index'])->name('backend.settings.shippings.index');
    Route::get('/backend/settings/shippings/edit/{id}', [App\Http\Controllers\Backend\ShippingController::class, 'edit'])->name('backend.settings.shippings.edit');
    Route::get('/backend/settings/shippings/create', [App\Http\Controllers\Backend\ShippingController::class, 'create'])->name('backend.settings.shippings.create');
    Route::post('/backend/settings/shippings/store', [App\Http\Controllers\Backend\ShippingController::class, 'store'])->name('backend.settings.shippings.store');
    Route::put('/backend/settings/shippings/update/{id}', [App\Http\Controllers\Backend\ShippingController::class, 'update'])->name('backend.settings.shippings.update');
    Route::delete('/backend/settings/shippings/delete/{id}', [App\Http\Controllers\Backend\ShippingController::class, 'destroy'])->name('backend.settings.shippings.delete');

    // Backend Settings Payment Methods
    Route::get('/backend/settings/payment-methods', [App\Http\Controllers\Backend\PaymentMethodController::class, 'index'])->name('backend.settings.payment-methods.index');
    Route::get('/backend/settings/payment-methods/edit/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'edit'])->name('backend.settings.payment-methods.edit');
    Route::get('/backend/settings/payment-methods/create', [App\Http\Controllers\Backend\PaymentMethodController::class, 'create'])->name('backend.settings.payment-methods.create');
    Route::post('/backend/settings/payment-methods/store', [App\Http\Controllers\Backend\PaymentMethodController::class, 'store'])->name('backend.settings.payment-methods.store');
    Route::put('/backend/settings/payment-methods/update/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'update'])->name('backend.settings.payment-methods.update');
    Route::delete('/backend/settings/payment-methods/delete/{id}', [App\Http\Controllers\Backend\PaymentMethodController::class, 'destroy'])->name('backend.settings.payment-methods.delete');
});

Route::get('/profil', [App\Http\Controllers\Frontend\ProfileController::class, 'profile'])->name('frontend.profile.index');
Route::post('/profil', [App\Http\Controllers\Frontend\ProfileController::class, 'profileUpdate'])->name('frontend.profile.update');
Route::get('/profil/security', [App\Http\Controllers\Frontend\ProfileController::class, 'security'])->name('frontend.profile.security');
Route::post('/profil/security/password-update', [App\Http\Controllers\Frontend\ProfileController::class, 'passwordUpdate'])->name('frontend.profile.security.passwordUpdate');
Route::get('/profil/notifications', [App\Http\Controllers\Frontend\ProfileController::class, 'notifications'])->name('frontend.profile.notifications');
Route::get('/profil/orders', [App\Http\Controllers\Frontend\ProfileController::class, 'orders'])->name('frontend.profile.orders');
Route::get('/profil/wishlist', [App\Http\Controllers\Frontend\ProfileController::class, 'wishlist'])->name('frontend.profile.wishlist');
Route::get('/profil/address', [App\Http\Controllers\Frontend\ProfileController::class, 'address'])->name('frontend.profile.address');
Route::get('/profil/address/create', [App\Http\Controllers\Frontend\ProfileController::class, 'addressCreate'])->name('frontend.profile.address.create');
Route::post('/profil/address/store', [App\Http\Controllers\Frontend\ProfileController::class, 'addressStore'])->name('frontend.profile.address.store');
Route::get('/profil/address/edit/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'addressEdit'])->name('frontend.profile.address.edit');
Route::put('/profil/address/update/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'addressUpdate'])->name('frontend.profile.address.update');
Route::delete('/profil/address/delete/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'addressDelete'])->name('frontend.profile.address.delete');
Route::get('/chat', [App\Http\Controllers\Backend\ChatGPTController::class, 'askToChatGpt']);

// Frontend
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/korpa', [App\Http\Controllers\Frontend\FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('/zavrsi-kupovinu', [App\Http\Controllers\Frontend\FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::post('/zavrsi-kupovinu/store', [App\Http\Controllers\Frontend\CheckoutController::class, 'createOrder'])->name('frontend.checkout.store');
Route::get('/zavrsi-kupovinu/uspesno', [App\Http\Controllers\Frontend\FrontendController::class, 'checkoutSuccess'])->name('frontend.checkout.success');
Route::get('/products/action/{actionSlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'actionProducts'])->name('frontend.action.products');
Route::get('/proizvodi/{categorySlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'categoryProducts'])->name('frontend.category.products');
Route::get('/proizvod/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'product'])->name('frontend.product');
Route::get('/proizvodi', [App\Http\Controllers\Frontend\FrontendController::class, 'products'])->name('frontend.products');
Route::get('/investicioni-kalkulator', [App\Http\Controllers\Frontend\FrontendController::class, 'packages'])->name('frontend.packages');
Route::post('/paketi-porudzbina', [App\Http\Controllers\Frontend\CheckoutController::class, 'createPackageOrder'])->name('frontend.package.order');
Route::get('/blog/{categorySlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'categoryPosts'])->name('frontend.category.posts');
Route::get('/blog/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'post'])->name('frontend.post');
Route::get('/blog', [App\Http\Controllers\Frontend\FrontendController::class, 'posts'])->name('frontend.posts');
Route::get('/o-nama', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/najcesca-pitanja', [App\Http\Controllers\Frontend\FrontendController::class, 'faqs'])->name('frontend.faqs');
Route::get('/veleprodaja-zlata', [App\Http\Controllers\Frontend\FrontendController::class, 'wholesale'])->name('frontend.wholesale');
Route::get('/cena-zlata', [App\Http\Controllers\Frontend\FrontendController::class, 'goldprice'])->name('frontend.goldprice');
Route::get('/investiciono-zlato', [App\Http\Controllers\Frontend\FrontendController::class, 'investmentgold'])->name('frontend.investmentgold');
Route::get('/investiciono-srebro', [App\Http\Controllers\Frontend\FrontendController::class, 'investmentsilver'])->name('frontend.investmentsilver');
Route::get('/royal-mint', [App\Http\Controllers\Frontend\FrontendController::class, 'royalmint'])->name('frontend.royalmint');
Route::get('/kontakt', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.contact');


Route::get('/get-prices', [App\Http\Controllers\API\APIController::class, 'updatePricesApi'])->name('api.prices.update');


Route::get('/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'page'])->name('frontend.page');

Route::post('/subscribe', [App\Http\Controllers\Frontend\SubscribeController::class, 'subscribe'])->name('frontend.subscribe');
Route::post('/contact-send', [App\Http\Controllers\Frontend\ContactController::class, 'sendContactForm'])->name('frontend.contact.send');
Route::post('/wholesale-send', [App\Http\Controllers\Frontend\ContactController::class, 'sendWholesaleForm'])->name('frontend.wholesale.send');


Route::get('/generate/sitemap', [App\Http\Controllers\Frontend\GenerateController::class, 'sitemap'])->name('generate.sitemap');
