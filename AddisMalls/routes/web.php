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

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
{
    // implement your reset password route here!
}]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/show/{mall_id}/retailersByCategory/{id}/',"ServiceProviderController@showSpBy");
Route::get('/show/mall/{mall}',"MallController@show");
Route::get('/show/cafe/{sp}',"ServiceProviderController@showCafe");
Route::get('/show/cafe/dish/{sp}',"DishController@showDish");
Route::get('/show/cafe/menu/{sp}',"MenuController@showMenu");
Route::get('/show/cafe/ambience/{sp}',"AmbienceController@showAmbience");
Route::get('/show/sp/{mall}',"ServiceProviderController@showSp");
Route::get('/show/malls',"MallController@index");
Route::get('/show/retailer/{retailers}',"ServiceProviderController@show");
Route::get('/show/cafe_and_restaurants',"ServiceProviderController@showCafeRestans");
Route::get('/show/lease/{mall}', 'SpaceController@showSpaceInsideMall');
Route::get('/show/jobs', 'VacancyController@showVacancy');
Route::get('/show/job/{job}', 'VacancyController@showVacancySpec');

Route::post('/register','MallController@store');
Route::get('/register','MallController@showRegistrationForm');
Route::post('/login','CustomLoginController@user_login');
Route::get('/login','MallController@showLoginForm');


Route::get('/home', 'HomeController@index');
Route::get('/mall/createService','ServiceProviderController@showCreateServiceProvider');
Route::get('/mall/sp_remove/{sp}','ServiceProviderController@destroy');
Route::get('/mall/addSlide','SlideController@index');
Route::get('/mall/addLogo','PhotoController@showAddLogoForm');
Route::post('/mall/addLogo','PhotoController@addLogo');
Route::post('/mall/addSlide','SlideController@store');
Route::post('/addService','ServiceProviderController@store');
Route::get('/mall/addLeaseSpace','SpaceController@create');
Route::get('/mall/showLeaseSpaces','SpaceController@index');
Route::get('/mall/space_edit/{space}','SpaceController@edit');
Route::post('/mall/space_edit/{space}','SpaceController@update');
Route::get('/mall/space_remove/{space}','SpaceController@destroy');
Route::get('/mall/tenants','ServiceProviderController@showTenants');
Route::post('/mall/addLeaseSpace','SpaceController@store');
Route::get('/mall/addCover','PhotoController@showAddCoverFormMall');
Route::post('/mall/addCover','PhotoController@storeCover');
Route::get('/mall/wait_to_be_verified','MallController@unverfied');
Route::get('/mall/vacancy','VacancyController@index');
Route::get('/mall/addVacancy','VacancyController@create');
Route::post('/mall/addVacancy','VacancyController@store');
Route::get('/mall/tenantDetail/{sp}','TenantDetailController@create');
Route::post('/mall/tenantDetail/{sp}','TenantDetailController@store');
Route::get('/mall/tenantDetailShow/{tenantDetail}','TenantDetailController@show');
Route::get('/mall/updateTenantDetail/{sp}','TenantDetailController@edit');
Route::post('/mall/updateTenantDetail/{tenantDetail}','TenantDetailController@update');
Route::get('/mall/showAmenities','AmenityController@show');
Route::get('/mall/addAmenity','AmenityController@create');
Route::post('/mall/addAmenity','AmenityController@store');


Route::post('/sp/addDetails','ServiceProviderController@update');
Route::get('/sp/addDetails','ServiceProviderController@index');
Route::get('/sp/dashboard','ServiceProviderController@dashboard');
Route::post('/sp/addProducts','PostAdsController@store');
Route::get('/sp/addProducts','PostAdsController@index');
Route::get('/sp/products','PostAdsController@productList');
Route::get('/sp/addSupply','SupplyController@create');
Route::post('/sp/addSupply','SupplyController@store');
Route::get('/sp/supply','SupplyController@index');
Route::get('/sp/allSupplies','SupplyController@allSupply');
Route::get('/sp/addDemand','DemandController@create');
Route::post('/sp/addDemand','DemandController@store');
Route::get('/sp/demands','DemandController@index');
Route::get('/sp/allDemands','DemandController@allDemand');
Route::get('/sp/addLogo','PhotoController@showAddLogoFormSp');
Route::get('/sp/addCover','PhotoController@showAddCoverFormSp');
Route::post('/sp/addCover','PhotoController@storeCover');
Route::post('/sp/addLogo','PhotoController@addLogo'); //correction
Route::get('/sp/addSlide','SlideController@index');
Route::post('/sp/addSlide','PhotoController@addSpSlide');
Route::get('/sp/addUser','UserController@create');
Route::post('/sp/addUser','UserController@store');
Route::get('/sp/users','UserController@index');
Route::get('/sp/vacancy','VacancyController@index');
Route::get('/sp/addVacancy','VacancyController@create');
Route::post('/sp/addVacancy','VacancyController@store');




Route::get('/admin/dashboard','AdminController@index');
Route::get('/admin/addSupplier','SupplierController@create');
Route::post('/admin/addSupplier','SupplierController@store');
Route::get('/admin/addSupplierCategory','SupplierCateController@create');
Route::post('/admin/addSupplierCategory','SupplierCateController@store');
Route::get('/admin/addSubSupplierCategory','SubSupplierCategoryController@create');
Route::post('/admin/addSubSupplierCategory','SubSupplierCategoryController@store');
Route::get('/admin/malls','MallController@showMallsAdmin');
Route::get('/admin/mall_verify/{company_id}','MallController@verifyMall');

Route::get('/admin/mall_reject/{company_id}','MallController@rejectMall'); //new
Route::get('/admin/mall_edit/{mall}','MallController@edit');
Route::get('/admin/mall_remove/{mall}','MallController@destroy');

Route::post('/admin/update_mall_detail/{mall}','MallController@update');
Route::post('/admin/update_mall_location/{mall}','MallController@updateLocation');

Route::get('/supplier/dashboard','SupplierController@index');
Route::get('/supplier/demand/{id}','SupplierController@showDailyDemand');



Route::get('/cafe/dashboard','ServiceProviderController@cafeDashboard');
Route::get('/cafe/addDemand','DailyDemandController@create');
Route::post('/cafe/addDemand','DailyDemandController@store');
Route::get('/cafe/brandDetail','DailyDemandController@brandDetail');
Route::get('/cafe/openingHour','OpeningHourController@create'); //fine
Route::post('/cafe/openingHour','OpeningHourController@store');
Route::get('/cafe/menu','MenuController@index'); //fine
Route::get('/cafe/addMenu','MenuController@create');
Route::post('/cafe/addMenu','MenuController@store');
Route::get('/cafe/dishes','DishController@index'); //fine
Route::get('/cafe/addDishes','DishController@create');
Route::post('/cafe/addDishes','DishController@store');
Route::get('/cafe/ambience','AmbienceController@index'); //fine
Route::get('/cafe/addAmbience','AmbienceController@create');
Route::post('/cafe/addAmbience','AmbienceController@store');
Route::get('/cafe/demands','DailyDemandController@index'); //fine
Route::get('/cafe/addDemand','DailyDemandController@create');
Route::post('/cafe/addDemand','DailyDemandController@store');

Route::get('/cafe/addCover','PhotoController@create');
Route::post('/cafe/addCover','PhotoController@storeCover');

Route::get('/cafe/addLogo','PhotoController@showAddLogoFormCafe');//fine
Route::post('/cafe/addLogo','PhotoController@addLogo');
Route::get('/cafe/addSlide','SlideController@index');//
Route::post('/cafe/addSlide','PhotoController@addSpSlide');

Route::get('/cafe/users','UserController@index');
Route::get('/cafe/addUser','UserController@create');
Route::post('/cafe/addUser','UserController@store');
Route::get('/cafe/vacancy','VacancyController@index');
Route::get('/cafe/addVacancy','VacancyController@create');
Route::post('/cafe/addVacancy','VacancyController@store');
