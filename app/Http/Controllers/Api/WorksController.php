<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WorksResources;
use App\Model\Employments;
use App\Http\Controllers\Controller;

class WorksController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $Categories = WorksResources::collection(Employments::paginate(16));
        if($Categories){
            return $this->apiResponse($Categories,null,200);
        }else{
            return $this->apiResponse(null,'Categories Not Found',404);
        }
    }


}
