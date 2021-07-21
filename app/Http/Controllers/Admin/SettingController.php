<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::pluck("setting_value", "setting_key")->toArray();
        return view("admin.settings", compact("settings"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        foreach ($data as $setting_key => $setting_value) {
            Setting::updateOrCreate([
                "setting_key" => $setting_key,
            ], [
                "setting_value" => $setting_value
            ]);
        }
        return redirect()->back()->with("success_message", "Settings has been saved successdully.");
    }
}
