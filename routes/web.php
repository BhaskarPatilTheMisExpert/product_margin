<?php

use App\Http\Controllers\Admin\ArpDataController;
use App\Http\Controllers\Admin\TowerMasterController;
use App\Http\Controllers\Admin\FactDataController;
use App\Http\Controllers\Admin\FactCategoryController;
use App\Http\Controllers\Admin\FactCategoryPanController;
use App\Http\Controllers\Admin\FactCompanyController;
use App\Http\Controllers\Admin\FactProductController;
use App\Http\Controllers\Admin\FactProductIsinController;
use App\Http\Controllers\Admin\IsinFacilityController;
use App\Http\Controllers\Admin\ProjectMasterController;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

Route::any('testing/test','Admin\TestController@testAny');

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Project Approval
  

    // Project Approval
  

    Route::get('send-email', [SendEmailController::class, 'index'])->name('send-email');

    // user work stream
    //Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('user-workstream', 'UserWorkstreamController');

   


    //Asmita

    //benposDump
    


    // Route::post('arp-download2','ArpDataController@massDownload')->name('arp-download2');

   


    // key updates
    Route::get('key-updates/create', 'KeyUpdateController@addEditKeyUpdates');
    Route::post('key-updates/workstream-data', 'KeyUpdateController@getWorkstreamData');
    Route::post('key-updates/save-update', 'KeyUpdateController@saveUpdateKeyDetails');
    Route::post('key-updates/borrower-data', 'KeyUpdateController@getBorrowerData');

    //sapMasterAutomation
    


    // key updates
    Route::get('key-updates/create', 'KeyUpdateController@addEditKeyUpdates');
    Route::post('key-updates/workstream-data', 'KeyUpdateController@getWorkstreamData');
    Route::post('key-updates/save-update', 'KeyUpdateController@saveUpdateKeyDetails');
    Route::post('key-updates/borrower-data', 'KeyUpdateController@getBorrowerData');

    Route::post('arp-download2', 'ArpDataController@massDownload')->name('arp-download2');


    //Treasury
   

   
    //FinOps
    Route::resource('isin-facility', 'IsinFacilityController');

    //asset Management Escrow master 
   
    // key updates
    Route::get('key-updates/create', 'KeyUpdateController@addEditKeyUpdates');
    Route::post('key-updates/workstream-data', 'KeyUpdateController@getWorkstreamData');
    Route::post('key-updates/save-update', 'KeyUpdateController@saveUpdateKeyDetails');
    Route::post('key-updates/borrower-data', 'KeyUpdateController@getBorrowerData');


    //sapMasterAutomation
   

  


    // key updates
    Route::get('key-updates/create', 'KeyUpdateController@addEditKeyUpdates');
    Route::post('key-updates/workstream-data', 'KeyUpdateController@getWorkstreamData');
    Route::post('key-updates/save-update', 'KeyUpdateController@saveUpdateKeyDetails');
    Route::post('key-updates/borrower-data', 'KeyUpdateController@getBorrowerData');

    //Am Project approvals Sdf
    Route::post('am-project-approvals-sdf/save', 'AmProjectApprovalSdfController@saveApproval')->name('am-project-approvals-sdf.save');
    
    Route::any('am-project-approvals-sdf/list', 'AmProjectApprovalSdfController@index')->name('am-project-approvals-sdf.listing');
    Route::any('am-project-deletion-sdf/list', 'AmProjectDeletionSdfController@index')->name('am-project-deletion-sdf.listing');

    Route::resource('am-project-approvals-sdf', 'AmProjectApprovalSdfController');
    Route::resource('am-project-deletion-sdf', 'AmProjectDeletionSdfController');
    
   
    Route::get('create-product','ProductController@createProduct')->name('create-product');
    Route::get('store-product','ProductController@storeProduct')->name('store-product'); 
    Route::get('dashboardReport-product','ProductController@dashboardReport')->name('dashboardReport-product');
    Route::get('editProduct/{id}','ProductController@editProduct')->name('editProduct'); 
    Route::get('updateProduct/{id}','ProductController@updateProduct')->name('updateProduct');
    Route::get('destroyProduct/{id}','ProductController@destroyProduct')->name('destroyProduct');


    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
//Login with otp
Route::post('getOtp', [LoginController::class, 'generateOtp']);
//Route::get('checkEmail',[LoginController::class, 'checkEmail']);
//Route::get('userLogin',[LoginController::class, 'userLogin'])->name('userLogin');
