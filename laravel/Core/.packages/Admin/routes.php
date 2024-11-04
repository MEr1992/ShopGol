<?php

use Illuminate\Support\Facades\Route;

Route::get('/user',"Auth\UserInfo@getInfo");
Route::post('/login',"Auth\AuthenticatedController@store");
Route::post('/logout',"Auth\AuthenticatedController@destroy");

Route::get('/langs',function(){
    \App::setLocale("fa");
    $objects = [
        "public"=>\Lang::get("AdminLang::public"),
        'local'=>\Config::get("app.locale"),
        'langs'=> \Models\Base\Language::where('status_id', 1)->get()];
    return response()->json($objects);
});

// ================ Start Routes Uploads =======================================
Route::post('tinyUpload/{dir}', 'Public\Upload@tinyUpload');
Route::post('upload/{dir}', 'Public\Upload@uploadFile');
Route::post('ckupload/{dir}', 'Public\Upload@ckUpload');
Route::get('deleteFile/{dir}/{file}', 'Public\Upload@deleteFile');
// ================ End Routes Uploads ==========================================

// ================ Start Routes Base ===========================================
Route::get('/home', 'Base\HomeController@home');
Route::resource("keywords","Base\KeywordController");
// ================ End Routes Base =============================================

// ================ Start Routes Users ==========================================
Route::get("users/change-status/get-needles", "Person\UserController@changeRoleGetNeedles");
Route::post("users/change-status/{id}", "Person\UserController@changeRole");
Route::put("users/change-password", "Person\UserController@changePassword");

Route::get("users/show-info/{id}", "Person\UserController@showInfo");
Route::get("users/get-needles", "Person\UserController@getNeedles");
Route::resource("users", "Person\UserController");
Route::resource("personnels", "Person\PersonnelController");

Route::resource("roles", "Person\RoleController");
// ================ End Routes Users =============================================

// ================ Start Routes Content =========================================
Route::resource("blogs","Content\BlogController");
Route::resource("blog-subjects","Content\BlogSubjectController");
// ================ End Routes Content ===========================================

// ================ Start Routes Product =========================================
Route::resource("products","Product\ProductController");
Route::resource("categories","Product\ProductCategoryController");
Route::resource("brands","Product\ProductBrandController");
Route::resource("lines","Product\ProductLineController");
// ================ End Routes Product ===========================================

use Faker\Generator;

Route::get('/faker-locale', function (Generator $faker) {
    return $faker->locale;
});
