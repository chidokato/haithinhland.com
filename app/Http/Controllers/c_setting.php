<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;

class c_setting extends Controller
{
    public function getlist()
    {
    	$setting = setting::where('id',1)->first();
    	return view('admin.setting.list',['data'=>$setting]);
    }

    public function postedit(Request $Request,$id)
    {
        $setting = setting::find($id);
        $setting->name = $Request->name;
        $setting->address = $Request->address;
        $setting->email = $Request->email;
        $setting->hotline = $Request->hotline;
        $setting->hotline1 = $Request->hotline1;
        $setting->facebook = $Request->facebook;
        $setting->google_plus = $Request->google_plus;
        $setting->youtube = $Request->youtube;
        $setting->twitter = $Request->twitter;
        $setting->analytics = $Request->analytics;
        $setting->fb_app_id = $Request->fb_app_id;
        $setting->side_bar = $Request->side_bar;
        $setting->code_header = $Request->code_header;
        $setting->code_body = $Request->code_body;
        $setting->title = $Request->title;
        $setting->description = $Request->description;
        $setting->keywords = $Request->keywords;
        $setting->robot = $Request->robot;
        if($Request->img)
        {
            $setting->img = $Request->img;
        }

        $setting->save();

        return redirect('admin/setting/list')->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $setting = settingcan::find($id);
        $setting->delete();
        return redirect('admin/setting/list/'.$pid)->with('Alerts','Thành công');
    }
}
