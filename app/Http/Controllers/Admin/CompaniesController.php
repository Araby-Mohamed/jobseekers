<?php

namespace App\Http\Controllers\Admin;

use App\Model\Cities;
use App\Model\Companies;
use App\Model\Employments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class CompaniesController extends Controller
{


    /**
     * Get all companies
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all companies
        $companies = Companies::orderBy('id', 'DESC')
            ->where('users.accept', 1)
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->select('companies.*', 'users.username')
            ->paginate(9);

        return view('admin.companies.index', ['companies' => $companies]);
    }


    /**
     * View Page Details Company
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get all companies
        $company = Companies::where('companies.id', $id)
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->join('cities', 'companies.city_id', '=', 'cities.id')
            ->join('employments', 'companies.employment_id', '=', 'employments.id')
            ->select('companies.*', 'users.username', 'cities.title as company_city', 'employments.title as work')
            ->first();

        // if not existing data company
        if(!$company)
            abort(503);

        return view('admin.companies.view', ['company' => $company]);
    }


    /**
     * View Page Edit Company
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data company
        $company = Companies::find($id);
        // if not existing data company
        if(!$company)
            abort(503);

        // get all employments
        $works = Employments::all();
        // get all cities
        $cities = Cities::all();

        return view('admin.companies.edit', ['company' => $company, 'works' => $works, 'cities' => $cities]);
    }


    /**
     * update Company
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        // get data company
        $company = Companies::find($id);
        // if not existing data company
        if(!$company)
            abort(503);

        // validation to inputs form
        $this->validate($request, [
            'title' => 'required',
            'city' => 'required|numeric',
            'work' => 'required|numeric',
            'email_company' => 'required|email',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png|max:2000',
        ], [], [
            'company_email' => 'company email',
        ]);

        // update company
        $company->title = $request->input('title');
        $company->city_id = $request->input('city');
        $company->email_company = $request->input('email_company');
        $company->address = $request->input('address');
        $company->website = $request->input('website');
        $company->facebook = $request->input('facebook');
        $company->twitter = $request->input('twitter');
        $company->linkedin = $request->input('linkedin');
        $company->Description = $request->input('Description');

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
                if(file_exists('images/companies/'.$oldLogo)) {
                    // Delete old image
                    File::Delete('images/companies/'.$oldLogo);
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

        Session::flash('success', 'Company Updated Successfully');
        return redirect('admin/companies');
    }

}
