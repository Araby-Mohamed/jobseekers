<?php

namespace App\Http\Controllers\Admin;

use App\Model\Cities;
use App\Model\Companies;
use App\Model\Employments;
use App\User;
use App\Model\userInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class UserController extends Controller
{


    /**
     * Get all Employers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employers()
    {
        // get all Employers
        $employers = User::OrderBy('id', 'DESC')->where('level', 'employer')->where('accept', 1)
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->select('users.*', 'companies.title as company_name')
            ->paginate(9);


        // get all Employers Waiting
        $employersWaiting = User::OrderBy('id', 'DESC')->where('level', 'employer')->where('accept', 0)
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->select('users.*', 'companies.title as company_name')
            ->paginate(9);

        return view('admin.employers.index', ['employers' => $employers, 'employersWaiting' => $employersWaiting]);
    }


    /**
     * Accept Employer
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function accept($id)
    {
        // get data employer
        $employer = User::find($id);

        if(!$employer)
            abort(503);

        if(($employer->level == "candidate") || ($employer->accept == 1)) {
            Session::flash('warning', 'Please Enter Correct Data');
            return redirect('admin/employers');

        } else {
            $employer->accept = 1;
            $employer->save();

            Session::flash('success', 'Employer Accepted Successfully');
            return redirect('admin/employers');
        }
    }

    /**
     * Get all Candidates
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function candidates()
    {
        // get all Candidates
        $candidates = User::OrderBy('id', 'DESC')->where('level', 'candidate')->paginate(9);

        return view('admin.candidates.index', ['candidates' => $candidates]);
    }


    /**
     * View page add employer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createEmployer()
    {
        // get all employments
        $works = Employments::all();
        // get all cities
        $cities = Cities::all();

        return view('admin.employers.create', ['works' => $works, 'cities' => $cities]);
    }


    /**
     * View page Add Candidate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createCandidate()
    {
        // get all cities
        $cities = Cities::all();
        return view('admin.candidates.create',compact('cities'));
    }

    /**
     * Store Candidate in DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeCandidate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|unique:users|digits_between:7,12',
            'image' => 'image|mimes:jpeg,jpg,png|max:2000',
            'cv'         => 'mimes:pdf,docx,|max:10000',
            'jop_title'  => 'required|string|min:5|regex:/^[a-zA-Z ]+$/u',
            'gander'     => 'required|in:Male,Female'
        ]);

        $candidate = new User();
        $candidate->username = $request->input('username');
        $candidate->first_name = $request->input('first_name');
        $candidate->last_name = $request->input('last_name');
        $candidate->email = $request->input('email');
        $candidate->password = bcrypt($request->input('password'));
        $candidate->phone = $request->input('phone');
        $candidate->birthday = $request->input('birthday');
        $candidate->gander = $request->input('gander');
        $candidate->level = 'candidate';
        $candidate->accept = 1;
        $candidate->api_token = sha1(date('ymdgis').mt_rand(100, 1000000));
        $userInfo = new userInfo();
        $userInfo->jop_title = $request->input('jop_title');
        $userInfo->education_levels = $request->input('education_levels');
        $userInfo->Description = $request->input('Description');
        $userInfo->facebook = $request->input('facebook');
        $userInfo->twitter = $request->input('twitter');
        $userInfo->linkedin = $request->input('linkedin');
        $userInfo->website = $request->input('website');
        $userInfo->city_id = $request->input('city_id');

        // upload Image project
        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = date('ymdgis').mt_rand(100, 1000000).'.'.$image->getClientOriginalExtension();
            // Move Image
            $image->move('images/users', $newImage);
            // Store Image
            $candidate->image = $newImage;
        }

        $cv = $request->file('cv');
        if($cv){
            // Rename CV
            $newCv = date('dlkjf').mt_rand('10',5000000).'.'.$cv->getClientOriginalName();
            // Move Cv
            $cv->move('cv/users',$newCv);
            // Store Cv
            $dataUserInfo['cv'] = $newCv;

        }

        $candidate->save();
        Session::flash('success', 'Candidate Added Successfully');
        return redirect('admin/candidates');

    }


    /**
     * Store Employer in DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeEmployer(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|unique:users|digits_between:7,12',
            'image' => 'image|mimes:jpeg,jpg,png|max:2000',
            'title' => 'required',
            'city' => 'required|numeric',
            'work' => 'required|numeric',
            'email_company' => 'required|email',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png|max:2000',
        ], [], [
            'email_company' => 'company email',
        ]);

        $employer = new User();
        $employer->username = $request->input('username');
        $employer->first_name = $request->input('first_name');
        $employer->last_name = $request->input('last_name');
        $employer->email = $request->input('email');
        $employer->password = bcrypt($request->input('password'));
        $employer->phone = $request->input('phone');
        $employer->level = 'employer';
        $employer->accept = 1;
        $employer->api_token = sha1(date('ymdgis').mt_rand(100, 1000000));





        // upload Image project
        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = date('ymdgis').mt_rand(100, 1000000).'.'.$image->getClientOriginalExtension();
            // Move Image
            $image->move('images/users', $newImage);
            // Store Image
            $employer->image = $newImage;
        }

        $employer->save();

        // Store Company related to employer
        $company = new Companies();
        $company->title = $request->input('title');
        $company->city_id = $request->input('city');
        $company->email_company = $request->input('email_company');
        $company->address = $request->input('address');
        $company->website = $request->input('website');
        $company->facebook = $request->input('facebook');
        $company->twitter = $request->input('twitter');
        $company->linkedin = $request->input('linkedin');
        $company->employment_id = $request->input('work');
        $company->user_id = $employer->id;


        // upload Logo project
        $logo = $request->file('logo');
        if($logo)
        {
            // Rename Logo
            $newLogo = date('ymdgis').mt_rand(100, 1000000).'.'.$logo->getClientOriginalExtension();
            // Move Logo
            $logo->move('images/companies', $newLogo);
            // Store Logo
            $company->logo = $newLogo;
        }

        $company->save();

        Session::flash('success', 'Employer Added Successfully');
        return redirect('admin/employers');
    }


    /**
     * View page edit candidate
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editCandidate($id)
    {
        // get data to candidate
        $candidate = userInfo::join('users','user_info.user_id','users.id')
            ->join('cities','user_info.user_id','cities.id')
            ->where('user_info.user_id',$id)
            ->select('user_info.*','users.*','cities.title as cityTitle')->first();

        $cities = cities::all();

        if(!$candidate)
            abort(503);

        return view('admin.candidates.edit', ['candidate' => $candidate , 'cities' => $cities]);
    }


    /**
     * View page edit Employer
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editEmployer($id)
    {
        // get data employer
        $employer = Companies::join('employments','companies.employment_id','=','employments.id')
            ->join('cities','companies.city_id','=','cities.id')
            ->join('users','companies.user_id','users.id')
            ->where('users.id',$id)
            ->select('companies.*','companies.title as companyTitle','employments.*','employments.title as titleEmployments','users.*','cities.title as titleCity')->first();

        if(!$employer)
            abort(503);

        // get all employments
        $works = Employments::all();
        // get all cities
        $cities = Cities::all();

        return view('admin.employers.edit', ['employer' => $employer, 'works' => $works, 'cities' => $cities]);
    }



    /**
     * Update Employer in DB
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateEmployer($id, Request $request)
    {
        // get data to Employer
        $employer = User::find($id);

        if(!$employer)
            abort(503);

        // get data company related to employer
        $company = Companies::where('user_id', $employer->id)->first();

        // validation to inputs form
        $this->validate($request, [
            'username' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email' => 'required|email|unique:users,email,'.$employer->id,
            'phone' => 'required|digits_between:7,12|unique:users,phone,'.$employer->id,
            'image' => 'image|mimes:jpeg,jpg,png|max:2000',
            'title' => 'required',
            'city' => 'required|numeric',
            'work' => 'required|numeric',
            'email_company' => 'required|email',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png|max:2000',
        ], [], [
            'email_company' => 'company email',
        ]);

        $employer->username = $request->input('username');
        $employer->first_name = $request->input('first_name');
        $employer->last_name = $request->input('last_name');
        $employer->email = $request->input('email');
        if(!empty($request->input('password'))) {
            $employer->password = bcrypt($request->input('password'));
        }
        $employer->phone = $request->input('phone');


        $image = $request->file('image');
        // Get old image
        $oldImage = $employer->image;
        if($image)
        {
            // Rename Image
            $newImage = date('ymdgis').mt_rand(100, 1000000).'.'.$image->getClientOriginalExtension();

            // Move Image
            // IF Move image return true
            if($image->move('images/users', $newImage))
            {
                // if exist path old image return true
                if(file_exists('images/users/'.$oldImage)) {
                    // Delete old image
                    File::Delete('images/users/'.$oldImage);
                }
            }
            // else => upload new image
            $employer->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $employer->image = $oldImage;
        }

        // Store Data in DB
        $employer->save();

        // update company
        $company->title = $request->input('title');
        $company->city_id = $request->input('city');
        $company->email_company = $request->input('email_company');
        $company->address = $request->input('address');
        $company->website = $request->input('website');
        $company->facebook = $request->input('facebook');
        $company->twitter = $request->input('twitter');
        $company->linkedin = $request->input('linkedin');
        $company->employment_id = $request->input('work');

        $logo = $request->file('logo');
        // Get old Logo
        $oldLogo = $company->logo;
        if($logo)
        {
            // Rename Logo
            $newLogo = date('ymdgis').mt_rand(100, 1000000).'.'.$logo->getClientOriginalExtension();

            // Move Logo
            // IF Move Logo return true
            if($logo->move('images/companies', $newLogo))
            {
                // if exist path old image return true
                if(file_exists('images/companies/'.$oldImage)) {
                    // Delete old image
                    File::Delete('images/companies/'.$oldImage);
                }
            }
            // else => upload new logo
            $company->logo = $newLogo;

        } else {
            // else => not choose new logo
            // save old logo
            $company->logo = $oldLogo;
        }

        $company->save();

        Session::flash('success', 'Employer Updated Successfully');
        return redirect('admin/employers');
    }


    /**
     * Update Candidate in DB
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateCandidate($id, Request $request)
    {
        // get data to candidate
        $candidate = User::find($id);
        // Get data to userInfo
        $userInfo = userInfo::where('user_id',$id)->get()->first();

        if(!$candidate)
            abort(503);

        // validation to inputs form
        $this->validate($request, [

            'username'   => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'last_name'  => 'required|regex:/^[a-zA-Z ]+$/u|max:255',
            'email'      => 'required|email|unique:users,email,'.$candidate->id,
            'phone'      => 'required|digits_between:7,12|unique:users,phone,'.$candidate->id,
            'image'      => 'image|mimes:jpeg,jpg,png|max:2000',
            'cv'         => 'mimes:pdf,docx,|max:10000',
            'jop_title'  => 'required|string|min:5|regex:/^[a-zA-Z ]+$/u',
            'gander'     => 'required|in:Male,Female'
        ]);

        $candidate->username = $request->input('username');
        $candidate->first_name = $request->input('first_name');
        $candidate->last_name = $request->input('last_name');
        $candidate->email = $request->input('email');
        if(!empty($request->input('password'))) {
            $candidate->password = bcrypt($request->input('password'));
        }
        $candidate->phone = $request->input('phone');
        $candidate->birthday = $request->input('birthday');
        $candidate->gander = $request->input('gander');

        $userInfo->jop_title = $request->input('jop_title');
        $userInfo->education_levels = $request->input('education_levels');
        $userInfo->Description = $request->input('Description');
        $userInfo->facebook = $request->input('facebook');
        $userInfo->twitter = $request->input('twitter');
        $userInfo->linkedin = $request->input('linkedin');
        $userInfo->website = $request->input('website');
        $userInfo->city_id = $request->input('city_id');

        $image = $request->file('image');
        // Get old image
        $oldImage = $candidate->image;
        if($image)
        {
            // Rename Image
            $newImage = date('ymdgis').mt_rand(100, 1000000).'.'.$image->getClientOriginalExtension();

            // Move Image
            // IF Move image return true
            if($image->move('images/users', $newImage))
            {
                // if exist path old image return true
                if(file_exists('images/users/'.$oldImage)) {
                    // Delete old image
                    File::Delete('images/users/'.$oldImage);
                }
            }
            // else => upload new image
            $candidate->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $candidate->image = $oldImage;
        }

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

        // Store Data in DB
        $candidate->save();
        $userInfo->save();

        Session::flash('success', 'Candidate Updated Successfully');
        return redirect('admin/candidates');
    }



    /**
     * View Details Candidate
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCandidate($id)
    {
        // get data to candidate
        $candidate = User::find($id);

        // Get All User Info
        $usersInfo = userInfo::where('user_id',$id)
            ->join('cities','user_info.city_id', '=','cities.id')
            ->select('user_info.*','cities.title as city')->first();

        if(!$candidate)
            abort(503);

        return view('admin.candidates.view', ['candidate' => $candidate , 'usersInfo' => $usersInfo]);
    }


    /**
     * View Details Employer
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewEmployer($id)
    {
        // get data employer
        $employer = Companies::join('employments','companies.employment_id','=','employments.id')
            ->join('cities','companies.city_id','=','cities.id')
            ->join('users','companies.user_id','users.id')
            ->where('users.id',$id)
            ->select('companies.*','companies.title as companyTitle','employments.*','employments.title as titleEmployments','users.*','cities.title as titleCity')->first();


        if(!$employer)
            abort(503);

        return view('admin.employers.view', ['employer' => $employer]);
    }


    /**
     * Delete Candidate
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyCandidate($id)
    {
        // check has permission equal admin
        if(auth()->guard('admin')->user()->level == 1)
            abort(503);

        // get data to candidate
        $candidate = User::find($id);

        if(!$candidate)
            abort(503);

        $candidate->Delete();
        File::Delete('images/users/'.$candidate->image);

        Session::flash('success', 'Candidate Deleted Successfully');
        return redirect('admin/candidates');
    }


    /**
     * Delete Employer
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyEmployer($id)
    {
        // check has permission equal admin
        if(auth()->guard('admin')->user()->level == 1)
            abort(503);

        // get data employer
        $employer = User::find($id);

        // if not employer
        if(!$employer)
            abort(503);

        // get data company
        $company = Companies::where('user_id', $employer->id)->first();
        // delete image company
        File::Delete('images/companies/'.$company->logo);
        // delete employer
        $employer->Delete();


        // delete image employer
        File::Delete('images/users/'.$employer->image);
        Session::flash('success', 'Employer Deleted Successfully');
        return redirect('admin/employers');
    }

}
