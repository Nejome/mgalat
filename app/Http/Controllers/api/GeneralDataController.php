<?php

namespace App\Http\Controllers\api;

use App\Department;
use App\Http\Controllers\Controller;
use App\Provider;
use App\Specialty;
use Illuminate\Http\Request;
use App\Setting;
use App\Http\Resources\Setting as SettingResource;
use App\Country;
use App\Http\Resources\Country as CountryResource;
use App\Http\Resources\Department as DepartmentResource;
use App\Http\Resources\Specialty as SpecialtyResource;
use App\Http\Resources\Provider as ProviderResource;
use Illuminate\Support\Facades\DB;
use App\ApplicationRate;

class GeneralDataController extends Controller
{

    public function getSettings() {

        return new SettingResource($settings = Setting::find(1));

    }

    public function getCountries() {

        return CountryResource::collection(Country::all());

    }

    public function getDepartments() {

        return DepartmentResource::collection(Department::all());

    }

    public function departmentSpecialties($department) {

        $department = Department::find($department);

        if($department) {

            return SpecialtyResource::collection($department->specialty);

        }else {

            return response()->json(['message' => trans('general_api.departmentNotExist'), 'status' => 0]);

        }

    }

    public function getSpecialties() {

        return SpecialtyResource::collection(Specialty::all());

    }

    public function specialtyProviders($specialty) {

        $specialty = Specialty::find($specialty);

        if($specialty) {

            return ProviderResource::collection($specialty->providers);

        }else {

            return response()->json(['message' => trans('general_api.specialtyNotExist'), 'status' => 0]);

        }

    }

    public function search(Request $request) {

        $message = [
            'text.required' => trans('general_api.searchTextValidation'),
            'lat.required' => trans('general_api.searchLocationValidation'),
            'lng.required' => trans('general_api.searchLocationValidation')
        ];

        $this->validate($request, [
            'text' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ], $message);

        $close_providers = DB::select(DB::raw('SELECT id, provider_id, ( 3959 * acos( cos( radians(' . $request->lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $request->lng . ') ) + sin( radians(' . $request->lat .') ) * sin( radians(lat) ) ) ) AS distance FROM provider_locations HAVING distance < ' . 51 . ' ORDER BY distance') );
        $close_providers_id = [];
        foreach ($close_providers as $row){
            $close_providers_id[] = $row->provider_id;
        }

        $specialties = Specialty::where('title->'.app()->getLocale(),'LIKE','%'.$request->text.'%')->get();
        $specialties_id = [];
        foreach ($specialties as $row){
            $specialties_id[] = $row->id;
        }

        $special_providers_count = 0;
        $normal_providers_count = 0;

        $providers = Provider::whereIn('id', $close_providers_id)
            ->whereIn('specialty_id', $specialties_id)
            ->OrderBy('is_special', 'desc')
            ->get();

        foreach($providers as $provider) {
            if($provider->is_special == 1) {
                $special_providers_count = $special_providers_count + 1;
            }else {
                $normal_providers_count = $normal_providers_count + 1;
            }
        }

        $data['specialties'] = SpecialtyResource::collection($specialties);
        $data['providers'] = ProviderResource::collection($providers);
        $data['special_providers_count'] = $special_providers_count;
        $data['normal_providers_count'] = $normal_providers_count;

        if($providers->count()) {

            return response()->json(['data' => $data, 'status' => 1]);

        }else {

            return response()->json(['message' => trans('general_api.noSearchResult'), 'status' => 0]);

        }

    }

    public function rateApplication(Request $request) {

        $this->validate($request, [
            'security' => 'required|numeric|min:0|max:100',
            'effectiveness' => 'required|numeric|min:0|max:100',
            'technical_support' => 'required|numeric|min:0|max:100',
            'responsiveness' => 'required|numeric|min:0|max:100',
        ]);

        $rate = new ApplicationRate;
        $rate->security = $request->security;
        $rate->effectiveness = $request->effectiveness;
        $rate->technical_support = $request->technical_support;
        $rate->responsiveness = $request->responsiveness;
        $rate->save();

        return response()->json(['message' => trans('provider_api.rated'), 'status' => 1]);

    }

    public function getApplicationRateTotal() {

        $data['security'] = ApplicationRate::securityTotal();
        $data['effectiveness'] = ApplicationRate::effectivenessTotal();
        $data['technical_support'] = ApplicationRate::technicalSupportTotal();
        $data['responsiveness'] = ApplicationRate::responsivenessTotal();

        return response()->json(['data' => $data, 'status' => 1]);

    }

}
