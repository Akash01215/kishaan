<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
   public function index()
    {
        $settings = SiteSetting::all()->keyBy('key')->pluck('value', 'key')->toArray();
        return view('backend.settings.form', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sitename'   => 'required|string|max:255',
            'address'    => 'required|string|max:255',
            'phone'      => 'required|digits:10',
            'email'      => 'required|email|max:255',
            'facebook'   => 'nullable|url',
            'instagram'  => 'nullable|url',
            'logo'       => 'nullable|image|mimes:jpeg,png,jpg,svg|max:8048',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logoPath = $logo->storeAs('public/logos', $logoName);
            $logoUrl = 'storage/logos/' . $logoName;

            $oldLogo = SiteSetting::where('key', 'logo')->value('value');
            if ($oldLogo && Storage::exists(str_replace('storage/', 'public/', $oldLogo))) {
                Storage::delete(str_replace('storage/', 'public/', $oldLogo));
            }

            SiteSetting::updateOrCreate(['key' => 'logo'], ['value' => $logoUrl]);
        }

        // Loop for text inputs
         foreach ($request->except(['_token', 'logo']) as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

