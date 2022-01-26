<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', 'HomeController@index');
Route::get('/compare', 'HomeController@compare');
Route::get('/save-tax', 'HomeController@tax');
Route::get('/about-us', 'HomeController@about');
Route::get('/privacy-policy', 'HomeController@privacypolicy')->name('privacy-policy');
Route::get('/terms-of-use', 'HomeController@termsofuse')->name('terms-of-use');
Route::get('/glossary', 'HomeController@glossary');
Route::get('/career', 'HomeController@career');
Route::get('/quote', 'QuoteController@index')->name('quote');
Route::match(['get', 'post'], '/quotestart', 'QuoteController@quotestart')->name('quotestart');
Route::post('/residential', 'QuoteController@residential')->name('residential');
Route::post('/commercial', 'QuoteController@commercial')->name('commercial');
Route::get('/thankyou', 'QuoteController@thankyou')->name('thankyou');

/*Route::get('/home', function () {
    $route = Gate::denies('dashboard_access') ? 'admin.leads.index' : 'admin.home';
    if (session('status')) {
        return redirect()->route($route)->with('status', session('status'));
    }

    return redirect()->route($route);
});*/

Auth::routes(['register' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dealer.completeprofile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Dealer end routes
Route::group(
    ['prefix' => 'dealer', 'as' => 'dealer.', 'namespace' => 'Dealer', 'middleware' => ['auth', 'verified'/*, 'approved'*/]],
    function () {
        Route::get('completeprofile', 'HomeController@completeprofile')->name('completeprofile');
        Route::post('completeprofilesave', 'HomeController@completeprofilesave')->name('completeprofile_save');
        Route::get('thank-you', 'HomeController@thankyou')->name('thank-you');
        //profile pages
        Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('approved');
        // Leads
        Route::get('leads/accepted', 'LeadsController@accepted')->name('leads.accepted')->middleware('approved');

        Route::get('leads/active', 'LeadsController@active')->name('leads.active')->middleware('approved');
        Route::get('leads/complete', 'LeadsController@complete')->name('leads.complete')->middleware('approved');
        Route::get('leads/accept/{id}', 'LeadsController@accept')->name('leads.accept')->middleware('approved');
        Route::get('leads/display/{id}', 'LeadsController@display')->name('leads.display')->middleware('approved');
        Route::get('leads/reject/{id}', 'LeadsController@reject')->name('leads.reject')->middleware('approved');
        Route::get('leads/activate/{id}', 'LeadsController@activate')->name('leads.activate')->middleware('approved');

        Route::post('leads/assignagent', 'LeadsController@assignagent')->name('leads.assignagent')->middleware('approved');

        Route::get('leads/completelead/{id}', 'LeadsController@completelead')->name('leads.completelead')->middleware('approved');
        Route::post('leads/permitupdate/{id}', 'LeadsController@permitupdate')->name('leads.permitupdate')->middleware('approved');
        Route::post('leads/surveyupdate/{id}', 'LeadsController@surveyupdate')->name('leads.surveyupdate')->middleware('approved');



        Route::delete('leads/destroy', 'LeadsController@massDestroy')->name('leads.massDestroy')->middleware('approved');
        Route::post('leads/media', 'LeadsController@storeMedia')->name('leads.storeMedia')->middleware('approved');
        Route::post('leads/comment/{lead}', 'LeadsController@storeComment')->name('leads.storeComment')->middleware('approved');
        Route::resource('leads', 'LeadsController')->middleware('approved');
        //Agents Pages
        Route::delete('agents/destroy', 'AgentsController@massDestroy')->name('agents.massDestroy')->middleware('approved');;
        Route::get('agents/status/{user}/{status}', 'AgentsController@status')->name('agents.status')->middleware('approved');;
        Route::get('agents/verify/{user}/{status}', 'AgentsController@verify')->name('agents.verify')->middleware('approved');;

        Route::resource('agents', 'AgentsController')->middleware('approved');;
    }
);
/*
Route::post('leads/media', 'LeadController@storeMedia')->name('leads.storeMedia');
Route::post('leads/comment/{lead}', 'LeadController@storeComment')->name('leads.storeComment');
Route::resource('leads', 'LeadController')->only(['show', 'create', 'store']);
*/
//Admin end routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'adminauth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::get('users/status/{user}/{status}', 'UsersController@status')->name('users.status');
    Route::get('users/verify/{user}/{status}', 'UsersController@verify')->name('users.verify');

    Route::resource('users', 'UsersController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusesController');

    // Priorities
    Route::delete('priorities/destroy', 'PrioritiesController@massDestroy')->name('priorities.massDestroy');
    Route::resource('priorities', 'PrioritiesController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Leads
    Route::get('leads/assigned', 'LeadsController@assigned')->name('leads.assigned');

    Route::get('leads/accepted', 'LeadsController@accepted')->name('leads.accepted');
    Route::get('leads/rejected', 'LeadsController@rejected')->name('leads.rejected');

    Route::get('leads/active', 'LeadsController@active')->name('leads.active');
    Route::get('leads/completed', 'LeadsController@completed')->name('leads.completed');
    Route::get('leads/canceled', 'LeadsController@canceled')->name('leads.canceled');
    Route::post('leads/assignvendor', 'LeadsController@assignvendor')->name('leads.assignvendor');
    Route::post('leads/updatelead/{id}', 'LeadsController@updatelead')->name('leads.updatelead');
    Route::post('leads/permitupdate/{id}', 'LeadsController@permitupdate')->name('leads.permitupdate');
    Route::post('leads/surveyupdate/{id}', 'LeadsController@surveyupdate')->name('leads.surveyupdate');
    //create new lead
    Route::get('leads/createresidential', 'LeadsController@createresidential')->name('leads.createresidential');
    Route::get('leads/createcomercial', 'LeadsController@createcomercial')->name('leads.createcomercial');
    Route::post('leads/saveresidential', 'LeadsController@saveresidential')->name('leads.saveresidential');
    Route::post('leads/savecomercial', 'LeadsController@savecomercial')->name('leads.savecomercial');


    Route::delete('leads/destroy', 'LeadsController@massDestroy')->name('leads.massDestroy');
    Route::post('leads/media', 'LeadsController@storeMedia')->name('leads.storeMedia');
    Route::post('leads/comment/{lead}', 'LeadsController@storeComment')->name('leads.storeComment');
    Route::resource('leads', 'LeadsController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
