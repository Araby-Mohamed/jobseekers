<?php

namespace App\Http\Controllers\Api;

use App\Model\Cities;
use App\Model\Companies;
use App\Model\Employments;
use App\Model\userInfo;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponseTrait;

    // Get All Candidates
    public function Candidates(){
        $Candidates = userInfo::where('level','candidate')
            ->join('users','user_info.user_id', '=','users.id')
            ->join('cities','user_info.city_id', '=' , 'cities.id')
            ->select('user_info.jop_title','users.image','user_info.user_id','users.username','cities.title as city')
            ->paginate(10);

        return $this->apiResponse($Candidates,null,200);
    }

    // Get Candidate By Id
    public function Candidate($id){
        $Candidate = userInfo::where('user_id',$id)
            ->join('users','user_info.user_id','=','users.id')
            ->join('cities','user_info.city_id','=','cities.id')
            ->select('user_info.*','users.username','users.first_name','users.last_name','users.email','users.phone','users.image','users.birthday','users.gander','cities.title as city')->first();

        if($Candidate){
            return $this->apiResponse($Candidate,null,200);
        }else{
            return $this->apiResponse(null,'Candidate Not Found',404);
        }
    }

    // Profile Candidates
    public function profileCandidates(){

        $cities = Cities::all();
        $dateNow = date('Y-m-d');
        // Start Date
        $dateStartAfter = strtotime("$dateNow -60 year");
        $startDate = date('Y-m-d', $dateStartAfter);
        // End Date
        $dateEndAfter = strtotime("$dateNow -18 year");
        $endDate = date('Y-m-d', $dateEndAfter);

        $id = Auth::id();
        $usersInfo = userInfo::where('user_id',$id)
            ->join('users','user_info.user_id', '=','users.id')
            ->leftJoin('cities','user_info.city_id', '=','cities.id')
            ->select('user_info.*','users.username','users.first_name','users.last_name','users.last_name','users.email','users.phone','users.birthday','users.image','users.gander','users.level','cities.title as city')->first();



        if(Auth::user()->level == 'candidate') {
            return $this->apiResponse($usersInfo,null,200);
        }else{
            return $this->apiResponse(null,'User Not Found',404);
        }
    }

    // Update profileCandidates
    public function updateCandidates(Request $request,$id){
        $user = User::find($id);
        $userInfo = userInfo::where('user_id',Auth::id())->first();
        // Validate Data
        if($user && $userInfo){
            $validate = Validator::make($request->all(),[
                'username'   => 'nullable|min:3|regex:/^[a-zA-Z ]+$/u|max:255',
                'first_name' => 'nullable|min:3|regex:/^[a-zA-Z ]+$/u|max:255',
                'last_name'  => 'nullable|min:3|regex:/^[a-zA-Z ]+$/u|max:255',
                'email'      => 'nullable|min:5|email|unique:users,email,'.$user->id,
                'phone'      => 'nullable|min:7|digits_between:7,12|unique:users,phone,'.$user->id,
                'image'      => 'image|mimes:jpeg,jpg,png|max:2000',
                'cv'         => 'mimes:pdf,docx,|max:10000',
                'jop_title'  => 'nullable|string|min:5|regex:/^[a-zA-Z ]+$/u',
                'gander'     => 'in:Male,Female'
            ]);

            if($validate->fails()) {
                return $this->apiResponse(null, $validate->errors(), 404);
            }else{
                $dataUser = [
                    'username'   => $request->username,
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'phone'      => $request->phone,
                    'birthday'   => $request->birthday,
                    'gander'     => $request->gander,
                ];

                $dataUserInfo = [
                    'jop_title'         => $request->jop_title,
                    'education_levels'  => $request->education_levels,
                    'Description'       => $request->Description,
                    'facebook'          => $request->facebook,
                    'twitter'           => $request->twitter,
                    'linkedin'          => $request->linkedin,
                    'website'           => $request->website,
                    'city_id'           => $request->city_id,
                ];

                // Get Old Password
                $oldPassword = $user->password;

                if($request->password != ''){
                    $password = bcrypt($request->password);
                }else{
                    $password = $oldPassword;
                }

                $dataUser['password'] = $password;


                // Get Old Image
                $oldImage = $user->image;
                $image = $request->file('image');

                if($image != ''){
                    // Rename Image
                    $newImage = date('ymdgis').mt_rand(100, 1000000).'.'.$image->getClientOriginalExtension();
                    // Move Image
                    $image->move('images/users', $newImage);
                    // Store Image
                    $dataUser['image'] = $newImage;
                    // Delete Old Image
                    if($oldImage != ''){
                        if(file_exists(public_path('images/users/').$oldImage)){
                            \File::Delete(public_path('images/users/').$oldImage);
                        }
                    }

                }else{
                    $dataUser['image'] = $oldImage;
                }

                // Get Old Cv
                $oldCV = $userInfo->cv;
                $cv = $request->file('cv');

                if($cv != ''){
                    // Rename CV
                    $newCv = date('dlkjf').mt_rand('10',5000000).'.'.$cv->getClientOriginalName();
                    // Move Cv
                    $cv->move('cv/users',$newCv);
                    // Store Cv
                    $dataUserInfo['cv'] = $newCv;
                    // Delete Old Cv
                    if($oldImage != ''){
                        if(file_exists(public_path('cv/users/').$oldCV)){
                            \File::Delete(public_path('cv/users/').$oldCV);
                        }
                    }

                }else{
                    $dataUserInfo['cv'] = $oldCV;
                }

                // Save User Date
                User::where('id',$id)->update($dataUser);
                // Save USer Info Date
                userInfo::where('user_id',$id)->update($dataUserInfo);

                return $this->apiResponse('Updated Success',null,201);
            }
        }else{
            return $this->apiResponse(null,'Candidate Not Found',404);
        }
    }

    // Profile Employments
    public function profileEmployments(){

        $cities = Cities::all();
        $works = Employments::all();

        $id = Auth::id();
        $companies = Companies::where('user_id',$id)
            ->join('users','companies.user_id','=','users.id')
            ->join('cities','companies.city_id','=','cities.id')
            ->join('employments','companies.employment_id', '=','employments.id')
            ->select('companies.*','employments.title as employment_title','cities.title as city')->first();


        if(Auth::user()->level == 'employer') {
            return $this->apiResponse($companies,null,200);
        }else{
            return $this->apiResponse(null,'User Not Found',404);
        }

    }

    // Update Profile Employments
    public function updateEmployments(Request $request,$id){
        $user = User::find($id);
        $companies = Companies::where('user_id',$id)->first();

        if($user && $companies){
            // Validate Data
            $validate = Validator::make($request->all(),[
                'username'      => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'first_name'    => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'last_name'     => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
                'email'         => 'required|email|unique:users,email,'.$user->id,
                'phone'         => 'required|digits_between:7,12|unique:users,phone,'.$user->id,
                'image'         => 'image|mimes:jpeg,jpg,png|max:2000',
                'logo'          => 'image|mimes:jpeg,jpg,png|max:2000',
                'title'         => 'required|string|min:5|regex:/^[a-zA-Z ]+$/u',
                'email_company' => 'required|email|unique:users,email,'.$user->id
            ]);

            if($validate->fails()){
                return $this->apiResponse(null,$validate->errors(),'404');
            }else{

                $dataUser = [
                    'username'   => $request->username,
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'phone'      => $request->phone,
                ];

                $dataCompanies = [
                    'title'             => $request->title,
                    'employment_id'     => $request->employment_id,
                    'email_company'     => $request->email_company,
                    'Description'       => $request->Description,
                    'facebook'          => $request->facebook,
                    'twitter'           => $request->twitter,
                    'linkedin'          => $request->linkedin,
                    'website'           => $request->website,
                    'city_id'           => $request->city_id,
                ];

                // Get Old Password
                $oldPassword = $user->password;

                if($request->password != ''){
                    $password = bcrypt($request->password);
                }else{
                    $password = $oldPassword;
                }

                $dataUser['password'] = $password;


                // Update Image User
                // Get Old Image
                $oldImage = $user->image;
                $image = $request->file('image');

                if($image != ''){
                    // Rename Image
                    $newImage = date('ymdgis').mt_rand(100, 1000000).'.'.$image->getClientOriginalExtension();
                    // Move Image
                    $image->move('images/users', $newImage);
                    // Store Image
                    $dataUser['image'] = $newImage;
                    // Delete Old Image
                    if($oldImage != ''){
                        if(file_exists(public_path('images/users/').$oldImage)){
                            \File::Delete(public_path('images/users/').$oldImage);
                        }
                    }

                }else{
                    $dataUser['image'] = $oldImage;
                }

                // Update Logo
                // Get Old Logo
                $oldLogo = $companies->logo;
                $logo = $request->file('logo');

                if($logo != ''){
                    // Rename Image
                    $newLogo = date('ymdgis').mt_rand(100, 1000000).'.'.$logo->getClientOriginalExtension();
                    // Move Image
                    $logo->move('images/companies', $newLogo);
                    // Store Image
                    $dataCompanies['logo'] = $newLogo;
                    // Delete Old Image
                    if($oldLogo != ''){
                        if(file_exists(public_path('images/companies/').$oldLogo)){
                            \File::Delete(public_path('images/companies/').$oldLogo);
                        }
                    }

                }else{
                    $dataCompanies['logo'] = $oldLogo;
                }


                // Save User Date
                User::where('id',$id)->update($dataUser);
                // Save USer Info Date
                Companies::where('user_id',$id)->update($dataCompanies);

                return $this->apiResponse('Updated Success',null,201);
            }
        }else{
            return $this->apiResponse(null,'Employments Not Found',404);
        }
    }

}
