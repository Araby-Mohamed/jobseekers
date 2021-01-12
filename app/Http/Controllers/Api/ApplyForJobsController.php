<?php

namespace App\Http\Controllers\Api;

use App\Model\ApplyForJobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
class ApplyForJobsController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request)
    {
        $ApplyForJobs = new ApplyForJobs();
        $ApplyForJobs->user_id = Auth::id();
        $ApplyForJobs->job_id = $request->input('job_id');
        // Get Apply Job By User Id
        $JobsApply = ApplyForJobs::where('user_id',Auth::id())->where('job_id',$request->input('job_id'))->count();
        if($JobsApply >= 1){
            return $this->apiResponse(null,'You\'ve already introduced this job.','404');
        }else {
            $ApplyForJobs->save();
            return $this->apiResponse('The job has been successfully submitted');

        }
    }

    // Get All Job Applicants By Employer
    public function getAllJobApplicants($id){
        $JobApplicants = ApplyForJobs::join('jobs','apply_for_jobs.job_id','=','jobs.id')
            ->join('users','apply_for_jobs.user_id','=','users.id')
            ->join('user_info','apply_for_jobs.user_id','=','user_info.user_id')
            ->where('jobs.id',$id)
            ->where('jobs.user_id',Auth::id())
            ->select('apply_for_jobs.*','apply_for_jobs.id as apply_id','users.*','user_info.*','jobs.Job_title')->get();

        return $this->apiResponse($JobApplicants);
    }

    public function checkApplyForJob(Request $request){
        // validation data
        $validator = Validator::make($request->all(),[
            "job_id" => "required|numeric",
        ]);

        // if get errors validations
        if($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 404);

        } else {
            $check = ApplyForJobs::where('user_id',Auth::id())->where('job_id', $request->input('job_id'))->first();

            if($check) {
                return $this->apiResponse(['check' => true]);

            } else {
                return $this->apiResponse(['check' => false]);

            }

        }
    }

    // Delete Applicants on My Job
    public function destroy($id){
        $Apply = ApplyForJobs::join('jobs','apply_for_jobs.job_id','=','jobs.id')
            ->where('jobs.user_id',Auth::id())
            ->where('apply_for_jobs.id',$id)
            ->select('apply_for_jobs.id')
            ->get()->first();

        if($Apply != null){
            $Apply->delete();
            return $this->apiResponse('Item Deleted Successfully');
        }else{
            return $this->apiResponse(null,'Item Not Found',404);
        }
    }

    // Delete Applicants on My Job
    public function destroyMyApplicants($id){
        $Apply = ApplyForJobs::where('user_id',Auth::id())->where('id',$id)->get()->first();

        if($Apply != null){
            $Apply->delete();
            return $this->apiResponse('Item Deleted Successfully');
        }else{
            return $this->apiResponse('Item Not Found');
        }
    }
}
