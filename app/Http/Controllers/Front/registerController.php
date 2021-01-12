<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Model\Companies;
use App\User;
use App\Model\userInfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class registerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Store Candidate
    public function storeCandidate(Request $request){

        $this->validate($request, [
            'username'   => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name'  => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:5',
            'phone'      => 'required|unique:users|digits_between:7,12',
            'jop_title'  => 'required|string|min:5|regex:/^[a-zA-Z ]+$/u',
            'city_id'    => 'required',
            'gander'     => 'required',
        ]);

        $candidate = new User();

        $candidate->username   = $request->username;
        $candidate->first_name = $request->first_name;
        $candidate->last_name  = $request->last_name;
        $candidate->email      = $request->email;
        $candidate->password   = bcrypt($request->password);
        $candidate->phone      = $request->phone;
        $candidate->level      = 'candidate';
        $candidate->gander     = $request->gander;
        $candidate->accept     = 1;
        $candidate->api_token  = sha1(date($request->email).mt_rand(100, 1000000));

        $candidate->save();
        //$user = User::create($dataCandidate);

        $userInfo = new userInfo();
        $userInfo->jop_title = $request->jop_title;
        $userInfo->user_id   = $candidate->id;
        $userInfo->city_id   = $request->city_id;

        $userInfo->save();

        Auth::login($candidate);

        return redirect('/');
    }

    // Store employers
    public function storeEmployers(Request $request){
        $this->validate($request, [
            'username_employer'      => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name_employer'    => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name_employer'     => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'title_employer'         => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email_employer'         => 'required|email|unique:users,email',
            'password_employer'      => 'required|min:5',
            'phone_employer'         => 'required|unique:users,phone|digits_between:7,12',
            'city_id_employer'       => 'required',
            'employment_id'          => 'required',
        ]);

        $Employer = new User();
        $Employer->username   = $request->username_employer;
        $Employer->first_name = $request->first_name_employer;
        $Employer->last_name  = $request->last_name_employer;
        $Employer->email      = $request->email_employer;
        $Employer->password   = bcrypt($request->password_employer);
        $Employer->phone      = $request->phone_employer;
        $Employer->level      = 'employer';
        $Employer->accept     = 1;
        $Employer->api_token  = sha1(date($request->email_employer).mt_rand(100, 1000000));

        //dd($Employer);

        // Save Data
        $Employer->save();

        // COMPANIES
        $companies = new Companies();
        $companies->title           = $request->title_employer;
        $companies->employment_id   = $request->employment_id;
        $companies->city_id         = $request->city_id_employer ;
        $companies->user_id         = $Employer->id;


        // Save Data
        $companies->save();

        Auth::login($Employer);

        return redirect('/');



    }

}
