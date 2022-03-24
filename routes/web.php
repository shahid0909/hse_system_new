<?php

use App\Http\Controllers\Admin\AdminA\ChemicalController;
use App\Http\Controllers\Admin\AdminA\ChemicalListingController;
use App\Http\Controllers\Admin\AdminA\ChemicalRegisterController;
use App\Http\Controllers\Admin\AdminA\Setup\CasController;
use App\Http\Controllers\Admin\AdminA\Setup\GhslabelController;
use App\Http\Controllers\Admin\AdminA\Setup\HazardController;
use App\Http\Controllers\Admin\AdminA\Setup\ManufacturerController;
use App\Http\Controllers\Admin\AdminA\Setup\PhysicalFormController;
use App\Http\Controllers\Admin\AdminA\Setup\ppeController;
use App\Http\Controllers\Admin\AdminA\Setup\SupplierController;
use App\Http\Controllers\Admin\AdminA\UsercreateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\FrontendController;

use App\Http\Controllers\Client\ScheduleDemoController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\CompanySetup\CompanyProfileController;
use App\Http\Controllers\User\CompanySetup\DepartmentController;
use App\Http\Controllers\User\CompanySetup\DesignationController;
use App\Http\Controllers\User\CompanySetup\EmployeeController;
use App\Http\Controllers\User\CompanySetup\EmployeeProfileController;
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


//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/sdsSearch', [FrontendController::class, 'sdsSearch'])->name('sdsSearch');
Route::get('/pagination/fetch_data', [FrontendController::class, 'fetch_data'])->name('fetch_data');

Route::post('/sds-search-result', [FrontendController::class, 'getSearchResult'])->name('sds-search-result');


//Route::view('/','web.home.home')->name('web.home');
//
///** Client Schedule Demo Request */
//Route::get('/schedule-demo-request', [ScheduleDemoController::class, 'index'])->name('schedule-demo-request.index');
//Route::post('/schedule-demo-request', [ScheduleDemoController::class, 'store'])->name('schedule-demo-request.store');

/** Client Schedule Demo Request */
//Route::get('/schedule-demo-request', [ScheduleDemoController::class, 'index'])->name('schedule-demo-request.index');
//Route::post('/schedule-demo-request', [ScheduleDemoController::class, 'store'])->name('schedule-demo-request.store');



Route::get('/login', [LoginController::class, 'login']);
Route::get('/registration', [RegistrationController::class, 'registration']);

Route::middleware(['middleware' => 'preventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'preventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');


    Route::group(['name' => 'usercreate', 'as' => 'usercreate.'], function () {

        Route::get('usercreate', [UsercreateController::class, 'index'])->name('index');
        Route::post('usercreate-store', [UsercreateController::class, 'store'])->name('store');

    });


    Route::group(['name' => 'chemical', 'as' => 'chemical.'], function () {

        Route::get('chemical-list', [ChemicalController::class, 'index'])->name('index');
        Route::post('chemical-list', [ChemicalController::class, 'store'])->name('store');
        Route::get('chemical-list-edit/{id}', [ChemicalController::class, 'edit'])->name('edit');
        Route::put('chemical-list-update/{id}', [ChemicalController::class, 'update'])->name('update');
        Route::get('chemical-list-destroy/{id}', [ChemicalController::class, 'destroy'])->name('destroy');

    });
    Route::group(['name' => 'chemical_listing', 'as' => 'chemical_listing.'], function () {

        Route::get('chemical-listing', [ChemicalListingController::class, 'index'])->name('index');
        Route::post('chemical-data/{id}', [ChemicalListingController::class, 'chemicalData'])->name('chemicalData');
        Route::post('chemical_listing-store', [ChemicalListingController::class, 'store'])->name('store');
        Route::get('chemical-listing-edit/{id}', [ChemicalListingController::class, 'edit'])->name('edit');
        Route::put('chemical-listing-update/{id}', [ChemicalListingController::class, 'update'])->name('update');
        Route::get('chemical-list-datatable-list', [ChemicalListingController::class, 'datatable'])->name('datatable');
        Route::get('chemical-listing-destroy/{id}', [ChemicalListingController::class, 'destroy'])->name('destroy');

    });

    Route::group(['name' => 'chemical_register', 'as' => 'chemical_register.'], function () {

        Route::get('chemical-register', [ChemicalRegisterController::class, 'index'])->name('index');
        Route::post('chemical-register-data/{id}', [ChemicalRegisterController::class, 'chemicalData'])->name('chemicalData');
        Route::post('chemical_register-store', [ChemicalRegisterController::class, 'store'])->name('store');
//        Route::get('chemical-listing-edit/{id}', [ChemicalRegisterController::class, 'edit'])->name('edit');
//        Route::put('chemical-listing-update/{id}', [ChemicalRegisterController::class, 'update'])->name('update');
//        Route::get('chemical-list-datatable-list', [ChemicalRegisterController::class, 'datatable'])->name('datatable');
//        Route::get('chemical-listing-destroy/{id}', [ChemicalRegisterController::class, 'destroy'])->name('destroy');

    });


    Route::group(['name' => 'l_manufacturer', 'as' => 'l_manufacturer.'], function () {

        Route::get('manufacturer-list', [ManufacturerController::class, 'index'])->name('index');
        Route::POST('manufacturer-list-store', [ManufacturerController::class, 'store'])->name('store');
        Route::get('manufacturer-edit/{id}', [ManufacturerController::class, 'edit'])->name('edit');
        Route::put('manufacturer-update/{id}', [ManufacturerController::class, 'update'])->name('update');
        Route::get('manufacturer-datatable-list', [ManufacturerController::class, 'datatable'])->name('datatable');
        Route::get('manufacturer-destroy/{id}', [ManufacturerController::class, 'destroy'])->name('destroy');
    });

    Route::group(['name' => 'l_supplier', 'as' => 'l_supplier.'], function () {

        Route::get('supplier', [SupplierController::class, 'index'])->name('index');
        Route::POST('supplier', [SupplierController::class, 'store'])->name('store');
        Route::get('supplier-datatable-list', [SupplierController::class, 'datatable'])->name('datatable');
        Route::get('supplier-edit/{id}', [SupplierController::class, 'edit'])->name('edit');
        Route::put('supplier-update/{id}', [SupplierController::class, 'update'])->name('update');
        Route::get('supplier-destroy/{id}', [SupplierController::class, 'destroy'])->name('destroy');

    });
    Route::group(['name' => 'l_cas', 'as' => 'l_cas.'], function () {

        Route::get('cas-entry', [CasController::class, 'index'])->name('index');
        Route::POST('cas-entry-store', [CasController::class, 'store'])->name('store');
        Route::get('cas-entry-edit/{id}', [CasController::class, 'edit'])->name('edit');
        Route::put('cas-entry-update/{id}', [CasController::class, 'update'])->name('update');
        Route::get('cas-datatable-list}', [CasController::class, 'datatable'])->name('datatable');
        Route::get('cas-entry-destroy/{id}', [CasController::class, 'destroy'])->name('destroy');
    });
    Route::group(['name' => 'l_physical_form', 'as' => 'l_physical_form.'], function () {

        Route::get('physical-form', [PhysicalFormController::class, 'index'])->name('index');
        Route::POST('physical-form-store', [PhysicalFormController::class, 'store'])->name('store');
        Route::get('physical-form-edit/{id}', [PhysicalFormController::class, 'edit'])->name('edit');
        Route::put('physical-form-update/{id}', [PhysicalFormController::class, 'update'])->name('update');
        Route::get('physical-form-datatable-list}', [PhysicalFormController::class, 'datatable'])->name('datatable');
        Route::get('physical-form-destroy/{id}', [PhysicalFormController::class, 'destroy'])->name('destroy');
    });
    Route::group(['name' => 'l_ghs_label', 'as' => 'l_ghs_label.'], function () {

        Route::get('ghs-label', [GhslabelController::class, 'index'])->name('index');
        Route::POST('ghs-label-store', [GhslabelController::class, 'store'])->name('store');
        Route::get('ghs-label-edit/{id}', [GhslabelController::class, 'edit'])->name('edit');
        Route::put('ghs-label-update/{id}', [GhslabelController::class, 'update'])->name('update');
        Route::get('ghs-label-datatable-list}', [GhslabelController::class, 'datatable'])->name('datatable');
        Route::get('ghs-label-destroy/{id}', [GhslabelController::class, 'destroy'])->name('destroy');
    });
    Route::group(['name' => 'l_hazard', 'as' => 'l_hazard.'], function () {

        Route::get('hazard-entry', [HazardController::class, 'index'])->name('index');
        Route::POST('hazard-entry-store', [HazardController::class, 'store'])->name('store');
        Route::get('hazard-entry-edit/{id}', [HazardController::class, 'edit'])->name('edit');
        Route::put('hazard-entry-update/{id}', [HazardController::class, 'update'])->name('update');
        Route::get('hazard-entry-datatable-list}', [HazardController::class, 'datatable'])->name('datatable');
        Route::get('hazard-entry-destroy/{id}', [HazardController::class, 'destroy'])->name('destroy');
    });


    Route::group(['name' => 'l_ppe', 'as' => 'l_ppe.'], function () {

        Route::get('ppe-entry', [ppeController::class, 'index'])->name('index');
        Route::POST('ppe-entry-store', [ppeController::class, 'store'])->name('store');
        Route::get('ppe-entry-edit/{id}', [ppeController::class, 'edit'])->name('edit');
        Route::put('ppe-entry-update/{id}', [ppeController::class, 'update'])->name('update');
        Route::get('ppe-entry-datatable-list}', [ppeController::class, 'datatable'])->name('datatable');
        Route::get('ppe-entry-destroy/{id}', [ppeController::class, 'destroy'])->name('destroy');
    });




});

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'preventBackHistory']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');


    Route::group(['name' => 'department', 'as' => 'department.'], function () {

        Route::get('department', [DepartmentController::class, 'index'])->name('index');
        Route::POST('department-store', [DepartmentController::class, 'store'])->name('store');
       Route::get('department-edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
       Route::put('department-update/{id}', [DepartmentController::class, 'update'])->name('update');
       Route::get('department-datatable-list', [DepartmentController::class, 'datatable'])->name('datatable');
       Route::get('department-destroy/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
    });

    Route::group(['name' => 'designation', 'as' => 'designation.'], function () {

        Route::get('designation', [DesignationController::class, 'index'])->name('index');
        Route::post('designation.store', [DesignationController::class, 'store'])->name('designationstore');
        Route::get('designation-datatable-list', [DesignationController::class, 'datatable'])->name('datatable');
        Route::get('designation.edit/{id}', [DesignationController::class, 'designationedit'])->name('designation-edit');
        Route::put('designation/{id}', [DesignationController::class, 'editstore'])->name('editstore');
        Route::get('designation-destroy/{id}', [DesignationController::class, 'destroy'])->name('destroy');
    });

    Route::group(['name' => 'employee', 'as' => 'employee.'], function () {

        Route::get('employee', [EmployeeController::class, 'index'])->name('index');

    });

    Route::group(['name' => 'emp_profile', 'as' => 'emp_profile.'], function () {

        Route::get('emp_profile', [EmployeeProfileController::class, 'index'])->name('index');

    });

    Route::group(['name' => 'com_profile', 'as' => 'com_profile.'], function () {

        Route::get('com_profile', [CompanyProfileController::class, 'index'])->name('index');

    });
});

