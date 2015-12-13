<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::get('/chatkaset','forumsController@index');
Route::get('/officer','OfficerController@index');
Route::post('/officer/addCommunity/commit','OfficerController@officerPostAddCommunity');
Route::post('/officer/addPlan/commit','apiv1_0\PlaceApiController@new_plan_crop');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/getUserProfile/{user_id}','Auth\Profile@ProfileUser');
Route::get('auth/profile','Auth\Profile@getCreateProfile');
Route::post('auth/profile/commit','Auth\Profile@postCreateProfile');
Route::get('auth/changeprofile','Auth\Profile@getChangeprofile');
Route::post('auth/changeprofile/commit','Auth\Profile@postChangeprofile');
Route::post('auth/officer/addProfile/commit','Auth\Profile@officerPostCreateProfile');
Route::post('checkUsername','apiv1_0\AuthApiController@checkUsername');
Route::post('auth/chowkaset/postLogin','Auth\AuthController@postLogin');
Route::post('auth/chowkaset/postRegister','Auth\AuthController@postRegister');

Route::group(array('prefix' => '/api/v1.0'), function()
    {
    //น้าหลัก API Refference
    	Route::get('/','apiv1_0\ApiController@refference_one_zero');

    //ข้อมูล Authen
        Route::resource('Auth', 'apiv1_0\AuthApiController');
        //เรียก Token จากระบบ
        Route::get('getToken','apiv1_0\AuthApiController@getToken');
        //เบอร์โทรของเจ้าของแปลง
        Route::get('Profiles/phone_profile/{profile_id}','apiv1_0\CropsApiController@phone_profile');
        //อีเมล์ของเจ้าของแปลง
        Route::get('Profiles/email_profile/{profile_id}','apiv1_0\CropsApiController@email_profile');
        //เฟสบุ้กของเจ้าของแปลง
        Route::get('Profiles/facebook_profile/{profile_id}','apiv1_0\CropsApiController@facebook_profile');

        Route::get('aumphur/{province_id}','apiv1_0\PlaceApiController@aumphur');
        Route::get('district/{aumphur}','apiv1_0\PlaceApiController@district');
        Route::get('farmercomunity','apiv1_0\PlaceApiController@farmercomunity');

    //Officer
        //เกษตรกร
        Route::get('kaset_in_province/{province}','apiv1_0\PlaceApiController@kaset_in_province');
        Route::get('kaset_in_district/{aumphur}','apiv1_0\PlaceApiController@kaset_in_district');
        Route::get('kaset_in_aumphur/{aumphur}','apiv1_0\PlaceApiController@kaset_in_aumphur');
        //ชุมชน
        Route::get('com_in_province/{province}','apiv1_0\PlaceApiController@com_in_province');
        Route::get('com_in_district/{aumphur}','apiv1_0\PlaceApiController@com_in_district');
        Route::get('com_in_aumphur/{aumphur}','apiv1_0\PlaceApiController@com_in_aumphur');
        Route::get('getCommunityProfile/{com_id}','apiv1_0\PlaceApiController@getCommunityProfile');
        //แผน
        Route::get('plan_in_seed/{seed}','apiv1_0\PlaceApiController@plan_in_seed');
        Route::get('plan_in_breed/{breed}','apiv1_0\PlaceApiController@plan_in_breed');
        Route::get('plan/{plan_id}','apiv1_0\PlaceApiController@get_plan_crop');
    //Crop
        //ดูข้อมูลการเพาะปลูก
        Route::get('Crop/mapdetail/{id}','apiv1_0\CropsApiController@map_detail');
        //เพิ่มพื้นที่ปลูก
        Route::post('Crop/new_crop','apiv1_0\CropsApiController@new_crop');
        //พื้นที่ปลูกของ User
        Route::get('Crop/getCropsOfUser/{user_id}','apiv1_0\CropsApiController@crops_list');
        Route::get('Crop/getPlansOfUserDetailList/{crop_id}','apiv1_0\PlaceApiController@get_plan_crop_user');
        //สถืตืการเพาะปลุกทั้งหมด
        Route::get('Crop/getCropsOfUserDetailList/{user_id}','apiv1_0\CropsApiController@crops_detail_list');
        //ชนิดพืช วางไว้คือ ทั้งหมด หากไส่ จะเป็น id
        Route::get('Crop/getSeedAll','apiv1_0\CropsApiController@seeds_all_list');
        Route::get('Crop/getSeed/{seed_id}','apiv1_0\CropsApiController@seeds_list');
        //พันธ์พืชจากชนิด Seeds
        Route::get('Crop/getBreedOfSeed/{seed_id}','apiv1_0\CropsApiController@breed_list');
        //ข้อมูลรายรับ,รายจ่าย
        Route::get('Crop/getAccountCrop/{crop_id}','apiv1_0\CropsApiController@getAccountData');
        //เพิ่มรายรับ,รายจ่าย
        Route::post('Crop/AddAccountData','apiv1_0\CropsApiController@AddAccountData');
        //ลบรายรับ,รายจ่าย
        Route::delete('Crop/DeleteAccountData','apiv1_0\CropsApiController@DeleteAccountData');
        //แก้ใขรายรับ,รายจ่าย
        Route::put('Crop/EditAccountData','apiv1_0\CropsApiController@EditAccountData');
        //ข้อมูลปัญหาการเพาะปลูก
        Route::get('Crop/getProblemCrop/{crop_id}','apiv1_0\CropsApiController@getProblemData');
        //เพิ่มปัญหาการเพาะปลูก
        Route::post('Crop/AddProblemData','apiv1_0\CropsApiController@AddProblemData');
        //ลบรายรับ,รายจ่าย
        Route::delete('Crop/DeleteProblemData','apiv1_0\CropsApiController@DeleteProblemData');
        //แก้ใขรายรับ,รายจ่าย
        Route::put('Crop/EditProblemData','apiv1_0\CropsApiController@EditProblemData');

    });
