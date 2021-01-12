<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\userResource;
use App\Model\Companies;
use App\Model\userInfo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use ApiResponseTrait;


    // Login User
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email'      => 'required|email',
            'password'   => 'required|min:5',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->messages(),404);
        }else{
            if(auth()->attempt(['email' => $request->email , 'password' => $request->password])){
                $user = auth()->user();
                $user->api_token = sha1(date($request->email).mt_rand(100, 1000000));
                $user->save();
                return response(['status' => true , 'user' => $user , 'token' => $user->api_token]);
            }else{
                return $this->apiResponse(null,'The Email Or Password Incorrect',404);
            }
        }
    }

    // Register Candidate
    public function registerCandidate(Request $request){
        $validate = Validator::make($request->all(),[
            'username'   => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name'  => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:5',
            'phone'      => 'required|unique:users|digits_between:7,12',
            'jop_title'  => 'required|string|min:5|regex:/^[a-zA-Z ]+$/u',
            'city_id'    => 'required',
            'gander'     => 'required|in:Male,Female',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $candidate = new User();

            $candidate->username   = $request->username;
            $candidate->first_name = $request->first_name;
            $candidate->last_name  = $request->last_name;
            $candidate->email      = $request->email;
            $candidate->password   = bcrypt($request->password);
            $candidate->phone      = $request->phone;
            $candidate->gander     = $request->gander;
            $candidate->level      = 'candidate';
            $candidate->accept     = 1;
            $candidate->api_token  = sha1(date($request->email).mt_rand(100, 1000000));

            $candidate->save();
            //$user = User::create($dataCandidate);

            $userInfo = new userInfo();
            $userInfo->jop_title = $request->jop_title;
            $userInfo->user_id   = $candidate->id;
            $userInfo->city_id   = $request->city_id;

            $userInfo->save();


            if($candidate){
                return $this->apiResponse(['user' => $candidate,'token' => $candidate->api_token],null,201);
                //return response([$candidate,$userInfo],201);
            }else{
                return $this->apiResponse(null,'Un Know Error',404);
            }
        }
    }

    public function registerEmployers(Request $request){
        $validate = Validator::make($request->all(),[
            'username'      => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name'    => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name'     => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'title'         => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:5',
            'phone'         => 'required|unique:users,phone|digits_between:7,12',
            'city_id'       => 'required',
            'employment_id' => 'required',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),'404');
        }else{
            $Employer = new User();
            $Employer->username   = $request->username;
            $Employer->first_name = $request->first_name;
            $Employer->last_name  = $request->last_name;
            $Employer->email      = $request->email;
            $Employer->password   = bcrypt($request->password);
            $Employer->phone      = $request->phone;
            $Employer->level      = 'employer';
            $Employer->accept     = 1;
            $Employer->api_token  = sha1(date($request->email).mt_rand(100, 1000000));

            // Save Data
            $Employer->save();

            // COMPANIES
            $companies = new Companies();
            $companies->title           = $request->title;
            $companies->employment_id   = $request->employment_id;
            $companies->city_id         = $request->city_id ;
            $companies->user_id         = $Employer->id;

            // Save Data
            $companies->save();

            if($Employer){
                return $this->apiResponse(['user' => $Employer , 'token' => $Employer->api_token],null,201);
            }else{
                return $this->apiResponse(null,'Un Know Error',404);
            }

        }
    }


}
