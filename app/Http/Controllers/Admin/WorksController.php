<?php

namespace App\Http\Controllers\Admin;

use App\Model\Employments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WorksController extends Controller
{

    /**
     * Get all works
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $works = Employments::get();

        return view('admin.works.index', ['works' => $works]);
    }


    /**
     * View page add new work
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.works.create');
    }


    /**
     * Store works in DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required',
           'icon' => 'required',
        ]);

        $work = new Employments();
        $work->title = $request->input('title');
        $work->icon = $request->input('icon');
        $work->save();

        Session::flash('success', 'Work Added Successfully');
        return redirect('admin/works');
    }


    /**
     * View page edit work
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data work
        $work = Employments::find($id);
        // if not work redirect page error
        if(!$work)
            abort(503);

        return view('admin.works.edit', ['work'=> $work]);
    }


    /**
     * Update work in DB
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        // get data work
        $work = Employments::find($id);
        // if not work redirect page error
        if(!$work)
            abort(503);

        // validation work
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
        ]);

        $work->title = $request->input('title');
        $work->icon = $request->input('icon');
        $work->save();

        Session::flash('success', 'Work Updated Successfully');
        return redirect('admin/works');
    }


    /**
     * Delete Work
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // get data work
        $work = Employments::find($id);
        // if not work redirect page error
        if(!$work)
            abort(503);

        $work->Delete();

        Session::flash('success', 'Work Deleted Successfully');
        return redirect('admin/works');
    }

}
