<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| @Description : Application All Routes without api.
| @Author : Tarek Monjur.
| @Email  : tarekmonjur@gmail.com
|
*/



/*
 * Site Route
 */

/*************** Home Controller Routes *********************/
Route::prefix('/')->namespace('Site')->group(function(){
   Route::get('/','HomeController@index');
   Route::get('/search','HomeController@searchProducts');

   Route::get('/prescriptions','HomeController@prescriptions');
   Route::get('/prescriptions/{slug}','HomeController@prescriptionProduct');
   Route::get('/manufacturers','HomeController@manufacturerList');
   Route::get('/manufacturers/{medicine_company_slug}','HomeController@manufacturerProduct');

   Route::get('/non-prescriptions','HomeController@nonPrescriptions');
   Route::get('/non-prescriptions/manufacturers/{medicine_company_slug}','HomeController@nonPrescriptionManufacturerProduct');
   Route::get('/non-prescriptions/{slug}','HomeController@nonPrescriptionProduct');
   Route::get('/non-prescriptions/{slug}/{slug2}','HomeController@nonPrescriptionProducts');

   Route::get('/add-to-cart','CartController@addToCart');
   Route::get('/remove-to-cart/{item}','CartController@removeToCart');
   Route::get('/update-to-cart/{item_id}/{qty}','CartController@updateToCart');

   Route::get('/offers','HomeController@offers');
   Route::get('/fags','HomeController@faqs');
   Route::get('/about','HomeController@aboutUs');
   Route::get('/terms-and-conditions','HomeController@termsConditions');
});


/*************** Site Auth Routes *********************/
Route::prefix('/')->namespace('Site\Auth')->group(function(){
    //Signup Routes...
    Route::get('signup', 'RegisterController@showRegistrationForm');
    Route::post('signup', 'RegisterController@register');

    //Login Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');

    //Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Verify User Email
    Route::get('verify-email', 'LoginController@sendVerifyEmail');
    Route::get('verify-email/{token}', 'LoginController@verifyEmail');
});


/*************** Site Dashboard Controller Routes *********************/
Route::prefix('/')->namespace('Dashboard')->group(function(){
   Route::get('/dashboard','DashboardController@index');
   Route::get('/order-place','DashboardController@orderPlace');
   Route::get('/order-status/{id}','DashboardController@changeStatus');
   Route::get('/order-invoice/{id}','DashboardController@showInvoice');
   Route::get('/upload-prescription','DashboardController@showUploadPrescription');
   Route::post('/upload-prescription','DashboardController@uploadPrescription');
});



/*
 * Admin Panel Route
 */

/********** ......Admin Auth Routes....... *****************/
Route::prefix('/admin')->namespace('Admin\Auth')->group(function(){
   //Login Routes...
   Route::get('login', 'LoginController@showLoginForm')->name('login');
   Route::post('login', 'LoginController@login');
   Route::get('logout', 'LoginController@logout');

   //Password Reset Routes...
   Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
   Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
   Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm');
   Route::post('password/reset', 'ResetPasswordController@reset');
});


/********** ......Admin Dashboard Routes....... *****************/
Route::prefix('/admin')->namespace('Admin')->group(function(){
   Route::get('/','DashboardController');
});

/********** ......Orders Routes....... *****************/
Route::prefix('/orders')->namespace('Admin\Order')->group(function(){
    Route::get('/view','OrderController@index');
    Route::get('/view/{id}','OrderController@show');
    Route::get('/status/{id}/{status}','OrderController@changeStatus');
});

/********** ......Users Routes....... *****************/
Route::prefix('/users')->namespace('Admin\Order')->group(function(){
    Route::get('/view','UserController@index');
    Route::get('/add','UserController@create');
    Route::post('/add','UserController@store');
    Route::get('/edit/{id}','UserController@edit');
    Route::put('/edit/{id}','UserController@update');
    Route::get('/delete/{id}','UserController@delete');
});

/********** ......Medicine Offers Routes....... *****************/
Route::prefix('/offers')->namespace('Admin\Medicine')->group(function(){
    Route::get('/view','MedicineOfferController@index');
    Route::get('/add','MedicineOfferController@create');
    Route::post('/add','MedicineOfferController@store');
    Route::get('/edit/{id}','MedicineOfferController@edit');
    Route::put('/edit/{id}','MedicineOfferController@update');
    Route::get('/delete/{id}','MedicineOfferController@delete');
});

/********** ......Sliders Routes....... *****************/
Route::prefix('/sliders')->namespace('Admin')->group(function(){
    Route::get('/view','SliderController@index');
    Route::get('/add','SliderController@create');
    Route::post('/add','SliderController@store');
    Route::get('/edit/{id}','SliderController@edit');
    Route::put('/edit/{id}','SliderController@update');
    Route::get('/delete/{id}','SliderController@delete');
});

/********** ......Medicines Routes....... *****************/
Route::prefix('/medicines')->namespace('Admin\Medicine')->group(function(){
    Route::get('/view','MedicineController@index');
    Route::get('/add','MedicineController@create');
    Route::post('/add','MedicineController@store');
    Route::get('/edit/{id}','MedicineController@edit');
    Route::put('/edit/{id}','MedicineController@update');
    Route::get('/delete/{id}','MedicineController@delete');
});

/********** ......Medicine Type Routes....... *****************/
Route::prefix('/types')->namespace('Admin\Medicine')->group(function(){
    Route::get('/view','MedicineTypeController@index');
    Route::get('/create','MedicineTypeController@create');
    Route::post('/create','MedicineTypeController@store');
    Route::get('/edit/{id}','MedicineTypeController@edit');
    Route::put('/edit/{id}','MedicineTypeController@update');
    Route::delete('/delete/{id}','MedicineTypeController@delete');
});

/********** ......Medicine Generics Routes....... *****************/
Route::prefix('/generics')->namespace('Admin\Medicine')->group(function(){
    Route::get('/view','MedicineGenericController@index');
    Route::get('/add','MedicineGenericController@create');
    Route::post('/add','MedicineGenericController@store');
    Route::get('/edit/{id}','MedicineGenericController@edit');
    Route::put('/edit/{id}','MedicineGenericController@update');
    Route::get('/delete/{id}','MedicineGenericController@delete');
});

/********** ......Medicine Categories Routes....... *****************/
Route::prefix('/categories')->namespace('Admin\Medicine')->group(function(){
    Route::get('/view','MedicineCategoryController@index');
    Route::get('/create','MedicineCategoryController@create');
    Route::post('/create','MedicineCategoryController@store');
    Route::get('/edit/{id}','MedicineCategoryController@edit');
    Route::put('/edit/{id}','MedicineCategoryController@update');
    Route::get('/delete/{id}','MedicineCategoryController@delete');
});

/********** ......Medicines Companies Routes....... *****************/
Route::prefix('/companies')->namespace('Admin\Medicine')->group(function(){
    Route::get('/view','MedicineCompanyController@index');
    Route::get('/add','MedicineCompanyController@create');
    Route::post('/add','MedicineCompanyController@store');
    Route::get('/edit/{id}','MedicineCompanyController@edit');
    Route::put('/edit/{id}','MedicineCompanyController@update');
    Route::delete('/delete/{id}','MedicineCompanyController@delete');
});

/********** ......Roles Routes....... *****************/
Route::prefix('/roles')->namespace('Admin\Admin')->group(function(){
    Route::get('/view','RolePermissionController@index');
    Route::get('/view/{id}','RolePermissionController@show');
    Route::get('/create','RolePermissionController@create');
    Route::post('/create','RolePermissionController@store');
    Route::get('/edit/{id}','RolePermissionController@edit');
    Route::put('/edit/{id}','RolePermissionController@update');
    Route::delete('/delete/{id}','RolePermissionController@destroy');
});

/********** ......Admin Routes....... *****************/
Route::prefix('/admins')->namespace('Admin\Admin')->group(function(){
   Route::get('/view','AdminController@index');
   Route::get('/create','AdminController@create');
   Route::post('/create','AdminController@store');
   Route::get('/edit/{id}','AdminController@edit');
   Route::put('/edit/{id}','AdminController@update');
   Route::get('/delete/{id}','AdminController@delete');
});
