<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        // Get All Jobs Accepted
        $jobs = Jobs::join('users','jobs.user_id','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','cities.id')
            ->join('employments','jobs.employments_id','employments.id')
            ->where('jobs.accept',1)
            ->select('jobs.id','jobs.Job_title','companies.title','companies.logo')
            ->paginate(9);

        // Get All Jobs Waiting
        $jobsWaiting = Jobs::join('users','jobs.user_id','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','cities.id')
            ->join('employments','jobs.employments_id','employments.id')
            ->where('jobs.accept',0)
            ->select('jobs.id','jobs.Job_title','companies.title','companies.logo')
            ->paginate(9);


        return view('admin.jobs.index',compact('jobs','jobsWaiting'));
    }

    public function show($id){
        $job = Jobs::join('cities','jobs.city_id','cities.id')
            ->join('employments','jobs.employments_id','employments.id')
            ->join('users','jobs.user_id','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->where('jobs.id',$id)
            ->select('jobs.*','users.username','users.email','users.phone','cities.title as cityTitle','employments.title as employmentsTitle','companies.logo','companies.title as companyName','companies.email_company')
            ->first();

        if($job){
            return view('admin.jobs.view',compact('job'));
        }else{
            abort(404);
        }
    }

    public function destroy($id){
        $job = Jobs::find($id);
        if($job){
            $job->delete();
            session()->flash('success','Job Deleted Successfully');
            return back();
        }else{
            abort(404);
        }
    }

    public function accept($id){
        $job = Jobs::find($id);
        if($job){
            $job->accept = 1;
            $job->save();
            session()->flash('success','Job Accepted Successfully');
            return back();
        }else{
            abort(404);
        }
    }
}
