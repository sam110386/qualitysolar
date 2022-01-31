<?php

use App\Http\Controllers\Api\V1\Agent\LoginApiController;

Route::group(
    ['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Agent'],
    function () {
        Route::post('login', 'LoginApiController@login')->name('login');
    }
);
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Agent', 'middleware' => ['auth:api']], function () {


    // Leads
    #Route::post('leads/media', 'LeadsApiController@storeMedia')->name('leads.storeMedia');
    Route::get('leads', 'LeadsApiController@index')->middleware('approved');
    Route::get('leads/{id}', 'LeadsApiController@deatil')->middleware('approved');
    Route::post('leads/updatesurvey/{id}', 'LeadsApiController@updatesurvey')->middleware('approved');


    // Comments
    Route::apiResource('comments', 'CommentsApiController');
});
