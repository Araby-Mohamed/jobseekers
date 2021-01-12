<?php

namespace App\Http\Controllers\Api;

use App\Model\ApplyForJobs;
use App\Model\Companies;
use App\Model\Jobs;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class jobsController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.accept',1)
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->paginate(9);

        $JobsCount = Jobs::where('accept',1)->count();
        return $this->apiResponse(['Jobs' => $Jobs, 'countJob' => $JobsCount],null,200);
    }

    // Get Jobs By Employments
    public function getJobsByEmployments($id){
        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.employments_id',$id)
            ->where('jobs.accept',1)
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->paginate(9);

        $JobsCount = Jobs::where('accept',1)->where('employments_id',$id)->count();

        return $this->apiResponse(['jobs' => $Jobs,'CountJobs' => $JobsCount],null,200);
    }
    


    public function getJobsByUserID($id){
        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.user_id',$id)
            ->where('jobs.accept',1)
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->paginate(9);

        $JobsCount = Jobs::where('accept',1)->where('user_id',$id)->count();

        return $this->apiResponse(['jobs' => $Jobs, 'jobsCount' => $JobsCount],null,200);
    }

    // // Get All Job Applicants By Candidate
    public function getAllJobProvided(){
        $JobApplicants = ApplyForJobs::join('jobs','apply_for_jobs.job_id','=','jobs.id')
            ->join('users','apply_for_jobs.user_id','=','users.id')
            ->join('user_info','apply_for_jobs.user_id','=','user_info.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->where('apply_for_jobs.user_id',Auth::id())
            ->select('apply_for_jobs.*','jobs.*','companies.logo','apply_for_jobs.id as apply_id','cities.title as cityTitle')->paginate(12);

        // Get Count Apply
        $countApply = ApplyForJobs::where('user_id','=',Auth::id())->count();

        return $this->apiResponse(['JobApplicants' => $JobApplicants,'countApply' => $countApply],null,200);
    }

    // Get All My Job Employments
    public function GetAllMyJob(){
        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.user_id',Auth::id())
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->paginate(9);

        // Get Count All My Job
        $CountAllMyJob = Jobs::where('user_id',Auth::id())->count();
        // Get Count Job Active
        $CountAllMyJobActive = Jobs::where('user_id',Auth::id())->where('accept',1)->count();
        // Get Count Apply
        $countApply = ApplyForJobs::join('jobs','apply_for_jobs.job_id','=','jobs.id')->where('jobs.user_id','=',Auth::id())->count();

        $JobsCount = Jobs::where('accept',1)->where('user_id',Auth::id())->count();

        return $this->apiResponse(['jobs' => $Jobs, 'jobCount' => $JobsCount, 'contAllMyJob' => $CountAllMyJob, 'CountAllMyJobActive' => $CountAllMyJobActive, 'CountApply' => $countApply]);
    }

    public function store(Request $request){
        // Validate
        $validate = Validator::make($request->all(),[
            'years_of_experience' => 'min:3|required',
            'computer'            => 'min:3|required',
            'gander'              => 'min:3|required',
            'qualification'       => 'min:3|required',
            'english_language'    => 'min:3|required',
            'microsoft_office'    => 'min:3|required',
            'age'                 => 'min:3|required',
            'Job_type'            => 'min:3|required',
            'Job_title'           => 'min:2|required',
            'employments_id'      => 'numeric|required',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null, $validate->errors(), 404);
        }else{

            // Get Companies
            $Companies = Companies::where('user_id',Auth::id())->first();
            // Insert Data In Database
            $jobs = new Jobs();
            $jobs->years_of_experience = $request->input('years_of_experience');
            $jobs->computer            = $request->input('computer');
            $jobs->gander              = $request->input('gander');
            $jobs->qualification       = $request->input('qualification');
            $jobs->english_language    = $request->input('english_language');
            $jobs->microsoft_office    = $request->input('microsoft_office');
            $jobs->age                 = $request->input('age');
            $jobs->other_conditions    = $request->input('other_conditions');
            $jobs->basic_salary        = $request->input('basic_salary');
            $jobs->Job_type            = $request->input('Job_type');
            $jobs->Job_title           = $request->input('Job_title');
            $jobs->employments_id      = $request->input('employments_id');
            $jobs->user_id             = Auth::id();
            $jobs->city_id             = $Companies->city_id;
            $jobs->job_details         = $request->input('job_details');
            $jobs->accept              = 0;
            $jobs->save();

            return $this->apiResponse('Added Success',null,201);
        }
    }

    public function update($id,Request $request){

        $jobs = Jobs::find($id);

        if(!$jobs){
            return $this->apiResponse(null, 'Job Not Found', 404);
        }
        // Validate
        $validate = Validator::make($request->all(),[
            'years_of_experience' => 'min:3|required',
            'computer'            => 'min:3|required',
            'gander'              => 'min:3|required',
            'qualification'       => 'min:3|required',
            'english_language'    => 'min:3|required',
            'microsoft_office'    => 'min:3|required',
            'age'                 => 'min:3|required',
            'Job_type'            => 'min:3|required',
            'Job_title'           => 'min:2|required',
            'employments_id'      => 'numeric|required',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null, $validate->errors(), 404);
        }else{
            // Insert Data In Database
            $jobs->years_of_experience = $request->input('years_of_experience');
            $jobs->computer            = $request->input('computer');
            $jobs->gander              = $request->input('gander');
            $jobs->qualification       = $request->input('qualification');
            $jobs->english_language    = $request->input('english_language');
            $jobs->microsoft_office    = $request->input('microsoft_office');
            $jobs->age                 = $request->input('age');
            $jobs->other_conditions    = $request->input('other_conditions');
            $jobs->basic_salary        = $request->input('basic_salary');
            $jobs->Job_type            = $request->input('Job_type');
            $jobs->Job_title           = $request->input('Job_title');
            $jobs->employments_id      = $request->input('employments_id');
            $jobs->city_id             = $request->input('city_id');
            $jobs->job_details         = $request->input('job_details');

            $jobs->save();
            return $this->apiResponse('Updated Success');
        }
    }

    public function show($id){
        // job Details
        $Job = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.accept',1)
            ->where('jobs.id',$id)
            ->select('jobs.*','companies.title as companeyName','companies.address','companies.website','companies.logo','cities.title as cityTitle','users.username','users.phone','users.email')->first();

        if(!$Job){
           return $this->apiResponse(null,'Job Not Found',404);
        }
        // Jobs My Companey Recent Jobs
        $UserID = $Job->user_id;
        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.accept',1)
            ->where('jobs.user_id',$UserID)
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->take(6)->get();

        //return view('front.jobs.job_details',compact('Job','Jobs'));
        return $this->apiResponse(['jobDetails' => $Job, 'RecentJobs' => $Jobs]);
    }

    public function destroy($id){
        $job = Jobs::find($id);
        if($job->user_id == Auth::id()){
            $job->Delete();
            return $this->apiResponse('Deleted Success');
        }else{
            return $this->apiResponse(null,'Job Not Found',404);
        }
    }

}
