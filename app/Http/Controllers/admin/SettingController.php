<?php

namespace App\Http\Controllers\admin;

use App\ApplicationImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{

    public function index() {

        $setting = Setting::find(1);

        $images = ApplicationImage::all();

        return view('admin.settings.master', compact(['setting', 'images']));

    }

    public function updateSystem(Request $request) {

        $this->validate($request, [
           'title_ar' => 'required',
           'title_en' => 'required',
            'max_providers_images' => 'required|numeric'
        ]);

        $setting = Setting::find(1);

        $setting->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $setting->author = $request->author;
        $setting->max_providers_images = $request->max_providers_images;
        $setting->setTranslations('description', ['ar' => $request->description_ar, 'en' => $request->description_en]);
        $setting->keywords = $request->keywords;
        $setting->setTranslations('terms_conditions', ['ar' => $request->terms_conditions_ar, 'en' => $request->terms_conditions_en]);
        $setting->setTranslations('usage_policy', ['ar' => $request->usage_policy_ar, 'en' => $request->usage_policy_en]);
        $setting->save();

        return redirect()->back()->with('updated', 'تم تعديل الإعدادات بنجاح');

    }

    public function updateContact(Request $request) {

        $setting = Setting::find(1);
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->whatsapp = $request->whatsapp;
        $setting->save();

        return redirect()->back()->with('updated', 'تم تعديل الإعدادات بنجاح');

    }

    public function updateApplication(Request $request) {

        $setting = Setting::find(1);
        $setting->android_link = $request->android_link;
        $setting->ios_link = $request->ios_link;
        $setting->application_version = $request->application_version;
        $setting->application_video_link = $request->application_video_link;
        $setting->save();

        return redirect()->back()->with('updated', 'تم تعديل الإعدادات بنجاح');

    }

}
