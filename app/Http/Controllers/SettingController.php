<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Setting;
class SettingController extends Controller
{
    public function index()
    {
        $settings=Setting::all();

        return view('admin.settings.index',compact('settings'));
    }

    public function store(Request $request,Setting $setting)
    {
        foreach(array_except($request->toArray(),['_token','site_btn']) as $key=>$req )
        {
            //the key of $request is input name
            $setting=$setting->where('name',$key)->get()[0];//can put first() replace of get()[0]
            //get th first data where name = input name 
            $setting->fill(['value'=>$req])->save();
        }

        return Redirect::back()->with('success','تم تحديث الاعدادات');
    }
}
