<?php

namespace App\Http\Controllers\api\providers;

use App\Http\Controllers\Controller;
use App\WorkingDayes;
use Illuminate\Http\Request;
use App\Provider;
use App\VerificationCode;
use App\Http\Resources\Provider as ProviderResources;

class ProviderController extends Controller
{

    public function login(Request $request){

        $this->validate($request, [
           'phone' => 'required'
        ]);

        if(VerificationCode::generate($request->phone)) {

            return response()->json(['message' => trans('provider_api.verification_sent'), 'data' => ['phone' => $request->phone], 'status' => 1]);


        } else {

            return response()->json(['message' => trans('provider_api.verification_not_sent'), 'status' => 0]);

        }

    }

    public function verify(Request $request) {

        $this->validate($request, [
            'phone' => 'required',
            'code' => 'required'
        ]);

        $code = VerificationCode::where(['phone' => $request->phone, 'code' => $request->code])->first();

        if($code) {

            $code->delete();

            $provider = Provider::where('phone', $code->phone)->first();

            if($provider) {

                if($provider->active != 1) {

                    return response()->json(['message' => __('provider_api.inactive'), 'data' => ['phone' => $code->phone], 'status' => 0]);

                }

                $provider->status = 1;
                $provider->save();

                $data['provider'] = new ProviderResources($provider);
                $data['token'] =  $provider->createToken($provider->name)->accessToken;
                return response()->json(['message' => __('provider_api.logged_in'), 'data' => $data, 'status' => 1]);

            }else {

                return response()->json(['message' => __('provider_api.user_not_registered'), 'data' => ['phone' => $code->phone], 'status' => 0]);

            }

        }else {

            return response()->json(['message' => trans('provider_api.incorrect_code'), 'status' => 0]);

        }

    }

    public function register(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|unique:providers',
            'country_id' => 'required',
            'specialty_id' => 'required',
            'image' => 'required|image'
        ]);

        $provider = new Provider;

        $image = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/providers/'), $image);

        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->country_id = $request->country_id;
        $provider->specialty_id = $request->specialty_id;
        $provider->description = $request->description;
        $provider->image = $image;
        $provider->save();

        $week = new WorkingDayes;
        $week->provider_id = $provider->id;
        $week->save();

        $data['provider'] = new ProviderResources($provider);
        $data['token'] =  $provider->createToken($provider->name)->accessToken;

        return response()->json(['message' => trans('provider_api.registered'), 'data' => $data, 'status' => 1]);

    }

    public function update(Request $request, $provider) {

        $provider = Provider::find($provider);

        if($provider) {

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
            $provider->save();

            $data['provider'] = new ProviderResources($provider);

            return response()->json(['message' => trans('provider_api.updated'), 'data' => $data, 'status' => 1]);

        } else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function updateContact(Request $request, $provider) {

        $provider = Provider::find($provider);

        if($provider) {

            $provider->email = $request->email;
            $provider->facebook = $request->facebook;
            $provider->twitter = $request->twitter;
            $provider->instagram = $request->instagram;
            $provider->whatsapp = $request->whatsapp;
            $provider->snapchat = $request->snapchat;
            $provider->website = $request->website;
            $provider->save();

            $data['provider'] = new ProviderResources($provider);

            return response()->json(['message' => trans('provider_api.contactUpdated'), 'data' => $data, 'status' => 1]);

        }else  {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function ProviderProfile($provider) {

        $provider = Provider::find($provider);

        if($provider) {

            return new ProviderResources($provider);

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function logout(Request $request) {

        $provider = $request->user();

        $provider->status = 0;
        $provider->save();

        $request->user()->token()->delete();

        return response()->json(['message' => trans('provider_api.logged_out'), 'status' => 1]);

    }

}
