<?php

namespace App\Http\Controllers\Admin;

use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class SettingController extends Controller
{


    /**
     * view Setting Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get data setting from DB
        $setting = Setting::find(1);
        return view('admin.setting.edit', ['setting' => $setting]);
    }


    public function update(Request $request)
    {
        // Get Setting By id equal 1
        $setting = Setting::find(1);
        // if setting not return true => abort 503
        if(!$setting)
            abort(503);

        $this->validate($request, [
            'site_name' => 'required',
            'email' => 'required|email',
            'logo' => 'image|mimes:jpg,jpeg,png|max:2000',
            'favicon' => 'image|mimes:jpg,jpeg,png|max:2000',
        ],[],[
            'site_name' => 'Site Name',
        ]);


        $setting->site_name = $request->input('site_name');
        $setting->phone_1 = $request->input('phone_1');
        $setting->phone_2 = $request->input('phone_2');
        $setting->email = $request->input('email');
        $setting->address = $request->input('address');
        $setting->facebook = $request->input('facebook');
        $setting->linkedin = $request->input('linkedin');
        $setting->instagram = $request->input('instagram');
        $setting->telephone = $request->input('telephone');
        $setting->keywords = $request->input('keywords');
        $setting->description = $request->input('description');

        $logo = $request->file('logo');
        // Get old Logo
        $oldLogo = $setting->logo;

        if($logo)
        {
            // Rename Image
            $newImage = date('y-m-d-g-i-s-').$logo->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($logo->move('images/setting', $newImage))
            {
                // if exist path old image return true
                if(file_exists('images/setting/'.$oldLogo)) {
                    // Delete old image
                    File::Delete('images/setting/'.$oldLogo);
                }
            }
            // else => upload new image
            $setting->logo = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $setting->logo = $oldLogo;
        }



        $favicon = $request->file('favicon');
        // Get old Logo
        $oldFavicon = $setting->favicon;

        if($favicon)
        {
            // Rename Image
            $newFavicon = date('y-m-d-g-i-s-').$favicon->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($favicon->move('images/setting', $newFavicon))
            {
                // if exist path old image return true
                if(file_exists('images/setting/'.$oldFavicon)) {
                    // Delete old image
                    File::Delete('images/setting/'.$oldFavicon);
                }
            }
            // else => upload new image
            $setting->favicon = $newFavicon;

        } else {
            // else => not choose new image
            // save old image
            $setting->favicon = $oldFavicon;
        }



        // Upload file
        $file = $request->file('file');
        // Get old File
        $oldFile = $setting->file;

        if($file)
        {
            // Rename file
            $newFile = date('y-m-d-g-i-s-').$file->getClientOriginalName();

            // Move file
            // IF Move file return true
            if($file->move('files/setting', $newFile))
            {
                // if exist path old file return true
                if(file_exists('files/setting/'.$oldFile)) {
                    // Delete old file
                    File::Delete('files/setting/'.$oldFile);
                }
            }
            // else => upload new file
            $setting->file = $newFile;

        } else {
            // else => not choose new file
            // save old file
            $setting->file = $oldFile;
        }


        $setting->save();

        Session::flash('success', 'Setting Updated Successfully');
        return redirect('admin/setting');
    }

}
