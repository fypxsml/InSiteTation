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

Route::get('/', function () {
    return view('welcome'); // this is where the home page goes
});

Route::get('/about', function () {
    return view('layouts/about');
});

Auth::routes();

Route::get('/home', 'DashboardController@index')->middleware('level:1');

Route::group(['middleware' => ['level:3']], function() {
  //////////    USER    //////////
  Route::get('/user/search', 'UserController@index'); //display all users foor searching
  Route::get('/user/{id}', 'UserController@show'); //display a user details
  Route::get('/register/approve', 'PendingUserController@index'); //display pending registration page
	Route::post('/register/{id}/approve', 'PendingUserController@addUser');  //approve a user
	Route::post('/register/{id}/reject', 'PendingUserController@rejected');  //reject a user

});

Route::group(['middleware' => ['level:2']], function ()
{

	//////////    ASSET    //////////
	//     ---CATEGORIES---     //
	Route::get('/asset/category', 'CategoryController@index');  //display category page
	Route::post('/asset/category', 'CategoryController@store');  //create new category
	Route::get('/asset/category/{id}', 'CategoryController@show'); //return form for edit category
	Route::post('/asset/category/{id}', 'CategoryController@update'); //edit and update the category

	//     ---SUBCATEGORIES---     //
	Route::get('/asset/subcategory', 'SubcategoryController@index');  //display subcategory page
	Route::post('/asset/subcategory', 'SubcategoryController@store');  //create new subcategory
	Route::get('/asset/subcategory/{id}', 'SubcategoryController@show'); //return form for edit subcategory
	Route::post('/asset/subcategory/{id}', 'SubcategoryController@update'); //edit and update the subcategory

	//     ---INSURANCE---     //
	Route::get('/asset/insurance', 'InsuranceCompanyController@index'); //display all company
	Route::post('/asset/insurance', 'InsuranceCompanyController@store'); //create new company
	Route::get('/asset/insurance/manage/{id}', 'InsuranceCompanyController@show'); //return form for edit company
	Route::post('/asset/insurance/manage/{id}', 'InsuranceCompanyController@update'); //edit and update the company

	//     ---Service---     //
	Route::get('/asset/service', 'ServiceCompanyController@index'); //display all company
	Route::post('/asset/service', 'ServiceCompanyController@store'); //create new company
	Route::get('/asset/service/manage/{id}', 'ServiceCompanyController@show'); //return form for edit company
	Route::post('/asset/service/manage/{id}', 'ServiceCompanyController@update'); //edit and update the company

	//     ---ASSET---     //
	Route::get('/asset', 'AssetController@index'); //display asset page
	Route::post('/asset', 'AssetController@store'); //create new asset
	Route::get('/asset/{id}/edit', 'AssetController@show'); //return form for edit asset
	Route::post('/asset/{id}/edit', 'AssetController@update'); //edit and update asset
  Route::post('/asset/{id}/archive', 'AssetController@archive'); //set status to archive

  Route::post('/asset/insurance/{id}/add', 'AssetController@addInsurance'); //add new insurance
  Route::get('/asset/insurance/{id}', 'AssetController@showInsurance'); //show insurance
  Route::post('/asset/insurance/{id}', 'AssetController@updInsurance'); //manage insurance

  Route::post('/asset/service/{id}/add', 'AssetController@addService'); //add new service record
  Route::get('/asset/service/{id}', 'AssetController@showService'); //show service
  Route::post('/asset/service/{id}', 'AssetController@updService'); //manage service

  Route::get('/asset/search', 'AssetController@showSearch'); //display search page
	Route::get('/asset/generate', 'AssetController@generate'); //generate barcode
	Route::post('/asset/generate/qrcode', 'AssetController@generateID'); //get asset id and pass back to view

	Route::get('/asset/archived', 'AssetController@searchArchived'); //display all archived for search
	Route::get('/asset/archived/{id}', 'AssetController@showArchived'); //show an archived asset
	Route::post('/asset/archived/{id}', 'AssetController@updateArchived'); //update archived asset

	//////////    PROJECT SITE    //////////
	Route::get('/projectsite', 'ProjectSiteController@index'); //display project site page
	Route::post('/projectsite', 'ProjectSiteController@store'); //create new site
	Route::get('/projectsite/{id}/edit', 'ProjectSiteController@show'); //retuen form to edit project site
	Route::post('/projectsite/{id}/edit', 'ProjectSiteController@update'); //edit and update project site
	Route::get('/projectsite/search', 'ProjectSiteController@showSearch'); //display search page
  Route::get('/projectsite/map', 'ProjectSiteController@map');//display project site map
	//     ---ASSIGN SITES---     //
  Route::get('/projectsite/assign', 'AssignedSiteController@index'); //display form to assign sites
	Route::post('projectsite/assign', 'AssignedSiteController@store'); //assign site to user
	Route::get('/projectsite/assign/{id}', 'AssignedSiteController@show'); //display assigned details
	Route::post('/projectsite/assign/{id}', 'AssignedSiteController@update'); //update assigned details

  //////////    REQUISITION    //////////
  Route::get('/requisition/{id}/approve', 'SubmittedRequisitionController@approve'); //approve requisition
	Route::post('/requisition/{id}/reject', 'SubmittedRequisitionController@reject'); //reject requisition
  Route::get('/requisition/pending', 'SubmittedRequisitionController@showPending'); //display pending requisition page

  Route::get('/requisition/ongoing', 'RequisitionController@index'); //display on going requisition
  Route::get('/requisition/{id}/details', 'RequisitionController@show'); //view requisition details
  Route::post('/requisition/{id}/return', 'RequisitionController@return'); //return of requisited asset
	Route::post('/requisition/{id}/cancel', 'RequisitionController@cancel'); //cancel requisition
  Route::get('/requisition/history', 'RequisitionController@history'); //display all requisitions
  Route::get('/requisition/history/{id}/detail', 'RequisitionController@historyDetails'); //display requisitions details
  Route::get('/requisition/history/asset', 'RequisitionController@assetHistory'); //display asset location history
  Route::get('/requisition/{id}/history', 'RequisitionController@locationHistory'); //asset location history
  Route::get('/requisition/location', 'RequisitionController@showMap'); //display asset location map
});

Route::group(['middleware' => ['level:1']], function ()
{
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

	//////////    REQUISITION    //////////
	Route::get('/requisition', 'SubmittedRequisitionController@index'); //display requisition form for user
	Route::post('/requisition', 'SubmittedRequisitionController@store'); //user send a requisition

	Route::get('/requisition/history/all', 'RequisitionController@userRequisitions'); //display requisitions according to staff
	Route::get('/requisition/history/{id}', 'RequisitionController@reqDetails'); //user requisition history in details
	Route::get('/requistion/updatelocation', 'RequisitionController@showRequisition'); //show on going requsition to update location
	Route::get('/requisition/updatelocation/{id}', 'RequisitionController@update'); //show specific requisition to update location
	Route::post('/requisition/updatelocation/{id}', 'RequisitionController@updateLocation'); //show specific requisition to update location
});
