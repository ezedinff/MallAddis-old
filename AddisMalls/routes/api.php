<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('sponsors', 'App\\Api\\V1\\Controllers\\SponsorController@getSponsors');
    $api->get('topmalls', 'App\\Api\\V1\\Controllers\\MallController@getTopMall');
    $api->get('mallsdetail', 'App\\Api\\V1\\Controllers\\MallController@getMallDetails');
    $api->get('getcategory', 'App\\Api\\V1\\Controllers\\MallController@getCategoryInMall');
    $api->get('getserviceproviders', 'App\\Api\\V1\\Controllers\\MallController@getServiceProviders');
    $api->get('topsellersitem', 'App\\Api\\V1\\Controllers\\ServiceProviderController@getTopSellersItem');
    $api->get('topsellersdetail', 'App\\Api\\V1\\Controllers\\ServiceProviderController@getTopSellersDetail');
    $api->get('show_retailers','App\\Api\\V1\\Controllers\\MallController@show_retailers');
    $api->get('topsellers', 'App\\Api\\V1\\Controllers\\ServiceProviderController@getTopSellers');
    $api->get('categories', 'App\\Api\\V1\\Controllers\\CategoryController@getCategories');
    $api->get("about_mall","App\\Api\\V1\\Controllers\\MallController@about_mall");
    $api->get('amenities','App\\Api\\V1\\Controllers\\MallController@amenities');
    $api->get('events','App\\Api\\V1\\Controllers\\EventController@getEvents');
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('checkverification','App\\Api\\V1\\Controllers\\UsersController@checkVerification');
        $api->post('upload_mall_photo','App\\Api\\V1\\Controllers\\UsersController@upload_mall_photo');
        $api->get('checkmall_photo_uploaded_and_address_addess','App\\Api\\V1\\Controllers\\UsersController@checkMallPhotoAndAddress');
        $api->post('add_address','App\\Api\\V1\\Controllers\\AddressController@update_address');
        $api->get('users_detail','App\\Api\\V1\\Controllers\\UsersController@users_detail');
        $api->get('mall_request','App\\Api\\V1\\Controllers\\UsersController@mall_request');
        $api->post('allow_request','App\\Api\\V1\\Controllers\\UsersController@allow_request');
        $api->post('add_new_retailers','App\\Api\\V1\\Controllers\\ServiceProviderController@add_new_retailer');
        $api->get('checkmallphoto','App\\Api\\V1\\Controllers\\PhotoController@checkMallPhoto');
        $api->get('mallusersdetail','App\\Api\\V1\\Controllers\\UsersController@checkMallPhoto');

        $api->get('mall_owner','App\\Api\\V1\\Controllers\\ServiceProviderController@get_mall_owner');
        $api->get('get_categories','App\\Api\\V1\\Controllers\\CategoryController@getCategories');
        $api->post('complete_profile','App\\Api\\V1\\Controllers\\ServiceProviderController@complete_profile');
        $api->get('check_retailer_profile_completion','App\\Api\\V1\\Controllers\\ServiceProviderController@check_profile_completion');

        $api->get('get_demand_and_supply','App\\Api\\V1\\Controllers\\DemandController@get_demand_and_supply');
        $api->post('upload_demand','App\\Api\\V1\\Controllers\\DemandController@upload_demand');
        $api->post('upload_supply','App\\Api\\V1\\Controllers\\SupplyController@upload_supply');
        $api->get("get_res_item","App\\Api\\V1\\Controllers\\SubSupplierCategoryController@get_items");
        $api->post("get_selected_item_detail","App\\Api\\V1\\Controllers\\SubSupplierCategoryController@items_detail");
        $api->post("send_demand","App\\Api\\V1\\Controllers\\DailyDemandController@add_demand");
       $api->get('manage_demand',"App\\Api\\V1\\Controllers\\DailyDemandController@manage_demand");
       $api->post("post_dish","App\\Api\\V1\\Controllers\\DisheController@post_dish");
       $api->get("get_my_dish_list","App\\Api\\V1\\Controllers\\DisheController@get_my_dish_list");
       $api->post("upload_menu_image","App\\Api\\V1\\Controllers\\MenuController@upload_menu");
       $api->get("get_menu_image","App\\Api\\V1\\Controllers\\MenuController@get_menu_image");

       $api->get("suppliers_info","App\\Api\\V1\\Controllers\\SupplierController@get_supplier_info");
       $api->get("get_suppliers_item","App\\Api\\V1\\Controllers\\SupplierController@get_supplier_item");
       $api->get("get_suppliers_daily_demand_request","App\\Api\\V1\\Controllers\\SupplierController@get_demand_request");
       $api->get("update_daily_demand","App\\Api\\V1\\Controllers\\DailyDemandController@update_demand");

       $api->post('post_new_item','App\\Api\\V1\\Controllers\\PostAdsController@post_new_item');
       $api->get("get_my_posted_item",'App\\Api\\V1\\Controllers\\PostAdsController@get_posted_item');

       $api->get('get_retailers','App\\Api\\V1\\Controllers\\ServiceProviderController@get_retailers');

       $api->post("post_lease_space","App\\Api\\V1\\Controllers\\SpaceController@post_lease_space");
       $api->get('get_lease_space','App\\Api\\V1\\Controllers\\SpaceController@get_lease_space');
    });


});
