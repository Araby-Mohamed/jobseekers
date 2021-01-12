<?php

namespace App\Http\Controllers\Admin;

use App\Model\Employments;
use App\Model\Jobs;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // get count employers
        $employer = User::where('level', 'employer')->where('accept', 1)->count();
        // get count candidate
        $candidate = User::where('level', 'candidate')->count();
        // get count works
        $work = Employments::count();
        // get Count Jobs
        $jobs = Jobs::count();

        return view('admin.index', [
            'employer' => $employer,
            'candidate' => $candidate,
            'work' => $work,
            'jobs' => $jobs
        ]);
    }
}
