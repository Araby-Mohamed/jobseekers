<?php

namespace App\Http\Controllers\Front;
use App\Model\Employments;
use App\Http\Controllers\Controller;
use App\Model\Jobs;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index(){
        $Categories = Employments::paginate(16);
        return view('front.Works.categories',['Categories' => $Categories]);
    }
}
