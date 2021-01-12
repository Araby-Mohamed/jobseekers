<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    /**
     * Show Page Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.profile');
    }
    
    
    
    public function update(Request $request)
    {
        // Get ID Admin From Auth
        $getId = Auth::guard('admin')->user()->id;
        // Get Admin By ID
        $admin = Admin::find($getId);

        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|unique:admins,email,'.$admin->id,
            'phone' => 'required'
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

        Session::flash('success', 'Profile Updated Successfully');
        return redirect('admin/profile');
    }

}
