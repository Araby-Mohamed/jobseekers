<?php

namespace App\Http\Controllers\Api;

use App\Model\Companies;
use App\Model\Jobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployerController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $Companies = Companies::join('employments','companies.employment_id','=','employments.id')
            ->join('cities','companies.city_id','=','cities.id')
            ->select('companies.*','employments.title as titleEmployments','cities.title as titleCity')->paginate(16);

        $count = Companies::count();

        return $this->apiResponse(['company' => $Companies, 'count' => $count],null,200);
    }

    public function show($id){
        $Company = Companies::join('employments','companies.employment_id','=','employments.id')
            ->join('cities','companies.city_id','=','cities.id')
            ->join('users','companies.user_id','users.id')
            ->where('companies.id',$id)
            ->select('companies.*','employments.title as titleEmployments','users.phone','cities.title as titleCity')->first();


        $user_id = $Company->user_id;

        $Jobs = Jobs::join('users','jobs.user_id','=','users.id')
            ->join('companies','jobs.user_id','=','companies.user_id')
            ->join('cities','jobs.city_id','=','cities.id')
            ->where('jobs.accept',1)
            ->where('jobs.user_id',$user_id)
            ->select('jobs.*','companies.title as companeyName','cities.title as cityTitle')->limit(9)->get();

        $JobsCount = Jobs::where('user_id',$user_id)->where('accept',1)->count();

        if($Company){
            return $this->apiResponse(['companyDetails' => $Company,'JobsFromBusinessNetwork' => $Jobs,'countJob' => $JobsCount],null,200);
        }else {
            return $this->apiResponse(null,'Company Not Found',404);
        }
    }
}
