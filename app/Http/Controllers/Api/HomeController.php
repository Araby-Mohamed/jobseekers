<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WorksResources;
use App\Model\Employments;
use App\Model\Jobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use ApiResponseTrait;


    public function index()
    {
        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.accept',1)
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->take(6)->get();

        // Gel Some Employments
        $Employments =  WorksResources::collection(Employments::take(8)->get());

        return $this->apiResponse(['Employments' => $Employments , 'Jobs' => $Jobs]);
    }

    public function search(Request $request){
        // Search Job
        $query = $request->input('query');
        $searchQuery = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.accept','=',1)
            ->where('jobs.Job_title','Like','%'.$query.'%')
            ->select('jobs.*','companies.title as companeyName','companies.logo','cities.title as cityTitle','users.username')->paginate(20);


        $jobSearchCount = Jobs::where('Job_title','Like','%'.$query.'%')
            ->where('accept',1)->count();

        return $this->apiResponse(['searchResult' => $searchQuery , 'jobSearchCount' => $jobSearchCount]);

    }
}