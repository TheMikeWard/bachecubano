<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Provinces pattern
Route::pattern('province_slug', '(www|artemisa|camaguey|ciego-de-avila|cienfuegos|granma|guantanamo|holguin|isla-de-la-juventud|la-habana|las-tunas|matanzas|mayabeque|pinar-del-rio|sancti-spiritus|santiago-de-cuba|villa-clara)');

//Provinces as subdomain
Route::domain('{province_slug}.' . config('app.domain'))->group(function () {
    //Welcome Route
    Route::get('/', 'WelcomeController@index')->name('welcome')->middleware('cache.headers:private,max-age=300;etag');
});

//Provinces as subdomain
Route::domain('puedosalir.' . config('app.domain'))->group(function () {
    //Welcome Route
    Route::get('/', 'WelcomeController@puedosalir')->name('puedosalir')->middleware('cache.headers:private,max-age=300;etag');
});

//Static Pages: [Contact, Terms, FAQ]
Route::group(['prefix' => 'contact'], function () {
    Route::get('/', 'WelcomeController@contact')->name('contact');
    Route::post('/', 'WelcomeController@contact_submit')->name('contact_submit');
});

Route::get('/terms-and-conditions', 'WelcomeController@terms')->middleware('cacheResponse:86400', 'cache.headers:public,max-age=86400;etag')->name('terms');

//Imap Controller every 1 min
Route::get('/imap_check', 'ImapController@imap_check')->name('imap_check');

//Image Manipulation
Route::post('/save-image', 'Api\ImageController@save')->name('save-image-ajax');
Route::post('/delete-image', 'Api\ImageController@destroy')->name('delete-image-ajax');
Route::post('/save-profile-image', 'Api\ImageController@save_profile_image')->name('save-profile-image-ajax');
Route::post('/save-blog-post-cover-image', 'Api\ImageController@save_blog_post_cover_image')->name('save-cover-image-ajax');

//Enable/Disable Ads via AJAX call
Route::post('/disable-ad-ajax', 'Api\AdsController@disable_ad_ajax')->name('disable-ad-ajax');

//User Login/Register/Change Password routes
Auth::routes();

//User Social Login Facebook so far
Route::get('/redirect/{provider}', 'SocialController@redirect')->name('social_login');
Route::get('/callback/{provider}', 'SocialController@callback')->name('social_callback');

//CSS controller
Route::get('/css/bch1.css', 'WelcomeController@bachecubano_css')->name('bachecubano_css');
Route::get('/js/bch1.js', 'WelcomeController@bachecubano_js')->name('bachecubano_js');

//Feeds
Route::get('/feed', 'BlogController@feeds')->name('blog_feeds');

//Blog access to create articles peremission role
Route::group(['prefix' => 'blog'], function () {
    //Blog Approve Post and Viralice
    Route::get('approve/{post_id}/{telegram?}/{twitter?}/{push?}/{facebook?}', 'BlogController@approve_post')->name('blog_post_approve')->where('post_id', '[0-9]+');
    //Create
    Route::get('/create', 'BlogController@create')->name('blog_post_create')->middleware(['role:writer']);
    Route::get('/edit/{post_id}', 'BlogController@edit')->name('blog_post_edit')->middleware(['role:writer']);
    Route::post('/store', 'BlogController@store')->name('blog_store')->middleware(['role:writer']);
    Route::post('/update/{post_id}', 'BlogController@update')->name('blog_update')->middleware(['role:writer']);
    Route::get('/{blog_category_slug?}/', 'BlogController@index')->name('blog_index');
    Route::get('/{blog_category_slug}/{entry_slug}', 'BlogController@show')->name('blog_post');
});

//Telegram Routes with token parameter
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    //Add specific role to specific user
    Route::get('/assign-role/{user_id}/{rolename}', 'Admin\UserController@assign_role')->name('admin_assign_role');
});

//User Routes for Configuration (Mainly registered area) with some Auth Middleware
Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    //Ads Management
    Route::get('/ads', 'HomeController@ads')->name('my_ads');
    Route::get('/favourite', 'HomeController@favourite')->name('my_favourite');
    //User Settings
    Route::get('/settings', 'HomeController@settings')->name('my_settings');
    //Some stats about paymet hystory
    Route::get('/payments', 'HomeController@payments')->name('my_payments');
    //My Blog publications
    Route::get('/blog-posts', 'HomeController@blog_posts')->name('my_blog_posts');
    Route::post('/delete', 'HomeController@delete_account')->name('delete_account');
    Route::post('/update', 'HomeController@update_user')->name('update_user');
    Route::post('/update_password', 'HomeController@update_user_password')->name('update_user_password');

    //SMS Routes
    Route::get('/send_sms', 'HomeController@send_sms')->name('send_sms');

    //Transfer Money Routes
    Route::get('/transfer_money', 'HomeController@transfer_money')->name('transfer_money');
    Route::post('/transfer_money', 'HomeController@transfer_money_post')->name('transfer_money_post');
});

//Sitemap Creator Has to be here, On Api breaks Urls from generated indexes
Route::get('/sitemap', 'Api\SitemapController@sitemap_index')->name('sitemap_index');

//Cart Routes
Route::resource('/cart', 'CartController');

//Sharing Routes
Route::get('/share/{network}/{url}/{text}', 'ShareController@index')->name('share');
Route::get('/invite/{item}/{misc}', 'ShareController@invite')->name('invite');

//Ad promotion Page
Route::group(['prefix' => 'promote', 'middleware' => 'auth'], function () {
    Route::get('/{ad}', 'AdController@promote_ad')->name('promote_ad');
    Route::post('/{ad}', 'AdController@post_promote_ad')->name('post_promote_ad');
});

//update_all
Route::get('/update_all', 'AdController@update_all')->middleware('throttle:1,30')->name('update_all');      //Update All ads every 30 minutes only
//Delete Ad direct link
Route::get('/delete/{ad}', 'AdController@destroy')->name('delete_ad')->middleware('auth');
//Direct link to ad ID based
Route::get('/{ad}', 'AdController@direct_redirect')->where('ad', '[0-9]+'); //only allow numeric ID

//Provinces as subdomain
Route::domain('{province_slug}.' . config('app.domain'))->group(function () {
    //Ads Routes & Resource Route
    Route::get('/add', 'AdController@create')->name('add');
    //Category Listing
    Route::get('/{category}/', 'AdController@index')->name('super_category_index')->middleware('cacheResponse:30', 'cache.headers:private,max-age=30;etag', 'defaultlocation');
    //SubCategory Listing
    Route::get('/{category}/{subcategory}/', 'AdController@index')->name('category_index')->middleware('cacheResponse:30', 'cache.headers:private,max-age=30;etag', 'defaultlocation');
    //Ad specific Show
    Route::get('/{category}/{subcategory}/{ad_title}/{ad_id}', 'AdController@show')->name('show_ad')->middleware('cacheResponse:30', 'cache.headers:private,max-age=30;etag', 'defaultlocation')->where('ad_id', '[0-9]+'); //only allow numeric ID
});

//Laravel Images redirection to subdomain
Route::get('/oc-content/uploads/{folder_id}/{resource_name}', 'AdController@redirectto_image');

//Ad resources route
Route::resource('ad', 'AdController');

//SubDomain Stores
Route::domain('{store_name}.bachecubano.com')->group(function () {
    Route::get('store/{store_name}', 'StoreController@show')->name('store_index');
});
