<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'],function (){

    Route::group(['middleware' => 'auth:api'],function (){
        // Route Profile Candidates
        Route::get('profile/candidates','UserController@profileCandidates');
        // Update User Profile
        Route::post('profile/candidates/{id}/update','UserController@updateCandidates');
        // Route Profile Employments
        Route::get('profile/employments','UserController@profileEmployments');
        // Update Company Profile
        Route::post('profile/employments/{id}/update','UserController@updateEmployments');
        // Get Job Applicants candidate
        Route::get('profile/applicants/{id}/candidate','jobsController@getAllJobProvided');
        // Route Profile My Jobs
        Route::get('profile/my_jobs','jobsController@GetAllMyJob');
        // Route Job
        Route::post('add/job','jobsController@store');
        Route::post('job/edit/{id}','jobsController@update');
        Route::get('job/delete/{id}','jobsController@destroy');
        // Apply For Jobs
        Route::post('apply_for_jobs','ApplyForJobsController@store');
        // Get Job Applicants Employer
        Route::get('profile/applicants/{id}','ApplyForJobsController@getAllJobApplicants');
        // Get Job Applicants Employer
        Route::get('profile/applicants/{id}','checkApplyForJob@getAllJobApplicants');
        // checkApplyForJob
        Route::get('profile/check','ApplyForJobsController@checkApplyForJob');
        // Delete Job Applicants Employer
        Route::get('profile/applicants/{id}/delete','ApplyForJobsController@destroy');
        // Delete Applicants candidate
        Route::get('profile/applicants/{id}/delete/candidate','ApplyForJobsController@destroyMyApplicants');
    });

    // Rout Home Page
    Route::get('home-page/data', 'HomeController@index');
    // Route Search
    Route::get('search/jobs','HomeController@search');
    // Get All Candidate
    Route::get('candidates','UserController@Candidates');
    // Get Candidate By Id
    Route::get('candidate/{id}','UserController@Candidate');
    // Categories
    Route::get('categories','WorksController@index');
    // All Employer
    Route::get('employers','EmployerController@index');
    // Get Employer By Id
    Route::get('employer/{id}','EmployerController@show');
    // All Jobs
    Route::get('jobs','jobsController@index');
    // Get Jobs By Employments
    Route::get('jobs/{id}','jobsController@getJobsByEmployments');
    // Get Jobs By User ID
    Route::get('jobs/company/{id}','jobsController@getJobsByUserID');
    // Jobs By ID
    Route::get('job/{id}','jobsController@show');
    // Login
    Route::post('login','AuthController@login');
    // Register Candidate
    Route::post('register/candidate','AuthController@registerCandidate');
    // Register Employer
    Route::post('register/employer','AuthController@registerEmployers');


});




