<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\SettingLogo;
use Illuminate\Http\Request;

class SettingLogoController extends Controller
{
    public function editLogo()
    {
        $setting = SettingLogo::first();
        return view('Admin.setting.logo', compact('setting'));
    }
    public function updateLogo(Request $request)
    {

        $setting = SettingLogo::updateOrCreate(
            [
                'id' => '1'
            ],
            [
                'logo' => $request->logo
            ],
        );


        return redirect()->route('logo.edit')->with('status', "Cập nhật logo thành công");
    }
}
