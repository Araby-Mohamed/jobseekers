<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ApplyForJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ApplyForJobsController extends Controller
{
    public function store(Request $request)
    {
            $ApplyForJobs = new ApplyForJobs();
            $ApplyForJobs->user_id = Auth::id();
            $ApplyForJobs->job_id = $request->input('job_id');
            // Get Apply Job By User Id
            $JobsApply = ApplyForJobs::where('user_id',Auth::id())->where('job_id',$request->input('job_id'))->count();
            if($JobsApply >= 1){
                return back()->withErrors('You\'ve already introduced this job.');
            }else {
                $ApplyForJobs->save();
                Session::flash('success', 'The job has been successfully submitted');
                return back();
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

            return view('front.Job_Applicants.employer_my_job_applicants',compact('JobApplicants'));
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
            Session::flash('success','Item Deleted Successfully');
            return back();
        }else{
            abort(404);
        }
    }

    // Delete Applicants on My Job
    public function destroyMyApplicants($id){
        $Apply = ApplyForJobs::where('user_id',Auth::id())->where('id',$id)->get()->first();

        if($Apply != null){
            $Apply->delete();
            Session::flash('success','Item Deleted Successfully');
            return back();
        }else{
            abort(404);
        }
    }
}
