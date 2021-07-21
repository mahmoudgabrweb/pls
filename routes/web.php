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

Route::group(['prefix' => "admin", "namespace" => "Admin"], function () {

    Route::group(['middleware' => "guest"], function () {
        Route::get('/', "AuthenticationController@login")->name("login");
        Route::post("post-login", "AuthenticationController@postLogin");
    });

    Route::group(['middleware' => "auth"], function () {

        Route::post("logout", "AuthenticationController@logout")->name("logout");

        Route::group(['middleware' => "admin.verify"], function () {
            Route::get("users/grid", "UserController@grid")->name("users.grid");
            Route::resource("users", "UserController");

            Route::get("sliders/grid", "SliderController@grid")->name("sliders.grid");
            Route::resource("sliders", "SliderController");

            Route::resource("settings", "SettingController");

            Route::get("engineers/grid", "EngineerController@grid")->name("engineers.grid");
            Route::resource("engineers", "EngineerController");

            Route::get("machines-categories/grid", "McategoryController@grid")->name("machines-categories.grid");
            Route::resource("machines-categories", "McategoryController");

            Route::get("supplies-categories/grid", "ScategoryController@grid")->name("supplies-categories.grid");
            Route::resource("supplies-categories", "ScategoryController");

            Route::get("materials-categories/grid", "RcategoryController@grid")->name("materials-categories.grid");
            Route::resource("materials-categories", "RcategoryController");

            Route::get("types/grid", "TypeController@grid")->name("types.grid");
            Route::resource("types", "TypeController");

        });

        Route::get("machines/grid", "MachineController@grid")->name("machines.grid");
        Route::resource("machines", "MachineController");

        Route::get("materials/grid", "MaterialController@grid")->name("materials.grid");
        Route::resource("materials", "MaterialController");

        Route::get("supplies/grid", "SupplyController@grid")->name("supplies.grid");
        Route::resource("supplies", "SupplyController");
    });
});

Route::group(['namespace' => "Front"], function () {
    Route::get("/", "HomeController@index");

    Route::get("materials", "MaterialController@index");
    Route::get("materials/{slug}", "MaterialController@show");

    Route::get("engineers", "HomeController@engineers");
});
