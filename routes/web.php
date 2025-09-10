<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CertificateController;


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

Route::get('/', [PagesController::class,'index']);
Route::get('/about-us', [PagesController::class,'about']);
Route::get('/anti-corruption', [PagesController::class,'anti_corruption']);
Route::get('/economic-governance', [PagesController::class,'economic_governance']);
Route::get('/asset-monitoring', [PagesController::class,'asset_monitoring']);
Route::get('/citizen-right', [PagesController::class,'citizen_right']);
Route::get('/public-complaint', [PagesController::class,'public_complaint']);
Route::get('/mission-vision', [PagesController::class,'mission_vision']);
Route::get('/managements', [PagesController::class,'management']);
Route::get('/latest-news', [PagesController::class,'news']);
Route::get('/latest-news/{id}', [PagesController::class,'news_detail']);
Route::get('/contact-us', [PagesController::class,'contact']);

//API CALLS
Route::get('get_rank/{id}',[RankController::class,'get_ranks']);
Route::get('get_local/{id}',[LocalController::class,'get_locals']);

Route::get('login', function () {
    return view('auth.login');
});
Auth::routes();

//Route::group(['middleware' => ['role:super-admin']], function(){

//});

Route::get('/home', [HomeController::class, 'index'])->name('home');

//About
Route::resource('abouts', App\Http\Controllers\AboutController::class);
Route::get('abouts/{id}/delete', [App\Http\Controllers\AboutController::class,'destroy']);

//News
Route::resource('news', App\Http\Controllers\NewsController::class);
Route::get('news/{id}/delete', [App\Http\Controllers\NewsController::class,'destroy']);

//News Categories
Route::resource('categories', App\Http\Controllers\NewsCategoryController::class);
Route::get('categories/{id}/delete', [App\Http\Controllers\NewsCategoryController::class,'destroy']);

//Partners
Route::resource('partners', App\Http\Controllers\PartnerController::class);
Route::get('partners/{id}/delete', [App\Http\Controllers\PartnerController::class,'destroy']);

//Gallery
Route::resource('galleries', App\Http\Controllers\GalleryController::class);
Route::get('galleries/{id}/delete', [App\Http\Controllers\GalleryController::class,'destroy']);

//Services
Route::resource('services', App\Http\Controllers\ServiceController::class);
Route::get('services/{id}/delete', [App\Http\Controllers\ServiceController::class,'destroy']);

//Sliders
Route::resource('sliders', App\Http\Controllers\SliderController::class);
Route::get('sliders/{id}/delete', [App\Http\Controllers\SliderController::class,'destroy']);

//Settings
Route::resource('settings', App\Http\Controllers\SettingController::class);
Route::get('settings/{id}/delete', [App\Http\Controllers\SettingController::class,'destroy']);
Route::get('settings/toggle/{setting}', [App\Http\Controllers\SettingController::class,'toggle']);

//Team
Route::resource('teams', App\Http\Controllers\TeamController::class);
Route::get('teams/{id}/delete', [App\Http\Controllers\TeamController::class,'destroy']);

//Permissions
Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::get('permissions/{id}/delete', [App\Http\Controllers\PermissionController::class,'destroy']);

//Roles
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::get('roles/{id}/delete', [App\Http\Controllers\RoleController::class,'destroy']);
Route::get('roles/{id}/add_permission_to_role', [App\Http\Controllers\RoleController::class,'add_permission_to_role']);
Route::put('roles/{id}/add_permission_to_role', [App\Http\Controllers\RoleController::class,'update_permission_to_role']);

//Attachment
Route::resource('documents', App\Http\Controllers\AttachmentController::class);
Route::get('documents/{id}/delete', [App\Http\Controllers\AttachmentController::class,'destroy']);

//OwnerType
Route::resource('owner_types', App\Http\Controllers\OwnerTypeController::class);
Route::get('owner_types/{id}/delete', [App\Http\Controllers\OwnerTypeController::class,'destroy']);

//OwnershipType
Route::resource('ownership_types', App\Http\Controllers\OwnershipTypeController::class);
Route::get('ownership_types/{id}/delete', [App\Http\Controllers\OwnershipTypeController::class,'destroy']);

//Certificates
Route::resource('certificates', App\Http\Controllers\CertificateController::class);
Route::get('certificates/{id}/delete', [App\Http\Controllers\CertificateController::class,'destroy']);

//Users
Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('users/{id}/delete', [App\Http\Controllers\UserController::class,'destroy']);

//CHANGE PASSWORD
Route::get('change-password',[UserController::class,'change_password']);
Route::post('change-password',[UserController::class,'change_password_save']);

//SEARCH
Route::get('search',[SearchController::class,'search_results']);

//REPORTS
Route::get('reports/employees',[ReportController::class,'employees']);
Route::get('reports/contact_details',[ReportController::class,'contact_details']);
Route::get('reports/bank_details',[ReportController::class,'bank_details']);

