<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.setting');
    }
    public function update(Request $request,Setting $setting)
    {

        foreach (config('app.languages') as $key => $lang)
        {
            $data[$key.'*.title'] = 'required';
            $data[$key.'*.content'] = 'required';
            $data[$key.'*.address'] = 'required';
        }
        $validated =  $request->validate($data);
        $setting->update($request->except('image','favicon','_token'));
        return back();
    }
}
