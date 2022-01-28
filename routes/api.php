<?php

use App\Http\Controllers\Api\V1\Agent\LoginApiController;

Route::group(
    ['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Agent'],
    function () {
        Route::post('login', 'LoginApiController@login')->name('login');
    }
);
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Agent', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Statuses
    Route::apiResource('statuses', 'StatusesApiController');

    // Priorities
    Route::apiResource('priorities', 'PrioritiesApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Leads
    Route::post('leads/media', 'LeadsApiController@storeMedia')->name('leads.storeMedia');
    Route::apiResource('leads', 'LeadsApiController');

    // Comments
    Route::apiResource('comments', 'CommentsApiController');
});
