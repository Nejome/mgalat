<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;
use App\ProviderImage;
use App\Setting;
use File;

class ProviderImageController extends Controller
{

    public function index(Provider $provider) {

        $images = $provider->images;

        return view('admin.providers.images', compact(['provider', 'images']));

    }

    public function store_image(Request $request, Provider $provider) {

        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'required|image',
        ]);

        $setting = Setting::find(1);

        if($provider->images->count() < $setting->max_providers_images){

            $image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/providers_images/'), $image);

            $gallery = new ProviderImage;
            $gallery->provider_id = $provider->id;
            $gallery->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
            $gallery->image = $image;
            $gallery->save();

            session()->flash('created', 'تمت اضافة الصورة الجديدة بنجاح');
            return back();

        }else {

            session()->flash('max', 'عفوا لقد بلغ عدد صور مزود الخدمة العدد الاقصي المحدد في الاعدادات');
            return back();

        }

    }

    public function delete_image(ProviderImage $image) {

        if(file_exists(public_path('uploads/providers_images/'.$image->image))){
            File::delete(public_path('uploads/providers_images/'.$image->image));
        }

        $image->delete();

        session()->flash('deleted', 'تم حذف الصورة بنجاح');
        return back();

    }

}
