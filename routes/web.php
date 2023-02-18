<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/login', [AdminController::class, 'login'])->name('login');
//Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/staff', [AdminController::class, 'staff_admin']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/getCallBackFromAppAfternotification', [AdminController::class, 'getCallBackFromAppAfternotification']);
//Route::get('/getCallBackFromAppAfternotification','App\Http\Controllers\Admin@getCallBackFromAppAfternotification');

Route::middleware(['middleware'=>'admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/staff', [AdminController::class, 'staff_admin']);
    Route::get('/admin/city', [AdminController::class, 'city_list']);
    Route::get('/admin/area', [AdminController::class, 'area_list']);
    Route::get('/admin/building', [AdminController::class, 'building_list']);
    Route::get('/admin/apartment', [AdminController::class, 'apartment_list']);
    Route::get('/admin/payment', [AdminController::class, 'payment_details']);
    Route::get('/admin/tenant', [AdminController::class, 'tenant_list']);
    Route::get('/admin/maintenance', [AdminController::class, 'maintenance']);
    Route::get('/admin/report', [AdminController::class, 'reports']);
    Route::get('/admin/set_password', [AdminController::class, 'setPassword']);
    Route::get('/admin/addtenants', [AdminController::class, 'addtenantData']);
    Route::get('/admin/addStaff', [AdminController::class, 'addStaffData']);
    Route::get('/admin/addCity', [AdminController::class, 'addCityData']);
    Route::post('/admin/add_staff_data', [AdminController::class, 'add_admin_staff_Data']);
    Route::get('/admin/edit_staff_data{id}', [AdminController::class, 'edit_admin_staff_Data']);
    Route::post('/admin/update_staff_data', [AdminController::class, 'update_admin_staff_Data']);
    Route::get('/admin/delete_staff_data{id}', [AdminController::class, 'delete_admin_staff_Data']);

    
    Route::post('/admin/add_tenant_admin', [AdminController::class, 'add_tenant_admin_Data']);
    Route::post('/admin/add_city_data', [AdminController::class, 'add_city_admin_Data']);
    Route::get('/admin/edit_city_data{id}', [AdminController::class, 'edit_city_admin_Data']);
    Route::post('/admin/update_city_data', [AdminController::class, 'update_city_admin_Data']);
    Route::get('/admin/add_area', [AdminController::class, 'add_area']);
    Route::post('/admin/add_area_data', [AdminController::class, 'add_area_admin_Data']);
    Route::post('/admin/get_language', [AdminController::class, 'get_language_data']);
    
    Route::post('/admin/get_city_data/{id}', [AdminController::class, 'get_city_admin_Data']);
    Route::get('/admin/delete_city_data{id}', [AdminController::class, 'delete_admin_city_data']);

    Route::post('/admin/get_code_data/{id}', [AdminController::class, 'get_code_admin_Data']);
    
    
    Route::get('/admin/get_city', [AdminController::class, 'add_city_data']);

    Route::get('/admin/delete_area_data{id}', [AdminController::class, 'delete_admin_area_data']);
    Route::get('/admin/edit_area_data{id}', [AdminController::class, 'edit_area_admin_Data']);
    Route::post('/admin/update_area_data', [AdminController::class, 'update_area_admin_Data']);

    Route::get('/admin/add_building', [AdminController::class, 'add_building']);

    Route::get('/admin/get_all_city', [AdminController::class, 'get_all_city_admin_Data']);

    Route::post('/admin/get_city_language_data/{id}', [AdminController::class, 'get_all_city_admin_Data_ajax']);

    Route::post('/admin/get_area_data/{id}', [AdminController::class, 'get_area_admin_data']);

    
    Route::post('/admin/add_building_data', [AdminController::class, 'add_building_admin_Data']);

    Route::get('/admin/delete_building_data{id}', [AdminController::class, 'delete_admin_building_data']);
    
    Route::get('/admin/edit_building_data{id}', [AdminController::class, 'edit_admin_building_Data']);

    Route::post('/admin/update_building', [AdminController::class, 'update_building_admin_Data']);

    Route::post('/admin/get_floors/{id}', [AdminController::class, 'get_floors_data_ajax']);

    Route::get('/admin/delete_tenant{id}', [AdminController::class, 'delete_admin_tenant_data']);
    Route::get('/admin/edit_tenant{id}', [AdminController::class, 'edit_tenant_data']);
    Route::post('/admin/update_tenant', [AdminController::class, 'update_tenant_data']);

    Route::get('/admin/delete_maintenanace{id}', [AdminController::class, 'delete_maintenanace']);
    Route::get('/admin/add_payment{id}', [AdminController::class, 'add_payment_data']);
    Route::post('/admin/get_all_area_data', [AdminController::class, 'get_all_area_data']);
    Route::post('/admin/get_building_data_ajax/{id}', [AdminController::class, 'get_building_data_ajax']);

    Route::post('/admin/add_payment_data', [AdminController::class, 'add_payment_details']);

    Route::post('/admin/get_apartment_data_ajax/{id}', [AdminController::class, 'get_apartment_data_ajax']);
    
    Route::post('/admin/get_user_ajax', [AdminController::class, 'get_user_id_ajax']);
    Route::get('/admin/get_all_tenants', [AdminController::class, 'get_all_tenants_data_ajax']);

    Route::get('admin/current_month_due', [AdminController::class, 'current_month_due_data']);
    Route::get('admin/last_three_month_tenant', [AdminController::class, 'last_three_month_tenant_data']);
    
    Route::get('/admin/get_area_data_ajax/{id}', [AdminController::class, 'get_area_from_city_data_ajax']);
    Route::post('/admin/get_building_data_area_ajax', [AdminController::class, 'get_building_data_from_area_ajax']);
    Route::post('/admin/get_all_building_tenants', [AdminController::class, 'get_all_tenants_building_data_ajax']);
    Route::get('admin/tenant_payment_details{id}', [AdminController::class, 'tenant_payment_data']);
    Route::get('/admin/permission{id}', [AdminController::class, 'staff_permision']);
    Route::post('/admin/permission', [AdminController::class, 'add_staff_permission']);
    Route::post('/admin/edit_permission', [AdminController::class, 'edit_staff_permission']);

    Route::get('/admin/edit_payment/{id}', [AdminController::class, 'edit_payment_data']);
    Route::get('/admin/delete_payment/{id}', [AdminController::class, 'delete_payment_data']);

    Route::get('/admin/add_maintenance', [AdminController::class, 'add_maintenance']);    
    Route::post('/admin/add_maintenance_form', [AdminController::class, 'admin_maintenance_data']);    

    Route::post('/admin/get_apartments', [AdminController::class, 'get_apartment_from_ajax']);   
    Route::post('/admin/update_payment', [AdminController::class, 'update_payment_details']);   
    Route::get('/admin/edit_maintenanace_data/{id}', [AdminController::class, 'edit_maintenanace_details']);   
    Route::post('/admin/update_maintenance', [AdminController::class, 'update_admin_maintenance']);
    Route::post('/admin/get_users_and_floors', [AdminController::class, 'get_users_and_floors_fun']);

    
  
});


Route::get('/staff', [StaffController::class, 'index']);
Route::post('/staff/login', [StaffController::class, 'stafflogin'])->name('stafflogin');


Route::middleware(['middleware'=>'staff'])->group(function(){
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard']);
    Route::get('/staff/tenants', [StaffController::class, 'viewtenant']);
    Route::get('/staff/profile', [StaffController::class, 'staffprofile']);
    Route::get('/staff/addtenant', [StaffController::class, 'addstaffTenants']);
    Route::get('/staff/payment', [StaffController::class, 'payments']);
  
    Route::get('/staff/set_password', [StaffController::class, 'staff_set_password']);
    Route::post('/staff/change_password', [StaffController::class, 'staff_change_password']);
    Route::get('/staff/logout', [StaffController::class, 'logout']);
    Route::post('/staff/update_profile', [StaffController::class, 'update_profile']);
    Route::get('/staff/maintenance', [StaffController::class, 'staff_maintenance']);
    Route::get('/staff/add_maintenance', [StaffController::class, 'staff_add_maintenance']);
    Route::post('/staff/get_user_data/{id}', [StaffController::class, 'staff_users_data']);
    Route::post('/staff/add_maintenance_form', [StaffController::class, 'staff_users_maintenance_data']);
    Route::post('/staff/add_payment_form', [StaffController::class, 'staff_users_payment_data']);
    Route::post('/staff/get_floors/{id}', [StaffController::class, 'get_floors_data_ajax']);
    Route::post('/staff/add_tenant_staff', [staffController::class, 'add_tenant_staff_Data']);
    Route::post('/staff/get_building_data/{id}', [StaffController::class, 'get_building_data_ajax']);
    Route::get('/staff/edit_maintenance{id}', [StaffController::class, 'edit_staff_maintenance']);
    Route::post('/staff/update_maintenance', [StaffController::class, 'update_staff_maintenance']);

    Route::post('/staff/get_area_data/{id}', [AdminController::class, 'get_area_admin_data']);
    Route::get('/staff/get_all_tenants', [StaffController::class, 'get_all_tenants_data_ajax']);
    Route::get('/staff/get_all_city', [StaffController::class, 'get_all_city_admin_Data']);
    Route::get('/staff/get_area_data_ajax/{id}', [StaffController::class, 'get_area_from_city_data_ajax']);
    Route::post('/staff/get_building_data_area_ajax', [StaffController::class, 'get_building_data_from_area_ajax']);
    Route::post('/staff/get_all_building_tenants', [StaffController::class, 'get_all_tenants_building_data_ajax']);
    Route::get('/staff/tenant_payment_details{id}', [StaffController::class, 'tenant_payment_data']);
    Route::get('/staff/add_payment/{id}', [StaffController::class, 'addpayment']);
    Route::get('/staff/delete_payment/{id}', [StaffController::class, 'delete_payment_data']);
    Route::get('/staff/edit_staff_payment/{id}', [StaffController::class, 'edit_staff_payment_data']);
    Route::post('/staff/update_staff_payment', [StaffController::class, 'update_staff_payment_details']);  
    Route::get('/staff/edit_staff_tenant{id}', [StaffController::class, 'edit_tenant_data']); 
    Route::get('/staff/delete_staff_tenant{id}', [StaffController::class, 'delete_staff_tenant_data']);
    Route::post('/staff/update_tenant', [StaffController::class, 'update_staff_tenant_data']);
    Route::post('/staff/get_users_and_floors', [AdminController::class, 'get_users_and_floors_fun']);


});