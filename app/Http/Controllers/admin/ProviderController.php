<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\ProviderRating;
use Illuminate\Http\Request;
use App\Provider;
use App\Country;
use App\Specialty;
use App\ProviderLocation;
use App\WorkingDayes;

class ProviderController extends Controller
{

    public function index() {

       $providers = Provider::latest()->paginate(5);

       return view('admin.providers.index', compact(['providers']));

    }

    public function create() {

        $countries = Country::all();

        $specialties = Specialty::all();

        return view('admin.providers.create', compact(['countries', 'specialties']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|unique:providers',
            'country_id' => 'required',
            'specialty_id' => 'required',
            'image' => 'required|image'
        ]);

        $provider = new Provider;

        if($request->is_special == 1) {
            $this->validate($request, [
                'special_until' => 'required|date'
            ]);
            $provider->special_until = $request->special_until;
        }

        $image = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/providers/'), $image);

        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->country_id = $request->country_id;
        $provider->specialty_id = $request->specialty_id;
        $provider->description = $request->description;
        $provider->image = $image;
        $provider->is_special = $request->is_special;
        $provider->active = 1;
        $provider->save();

        $week = new WorkingDayes;
        $week->provider_id = $provider->id;
        $week->save();

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

    public function rates(Provider $provider) {

        return view('admin.providers.rates', compact(['provider']));

    }

    public function deleteRate(ProviderRating $rate) {

        $rate->delete();

        return back()->with('deleted', 'تم حذف التقييم بنجاح');

    }

    public function edit(Provider $provider) {

        $countries = Country::all();

        $specialties = Specialty::all();

        return view('admin.providers.edit', compact(['provider', 'countries', 'specialties']));

    }

    public function show(Provider $provider) {

        return view('admin.providers.show', compact(['provider']));

    }

    public function update(Request $request, Provider $provider) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'country_id' => 'required',
            'specialty_id' => 'required',
            'image' => 'image'
        ]);

        if($provider->phone != $request->phone){
            $this->validate($request, ['phone' => 'unique:providers']);
        }

        if($request->is_special == 1) {
            $this->validate($request, [
                'special_until' => 'required|date'
            ]);
            $provider->special_until = $request->special_until;
        }

        if($request->is_special == 0) {
            $provider->special_until = null;
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
        $provider->country_id = $request->country_id;
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
