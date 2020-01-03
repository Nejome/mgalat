<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;
use App\City;
use App\Specialty;
use App\ProviderLocation;

class ProviderController extends Controller
{

    public function index() {

       $providers = Provider::paginate(5);

       return view('admin.providers.index', compact(['providers']));

    }

    public function create() {

        $cities = City::all();

        $specialties = Specialty::all();

        return view('admin.providers.create', compact(['cities', 'specialties']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|unique:providers',
            'city_id' => 'required',
            'specialty_id' => 'required',
            'image' => 'required|image'
        ]);

        $image = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/providers/'), $image);

        $provider = new Provider;
        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->city_id = $request->city_id;
        $provider->specialty_id = $request->specialty_id;
        $provider->description = $request->description;
        $provider->image = $image;
        $provider->is_special = $request->is_special;
        $provider->active = 1;
        $provider->save();

        return redirect(url('admin/providers'))->with('created', 'تمت اضافة مزود الخدمة الجديد بنجاح');

    }

    public function active(Provider $provider) {

        $provider->active = 1;
        $provider->save();

        return back()->with('activated', 'تم تفعيل مزود الخدمة بنجاح');

    }

    public function disable(Provider $provider) {

        $provider->active = 3;
        $provider->save();

        return back()->with('disabled', 'تم تعطيل مزود الخدمة بنجاح');

    }

    public function contact(Provider $provider) {

        return view('admin.providers.contact', compact(['provider']));

    }

    public function updateContact(Request $request, Provider $provider) {

        $provider->email = $request->email;
        $provider->facebook = $request->facebook;
        $provider->twitter = $request->twitter;
        $provider->instagram = $request->instagram;
        $provider->whatsapp = $request->whatsapp;
        $provider->snapchat = $request->snapchat;
        $provider->website = $request->website;
        $provider->save();

        return redirect(url('admin/providers'))->with('contactUpdated', 'تم تعديل بيانات التواصل الخاصة بمزود الخدمة بنجاح');

    }

    public function location(Provider $provider) {

        $location = $provider->location;

        if($location){
            $lat = $location->lat;
            $lng = $location->lng;
        }else {
            $lat = 24.64670169330329;
            $lng = 46.65560080895057;
        }

        return view('admin.providers.location', compact(['provider', 'lat', 'lng']));

    }

    public function updateLocation(Request $request, Provider $provider) {

        $location = $provider->location;

        if(!$location){
            $location = new ProviderLocation;
            $location->provider_id = $provider->id;
        }

        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->save();

        return redirect(url('admin/providers'))->with('locationUpdated', 'تم تعديل موقع مزود الخدمة بنجاح');

    }

    public function edit(Provider $provider) {

        $cities = City::all();

        $specialties = Specialty::all();

        return view('admin.providers.edit', compact(['provider', 'cities', 'specialties']));

    }

    public function update(Request $request, Provider $provider) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'city_id' => 'required',
            'specialty_id' => 'required',
            'image' => 'image'
        ]);

        if($provider->phone != $request->phone){
            $this->validate($request, ['phone' => 'unique:providers']);
        }

        if(isset($request->image) && $request->image != ''){
            $new_image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/providers/'), $new_image);
            if(file_exists(public_path('uploads/providers/'.$provider->image))){
                unlink(public_path('uploads/providers/'.$provider->image));
            }
            $provider->image = $new_image;
        }

        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->city_id = $request->city_id;
        $provider->specialty_id = $request->specialty_id;
        $provider->description = $request->description;
        $provider->is_special = $request->is_special;
        $provider->save();

        return redirect(url('admin/providers'))->with('updated', 'تم تعديل بيانات مزود الخدمة بنجاح');

    }

    public function delete(Provider $provider) {

        if(file_exists(public_path('uploads/providers/'.$provider->image))){
            unlink(public_path('uploads/providers/'.$provider->image));
        }

        $provider->delete();

        return back()->with('deleted', 'تم حذف مزود الخدمة بنجاح');

    }

}
