<?php

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

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/auth-login', function () {
    return view('pages.auth.login');
});

Route::get('/admin-auth-register', function () {
    return view('pages.auth.register');
});

// Register supervisor routes
Route::get('/register-supervisor', function () {
    return view('pages.auth.register_supervisor');
});
Route::post('/register-supervisor', 'UserController@registerSupervisor');

Route::get('/auth-forgot-password', function () {
    return view('pages.auth.forgot_password');
});

Route::post('/auth-login', 'UserController@login');
Route::post('/admin-auth-register', 'UserController@register');
Route::get('/logout', 'UserController@logout');

Route::get('/user-dashboard', 'DashboardController@index');
Route::get('/my-lab', 'DashboardController@myLab')->middleware('can:isLabAdmin');

Route::get('/user-profile', function () {
    if (Auth::guest()) {
        //is a guest so redirect
        return redirect('/auth-login');
    }
    return view('pages.user.profile');
});
Route::get('/auth-password-reset/{uuid}', 'UserController@settings');
Route::post('/auth-password-reset/{id}', 'UserController@password');
Route::get('/user-profile/{uuid}', 'UserController@editProfile');
Route::post('/user-profile/{id}', 'UserController@profileSettings');

// Rider Route
Route::get('/create-rider', 'RiderController@create')->middleware('can:isSuperAdmin');
Route::post('/create-rider', 'RiderController@store')->middleware('can:isSuperAdmin');
Route::get('/manage-rider', 'RiderController@index')->middleware('can:isSuperAdmin');
Route::get('/edit-rider/{uuid}', 'RiderController@edit')->middleware('can:isSuperAdmin');
Route::get('/update-rider/{uuid}', 'RiderController@updateDetails');
Route::post('/update-rider/{id}', 'RiderController@update');
Route::post('/delete-rider', 'RiderController@destroy');

// Lab Route
Route::get('/create-lab', 'LabController@create')->middleware('can:isSuperAdmin');
Route::post('/create-lab', 'LabController@store')->middleware('can:isSuperAdmin');
Route::get('/manage-lab', 'LabController@index')->middleware('can:isSuperAdmin');
Route::get('/edit-lab/{uuid}', 'LabController@edit')->middleware('can:isSuperAdmin');

// Warehouse Route
Route::get('/manage-warehouse', 'WarehouseController@index')->middleware('can:isSuperAdmin');
Route::post('/create-warehouse', 'WarehouseController@store')->middleware('can:isSuperAdmin');
Route::get('/edit-warehouse/{uuid}', 'WarehouseController@edit')->middleware('can:isSuperAdmin');

// Admin Route
Route::get('/manage-admin', 'AdminController@index')->middleware('can:isSuperAdmin');
Route::get('/edit-admin/{uuid}', 'AdminController@edit')->middleware('can:isSuperAdmin');
Route::get('/create-admin', 'AdminController@create')->middleware('can:isSuperAdmin');
Route::post('/create-admin', 'AdminController@store')->middleware('can:isSuperAdmin');

// Transaction Route
Route::get('/generate-transaction/{uuid}', 'TransactionController@create');
Route::post('/generate-transaction', 'TransactionController@store');
Route::get('/all-transactions', 'TransactionController@index');
Route::get('/transaction-detail/{uuid}', 'TransactionController@edit');

// Order Route
Route::post('/admin-order', 'OrderController@adminOrder');
Route::get('/create-order', 'OrderController@create');
Route::post('/create-order', 'OrderController@store');
Route::get('/incomplete-orders', 'OrderController@incompleteOrders')->middleware('can:isSuperAdmin');
Route::get('/incomplete-order-details/{uuid}', 'OrderController@editIncompleteOrder');
Route::post('/incomplete-order/{id}', 'OrderController@assignRiderToIncompleteOrder');
Route::get('/open-orders', 'OrderController@show');
Route::get('/order-details/{uuid}', 'OrderController@edit');
Route::post('/completed', 'OrderController@orderCompleted')->middleware('can:isSuperAdmin');
Route::post('/edit-status/{id}', 'OrderController@changeStatus')->middleware('can:isSuperAdmin');
Route::get('/all-orders', 'OrderController@index');
Route::get('/deleted-orders', 'OrderController@deletedOrders')->middleware('can:isSuperAdmin');
Route::get('/deleted-order-details/{uuid}', 'OrderController@deletedOrderDetails')->middleware('can:isSuperAdmin');
Route::post('/delete-order/{id}', 'OrderController@destroy')->middleware('can:isSuperAdmin');
Route::post('/update-status', 'OrderController@updateStatus');
Route::get('/completed-orders', 'OrderController@completedOrders');

// Receipt Route
Route::get('/generate-receipt/{uuid}', 'TransactionController@generateReceipt');
Route::get('/view-receipts', 'TransactionController@viewReceipts');

// Share route 
Route::get('/share-requests', 'ShareController@index')->middleware('can:isSuperAdmin');
Route::get('/all-share-requests', 'ShareController@show')->middleware('can:isSuperOrLabAdmin');
Route::post('/share-supplies', 'ShareController@store');
Route::post('/cbl-share', 'ShareController@cblShare')->middleware('can:isSuperAdmin');
Route::get('/share-details/{uuid}', 'ShareController@edit')->middleware('can:isSuperOrLabAdmin');
Route::post('/assign-rider/{id}', 'ShareController@assignRider')->middleware('can:isSuperAdmin');
Route::post('/delivered-samples', 'ShareController@deliveredSamples')->middleware('can:isSuperAdmin');
Route::get('/all-delivered-samples', 'ShareController@allDeliveredSamples')->middleware('can:isSuperOrLabAdmin');
Route::post('/change-status/{id}', 'ShareController@changeStatus')->middleware('can:isSuperAdmin');

// Profiler
Route::post('/create-profiler', 'UserController@createProfiler'); // ->middleware('can:isSupervisor')
Route::get('/manage-profilers', 'UserController@manageProfilers'); // ->middleware('can:isSupervisor')

// Flight
Route::get('/create-flight', 'FlightController@create'); //->middleware('can:isSupervisor');
Route::post('/create-flight', 'FlightController@store');
Route::get('/all-flights', 'FlightController@index');
Route::post('/upload-flight', 'FlightController@importFlight');
Route::get('/download-flight', 'FlightController@exportFlight');
Route::post('/search', 'FlightController@search');

Route::get('/manage-packs', 'PackController@index'); // Pack
Route::post('/add-pack', 'PackController@store');
Route::post('/add-item', 'ItemController@store'); // Item

// Activity
Route::get('/inventory-activity', 'ActivityController@index');
Route::post('create-activity', 'ActivityController@store');
Route::get('/inventory-category', 'CategoryController@index'); // Category
Route::post('/add-category', 'CategoryController@store');
Route::get('/activity-details/{uuid}', 'ActivityController@edit');

// Inventory
Route::get('/pack-request', 'InventoryController@create');
Route::post('/pack-request', 'InventoryController@store');
Route::get('/incomplete-inventories', 'InventoryController@incompleteInventories');
Route::get('/all-care-packs', 'InventoryController@index');
Route::get('/inventories-details/{uuid}', 'InventoryController@edit');
Route::post('/incomplete-inventory/{id}', 'InventoryController@assignRider');
Route::get('/delivered-care-packs', 'InventoryController@deliveredCarePacks');
Route::post('/delivered-care-packs', 'InventoryController@inventoryDelivered');
Route::post('/admin-request', 'InventoryController@adminRequest'); // Admin pack request


// Paystack
Route::get('/verify-transactions/{reference}', 'PaymentController@handleGatewayCallback');
