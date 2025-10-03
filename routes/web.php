<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\SearchController;

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\Admin\PostController as AdminPost;
use App\Http\Controllers\Admin\QuestionController as AdminQuestion;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\TagController as AdminTag;

use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessItemController;
use App\Http\Controllers\BusinessListingController;
use App\Http\Controllers\MenuSectionController;
use App\Http\Controllers\RoomController;

use App\Http\Controllers\VisitorController;

use App\Http\Controllers\BusinessReviewController;


use App\Models\BusinessListing;
use App\Models\MenuSection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\FeedbackController;


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

Route::get('/', [PageController::class, 'index'])->name('homepage');
Route::get('/homebeta', [PageController::class, 'homebeta'])->name('homebeta');
Route::get('/homenew', [PageController::class, 'homenew'])->name('homenew');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');

// routes/web.php
Route::get('/search', [SearchController::class, 'search'])->name('search.results');
//Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');

Route::get('/feedback/thank-you', [FeedbackController::class, 'thankYou'])->name('feedback.thankYou');
Route::get('/feedback/{slug}', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback/submit', [FeedbackController::class, 'submit'])->name('feedback.submit');


Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::get('/recipes/{slug}', [RecipeController::class, 'show'])->name('recipes.show');

Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store')->middleware('auth');
Route::post('/recipes/{id}/comment', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::post('/recipes/{id}/share', [RecipeController::class, 'shareToTelegram'])->name('recipes.share');


// Route to update role
Route::get('update-role', [PageController::class, 'editRole'])->name('update.role');
Route::get('update-role/post', [PageController::class, 'updateRole'])->name('update.role.post');

//Login Manage
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::get('verify', [CustomAuthController::class, 'verify'])->name('verify');
Route::get('sign-out', [CustomAuthController::class, 'signOut'])->name('sign-out');

Route::get('auth/google', [CustomAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [CustomAuthController::class, 'handleGoogleCallback']);

Route::get('forget-password', [CustomAuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [CustomAuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [CustomAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [CustomAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::post('custom-verify', [CustomAuthController::class, 'customVerify'])->name('verify.custom'); 

//Contact Manage
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'send_contact'])->name('sendContact');



// Protected routes
Route::middleware(['auth', 'check.role'])->group(function () {
    Route::get('/board', [PageController::class, 'dashboard'])->name('board');
    // Add other routes here
    Route::get('/business/feedbacks', [BusinessController::class, 'showFeedbacks'])->name('business.feedbacks');
    Route::resource('business', BusinessController::class);
    Route::resource('business_listing', BusinessListingController::class);
    Route::delete('/business/{id}/image/{imageId}', [BusinessListingController::class, 'deleteImage'])->name('business.image.delete');
    Route::post('/business_listing/toggle-status/{id}', [BusinessListingController::class, 'toggleStatus'])->name('business_listing.toggle_status');

    //Temp route
    
    Route::get('/notifications', [PageController::class, 'notifications'])->name('notifications');
    Route::get('/profile', [PageController::class, 'notifications'])->name('profile.view');
    Route::get('/profile-update', [PageController::class, 'notifications'])->name('profile.edit');
    Route::get('/setting', [PageController::class, 'notifications'])->name('settings');

});


Route::get('biz/{id}', [BusinessListingController::class, 'view'])->name('biz');

Route::resource('business_item', BusinessItemController::class);
Route::resource('menu_section', MenuSectionController::class);

Route::get('/themes', [BusinessController::class, 'bizThemes'])->name('themes');
Route::post('update-theme', [BusinessController::class, 'updateTheme'])->name('business.update-theme'); 
Route::post('update-preview', [BusinessController::class, 'updatePreview'])->name('business.update-preview'); 

Route::get('/room-create', [RoomController::class, 'create'])->name('createRoom');
Route::get('/room-index', [RoomController::class, 'index'])->name('roomList');
Route::get('/biz-space/{id}', [RoomController::class, 'view'])->name('roomSpace');


Route::get('/scan', [VisitorController::class, 'list'])->name('scan');


Route::name('qr')->middleware('visitor')->group(function() {
    Route::get('/qr/{id}', [RoomController::class, 'menu_view']);
});

//Common
Route::get('/subcategories/{category_id}', [SubcategoryController::class, 'getSubcategories'])->name("subcategories");

Route::get('/room/pdf/{id}', [RoomController::class, 'createPDF']);


Route::get('/resturents', [PageController::class, 'resturents'])->name('resturents');
Route::get('/features', [PageController::class, 'features'])->name('features');
Route::get('/business', [PageController::class, 'business'])->name('business');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');


Route::post('/businesses/{business}/reviews', [BusinessReviewController::class, 'store'])->name('reviews.store');


Route::get('/clear-cache', function() {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Cache::flush();
    cache()->flush();
    echo "cache cleared";
    exit;
    // return what you want
});

//Admin Panel Web links
Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin-admin');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    Route::resource('posts', AdminPost::class);
    Route::resource('users', AdminUser::class);
    Route::resource('questions', AdminQuestion::class);
    Route::resource('tags', AdminTag::class);
});