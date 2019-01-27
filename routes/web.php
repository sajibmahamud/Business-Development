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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'FrontController@index');
Route::get('/feedback', 'FrontController@feedback');


//=============================================================================================
//..............................Admin Backend Controller.......................................
//=============================================================================================
Route::get('/admin_backend', 'AdminController@index');
Route::get('/dashboard', 'SuperController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SuperController@logout');
Route::get('/all-order', 'OrderController@all_order');
Route::get('/send-order', 'AdminController@send_order');
Route::get('/review-order/{o_id}', 'OrderController@review_order');
Route::get('/reject-order/{o_id}', 'OrderController@reject_order');
Route::get('/admin-manage', 'AdminController@manage');
Route::get('/soil_admin', 'SoilAdminController@index');
//................................END CONTROLLER........................................
//=============================================================================================



//=============================================================================================
//........................Customer login registration Routes...................................
//=============================================================================================
Route::post('/customer-registration', 'CustomerController@customer_registration');
Route::get('/customer-logout', 'CustomerController@customer_logout');
Route::get('/login', 'CustomerController@login');
Route::get('/registration', 'CustomerController@registration');
Route::post('/customer-login', 'CustomerController@customer_login');
//................................END CONTROLLER........................................
//=============================================================================================



//=============================================================================================
//........................Customer login registration Routes...................................
//=============================================================================================

Route::get('/services', 'OrderController@index');
Route::post('/save-order', 'OrderController@save_order');
//................................END CONTROLLER........................................
//=============================================================================================


Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
Route::get('/dynamic_pdf/pdf_view', 'DynamicPDFController@pdf_view');
Route::post('/review-govt-office', 'ReviewController@review_govt_office');
Route::post('/confirm', 'ReviewController@confirm_message');
//=============================================================================================
//..............................Soil Backend Controller.......................................
//=============================================================================================
Route::get('/soil_admin', 'SoilAdminController@index');
Route::post('/soil-login', 'SoilAdminController@soil_login');
Route::get('/soil-dashboard', 'SoilAdminController@soil_dashboard');
Route::get('/soil-logout', 'SoilAdminController@soil_logout');
Route::get('/all-soil-review', 'SoilAdminController@all_order');
Route::get('/soil-confirm-order/{o_id}', 'SoilAdminController@confirm');
Route::get('/soil-manage', 'SoilAdminController@manage');
Route::post('/soil-confirm', 'SoilAdminController@confirm_message');

//................................END CONTROLLER........................................
//=============================================================================================

//=============================================================================================
//..............................Gass Backend Controller.......................................
//=============================================================================================
Route::get('/gass_admin', 'GassAdminController@index');
Route::post('/gass-login', 'GassAdminController@gass_login');
Route::get('/gass-dashboard', 'GassAdminController@gass_dashboard');
Route::get('/gass-logout', 'GassAdminController@gass_logout');
Route::get('/all-gass-review', 'GassAdminController@all_order');
Route::get('/gass-confirm-order/{o_id}', 'GassAdminController@confirm');
Route::get('/gass-manage', 'GassAdminController@manage');
Route::post('/gass-confirm', 'GassAdminController@confirm_message');
//................................END CONTROLLER........................................
//=============================================================================================


//=============================================================================================
//..............................Land Backend Controller.......................................
//=============================================================================================
Route::get('/land-admin', 'LandAdminController@index');
Route::post('/land-login', 'LandAdminController@land_login');
Route::get('/land-dashboard', 'LandAdminController@land_dashboard');
Route::get('/land-logout', 'LandAdminController@land_logout');
Route::get('/all-land-review', 'LandAdminController@all_order');
Route::get('/land-confirm-order/{o_id}', 'LandAdminController@confirm');
Route::get('/land-manage', 'LandAdminController@manage');
Route::post('/land-confirm', 'LandAdminController@confirm_message');
//................................END CONTROLLER........................................
//=============================================================================================


//=============================================================================================
//..............................Tax Backend Controller.......................................
//=============================================================================================
Route::get('/tax-admin', 'TaxAdminController@index');
Route::post('/tax-login', 'TaxAdminController@tax_login');
Route::get('/tax-dashboard', 'TaxAdminController@tax_dashboard');
Route::get('/tax-logout', 'TaxAdminController@tax_logout');
Route::get('/all-tax-review', 'TaxAdminController@all_order');
Route::get('/tax-confirm-order/{o_id}', 'TaxAdminController@confirm');
Route::get('/tax-manage', 'TaxAdminController@manage');
Route::post('/tax-confirm', 'TaxAdminController@confirm_message');
//................................END CONTROLLER........................................
//=============================================================================================


//=============================================================================================
//..............................Tax Backend Controller.......................................
//=============================================================================================
Route::get('water-admin', 'WaterAdminController@index');
Route::post('water-login', 'WaterAdminController@water_login');
Route::get('water-dashboard', 'WaterAdminController@water_dashboard');
Route::get('water-logout', 'WaterAdminController@water_logout');
Route::get('/all-water-review', 'WaterAdminController@all_order');
Route::get('/water-confirm-order/{o_id}', 'WaterAdminController@confirm');
Route::get('/manage', 'WaterAdminController@manage');
Route::post('/water-confirm', 'WaterAdminController@confirm_message');

//................................END CONTROLLER........................................
//=============================================================================================


