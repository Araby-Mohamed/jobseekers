<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminsController extends Controller
{

    protected $level;

    /**
     * Check level auth
     * AdminsController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->level = auth()->guard('admin')->user()->level;
            // if level not equal superadmin or admin
            if($this->level == 1) {
                abort(503);
            }
            return $next($request);
        });
    }

    /**
     * get all admins where level equal 1 => admin only
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all admins Not get super admins where level 1
        $admins = Admin::orderBy('id', 'DESC')->where('level', 1)->get();
        return view('admin.admins.index', ['admins' => $admins]);
    }


    /**
     * Show Create add new admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // if level auth equal 1 => redirect home page
        if (Auth::guard('admin')->user()->level == 1) {
            Session::flash('warning', 'You do not have permission to access this page :(');
            return redirect('admin/home');
        }
        return view('admin.admins.create');
    }


    /**
     * Store Admin In DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'phone' => 'required|numeric',
        ]);

        $admin = new Admin();
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->phone = $request->input('phone');
        $admin->level = 1;
        $admin->save();

        Session::flash('success', 'Admin Added Successfully');
        return redirect('admin/admins');
    }



    public function view($id)
    {
        // get data admin by id
        $admin = Admin::find($id);
        // if admin return false => redirect abort 503
        if(!$admin)
            abort(503);
        return view('admin.admins.view', ['admin' => $admin]);

    }


    /**
     * View Page Edit Admin
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {

        // get data admin by id
        $admin = Admin::find($id);
        // if admin return false => redirect abort 503
        if(!$admin)
            abort(503);
        return view('admin.admins.edit', ['admin' => $admin]);

    }


    /**
     * Update Admin
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // get data admin by id
        $admin = Admin::find($id);
        // if admin return false => redirect abort 503
        if(!$admin)
            abort(503);

        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'phone' => 'required|numeric',
        ]);

        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->phone = $request->input('phone');

        // Get Old Password Admin
        $oldPassword = $admin->password;
        if(!empty($request->input('password'))) {
            $admin->password =  bcrypt($request->input('password'));
        } else {
            $admin->password = $oldPassword;
        }
        $admin->save();

        Session::flash('success', 'Admin Updated Successfully');
        return redirect('admin/admins');
    }


    /**
     * Delete Admin
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // get data admin by id
        $admin = Admin::find($id);
        // if admin return false => redirect abort 503
        if(!$admin)
            abort(503);

        $admin->Delete();
        // Delete Image

        Session::flash('success', 'Admin Deleted Successfully');
        return redirect('admin/admins');
    }


    /**
     * Multi Delete Data Admin Selected
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function multidelete(Request $request)
    {

        if(!empty($request->input('multidelet'))) {

            foreach ($request->input('multidelet') as $multidelete) {

                $admin = Admin::find($multidelete);
                // if admin return false => redirect abort 503 page
                if(!$admin) {
                    abort(503);
                }

                // Admin Delete
                $admin->Delete();
            }
        } else {
            Session::flash('warning', 'Not Selected Data Please Select Data');
            return redirect('admin/admins');
        }

        Session::flash('success', 'Admin Selected Deleted Successfully');
        return redirect('admin/admins');
    }

}
