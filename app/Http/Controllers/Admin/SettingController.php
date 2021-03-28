<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function settings()
    {
        return view('admin.setting', get_defined_vars());
    }

    public function save(Request $req)
    {
        foreach ($req->except('_token') as $key => $value) {
            $setting = Setting::whereName($key)->first() ?? new Setting();
            if ($req->hasFile($key)) {
                $image_path =  uploadFile($value, 'uploads/cms', $key);
                $setting->name = $key;
                $setting->value = $image_path;
                $setting->save();
            } else{
                $setting->name = $key;
                $setting->value = $value;
                $setting->save();
            }
        }

        $msg = 'Settings Updated Successfully';
        return redirect()->back()->with('success', $msg);
    }

    public function homePage()
    {
        return view('admin.cms.home_page', get_defined_vars());
    }

    public function privateTours()
    {
        return view('admin.cms.private_tours', get_defined_vars());
    }

    public function everydayTaxi()
    {
        return view('admin.cms.everyday_taxi', get_defined_vars());
    }

    public function airportTransport()
    {
        return view('admin.cms.airport_transport', get_defined_vars());
    }

    public function cruiseTransport()
    {
        return view('admin.cms.cruise_transport', get_defined_vars());
    }
}
