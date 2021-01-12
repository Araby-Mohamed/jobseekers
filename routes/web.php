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


//-------------------------------------
Auth::routes();


/**************************************
 * Front Controllers
 **************************************/

Route::group(['namespace' => 'Front'], function () {
    // Rout Home Page
    Route::get('/', 'HomeController@index');
    // Route Search
    Route::get('search/jobs','HomeController@search');
    // Register Candidate
    Route::post('register/candidate','registerController@storeCandidate');
    // Register Employer
    Route::post('register/employers','registerController@storeEmployers');
    // Categories
    Route::get('categories','WorksController@index');
    // Candidates
    Route::get('candidates','UserController@Candidates');
    // Candidate By ID
    Route::get('candidate/{id}','UserController@Candidate');
    // All Jobs
    Route::get('jobs','jobsController@index');
    // Jobs By ID
    Route::get('job/{id}','jobsController@show');
    // Get Jobs By Employments
    Route::get('jobs/{id}','jobsController@getJobsByEmployments');
    // All Employer
    Route::get('employers','EmployerController@index');
    // Get Employer By Id
    Route::get('employer/{id}','EmployerController@show');
    // Get Jobs By User ID
    Route::get('jobs/company/{id}','jobsController@getJobsByUserID');

    // Route Company
    Route::group(['middleware' => 'company'],function (){
        // Route Profile
        Route::get('profile/employments','UserController@profileEmployments');
        // Route Job
        Route::get('add/job','jobsController@create');
        Route::post('add/job','jobsController@store');
        Route::get('job/edit/{id}','jobsController@edit');
        Route::post('job/edit/{id}','jobsController@update');
        Route::get('job/delete/{id}','jobsController@destroy');
        // Route Profile My Jobs
        Route::get('profile/my_jobs','jobsController@GetAllMyJob');
        // Get Job Applicants Employer
        Route::get('profile/applicants/{id}','ApplyForJobsController@getAllJobApplicants');
        // Delete Job Applicants Employer
        Route::get('profile/applicants/{id}/delete','ApplyForJobsController@destroy');
        // Logout
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    });

    // Route candidate
    Route::group(['middleware' => 'user'], function (){
        // Route Profile
        Route::get('profile/candidates','UserController@profileCandidates');
        // Update User Profile
        Route::post('profile/candidates/{id}/update','UserController@updateCandidates');
        // Apply For Jobs
        Route::post('apply_for_jobs','ApplyForJobsController@store');
        // Get Job Applicants candidate
        Route::get('profile/applicants/{id}/candidate','jobsController@getAllJobProvided');
        // Delete Applicants candidate
        Route::get('profile/applicants/{id}/delete/candidate','ApplyForJobsController@destroyMyApplicants');

        // Logout
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    });

});




/**************************************
 * Admin Controllers
**************************************/

Route::group(['namespace' => 'Admin'], function () {


    Route::group(['middleware' => 'adminGuest:admin'], function () {
        // Route Login
        Route::get('admin/login', 'AdminController@login_get');
        Route::post('admin/login', 'AdminController@login_post');
    });


    Route::group(['middleware' => 'adminWeb:admin'], function () {

        // Route Logout
        Route::get('admin/logout', 'AdminController@logout');
        // Route Home
        Route::get('admin/home', 'HomeController@index');


        // Route Setting
        Route::get('admin/setting', 'SettingController@index');
        Route::post('admin/setting/update', 'SettingController@update');

        // Route Profile
        Route::get('admin/profile', 'ProfileController@index');
        Route::post('admin/profile/update', 'ProfileController@update');


        // Route Admins
        Route::get('admin/admins', 'AdminsController@index');
        Route::get('admin/admins/create', 'AdminsController@create');
        Route::post('admin/admins/store', 'AdminsController@store');
        Route::get('admin/admins/{id}/view', 'AdminsController@view');
        Route::get('admin/admins/{id}/edit', 'AdminsController@edit');
        Route::post('admin/admins/{id}/update', 'AdminsController@update');
        Route::get('admin/admins/{id}/delete', 'AdminsController@destroy');


        // Route Employer
        Route::get('admin/employers', 'UserController@employers');
        Route::get('admin/employers/create', 'UserController@createEmployer');
        Route::post('admin/employers/store', 'UserController@storeEmployer');
        Route::get('admin/employers/{id}/accept', 'UserController@accept');
        Route::get('admin/employers/{id}/view', 'UserController@viewEmployer');
        Route::get('admin/employers/{id}/edit', 'UserController@editEmployer');
        Route::post('admin/employers/{id}/update', 'UserController@updateEmployer');
        Route::get('admin/employers/{id}/delete', 'UserController@destroyEmployer');


        // Route Candidates
        Route::get('admin/candidates', 'UserController@candidates');
        Route::get('admin/candidates/create', 'UserController@createCandidate');
        Route::post('admin/candidates/store', 'UserController@storeCandidate');
        Route::get('admin/candidates/{id}/view', 'UserController@viewCandidate');
        Route::get('admin/candidates/{id}/edit', 'UserController@editCandidate');
        Route::post('admin/candidates/{id}/update', 'UserController@updateCandidate');
        Route::get('admin/candidates/{id}/delete', 'UserController@destroyCandidate');


        // Route Companies
        Route::get('admin/companies', 'CompaniesController@index');
        Route::get('admin/companies/{id}/view', 'CompaniesController@view');
        Route::get('admin/companies/{id}/edit', 'CompaniesController@edit');
        Route::post('admin/companies/{id}/update', 'CompaniesController@update');
        Route::get('admin/companies/{id}/delete', 'CompaniesController@destroy');


        // Route worksResources
        Route::get('admin/works', 'WorksController@index');
        Route::get('admin/works/create', 'WorksController@create');
        Route::post('admin/works/store', 'WorksController@store');
        Route::get('admin/works/{id}/edit', 'WorksController@edit');
        Route::post('admin/works/{id}/update', 'WorksController@update');
        Route::get('admin/works/{id}/delete', 'WorksController@destroy');


        // Route Jobs
        Route::get('admin/jobs','JobsController@index');
        Route::get('admin/jobs/{id}/view','JobsController@show');
        Route::get('admin/jobs/{id}/delete','JobsController@destroy');
        Route::get('admin/job/{id}/accept','JobsController@accept');

    });



});
