<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    protected $redirectTo = '/admin/home';

    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('admin');
    }


    /**
     * Show Page Login Admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login_get()
    {
        return view('admin.auth.login');
    }


    /**
     * Login Admin
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login_post(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ],[],[
            'email' => 'E-mail',
            'password' => 'Wachtwoord'
        ]);

        // store remember in var if true or false
        $remember = $request->input('remember') ? true : false;
        // if attempt request email and password => login true
        if(Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {

            return redirect('admin/home');
        } else if (Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            return redirect('admin/home');

        }else{
            Session::flash("danger","Oops, it seems that you entered an incorrect username or password");
            return redirect('admin/login');
        }
    }


    /**
     * Logout Admin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if(auth()->guard('admin')->check()){
            Auth::guard('admin')->logout();
        }

        return redirect('/admin/login');
    }
}
