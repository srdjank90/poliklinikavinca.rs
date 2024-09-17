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
});


// Frontend
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/blog/{categorySlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'categoryPosts'])->name('frontend.category.posts');
Route::get('/blog/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'post'])->name('frontend.post');
Route::get('/blog', [App\Http\Controllers\Frontend\FrontendController::class, 'posts'])->name('frontend.posts');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/faqs', [App\Http\Controllers\Frontend\FrontendController::class, 'faqs'])->name('frontend.faqs');
Route::get('/kontakt', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'page'])->name('frontend.page');

Route::post('/subscribe', [App\Http\Controllers\Frontend\SubscribeController::class, 'subscribe'])->name('frontend.subscribe');
Route::post('/contact-send', [App\Http\Controllers\Frontend\ContactController::class, 'sendContactForm'])->name('frontend.contact.send');

Route::get('/generate/sitemap', [App\Http\Controllers\Frontend\GenerateController::class, 'sitemap'])->name('generate.sitemap');
