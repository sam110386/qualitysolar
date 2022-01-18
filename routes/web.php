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

Route::group(
    ['prefix' => 'dealer', 'as' => 'dealer.', 'namespace' => 'Dealer', 'middleware' => ['auth', 'verified']],
    function () {
        Route::get('completeprofile', 'HomeController@completeprofile')->name('completeprofile');
        Route::get('completeprofilesave', 'HomeController@completeprofilesave')->name('completeprofile_save');
    }
);
Route::post('leads/media', 'LeadController@storeMedia')->name('leads.storeMedia');
Route::post('leads/comment/{lead}', 'LeadController@storeComment')->name('leads.storeComment');
Route::resource('leads', 'LeadController')->only(['show', 'create', 'store']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
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
