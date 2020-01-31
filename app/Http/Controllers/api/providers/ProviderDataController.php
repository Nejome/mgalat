<?php

namespace App\Http\Controllers\api\providers;

use App\Http\Controllers\Controller;
use App\ProviderImage;
use App\ProviderLocation;
use App\ProviderRating;
use App\Setting;
use Illuminate\Http\Request;
use App\Provider;
use App\Http\Resources\WorkingDays as WorkingDaysResource;
use App\Http\Resources\ProviderImage as ProviderImageResource;
use App\Http\Resources\ProviderLocation as ProviderLocationResource;
use App\Http\Resources\ProviderRating as ProviderRatingResource;
use File;

class ProviderDataController extends Controller
{

    public function getWorkingDays($provider) {

        $provider = Provider::find($provider);

        if($provider) {

            return new WorkingDaysResource($provider->workingDays);

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function updateWorkingDays(Request $request, $provider) {

        $provider = Provider::find($provider);

        if($provider) {

            $days['saturday']  = ['from' => $request->saturday_from != ''? $request->saturday_from : '-', 'to' => $request->saturday_to != null? $request->saturday_to : '-'];
            $days['sunday']  = ['from' => $request->sunday_from != ''? $request->sunday_from : '-', 'to' => $request->sunday_to != null? $request->sunday_to : '-'];
            $days['monday']  = ['from' => $request->monday_from != ''? $request->monday_from : '-', 'to' => $request->monday_to != null? $request->monday_to : '-'];
            $days['tuesday']  = ['from' => $request->tuesday_from != ''? $request->tuesday_from : '-', 'to' => $request->tuesday_to != null? $request->tuesday_to : '-'];
            $days['wednesday']  = ['from' => $request->wednesday_from != ''? $request->wednesday_from : '-', 'to' => $request->wednesday_to != null? $request->wednesday_to : '-'];
            $days['thursday']  = ['from' => $request->thursday_from != ''? $request->thursday_from : '-', 'to' => $request->thursday_to != null? $request->thursday_to : '-'];
            $days['friday']  = ['from' => $request->friday_from != ''? $request->friday_from : '-', 'to' => $request->friday_to != null? $request->friday_to : '-'];

            $week = $provider->workingDays;

            $week->saturday = json_encode($days['saturday']);
            $week->sunday = json_encode($days['sunday']);
            $week->monday = json_encode($days['monday']);
            $week->tuesday = json_encode($days['tuesday']);
            $week->wednesday = json_encode($days['wednesday']);
            $week->thursday = json_encode($days['thursday']);
            $week->friday = json_encode($days['friday']);
            $week->save();

            $data['workingDays'] = new WorkingDaysResource($provider->workingDays);

            return response()->json(['message' => trans('provider_api.workingDaysUpdated'), 'data' => $data, 'status' => 1]);

        } else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function getImages($provider) {

        $provider = Provider::find($provider);

        if($provider) {

            if($provider->images->count()) {

                return ProviderImageResource::collection($provider->images);

            }else {

                return response()->json(['message' => trans('provider_api.noImage'), 'status' => 0]);

            }

        } else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function addImage(Request $request, $provider) {

        $provider = Provider::find($provider);

        if($provider) {

            if($provider->is_special){

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

                    $data['image'] = new ProviderImageResource($gallery);

                    return response()->json(['message' => trans('provider_api.imageAdded'), 'data' => $data, 'status' => 1]);

                }else {

                    return response()->json(['message' => trans('provider_api.cannotAddImage'), 'status' => 0]);

                }

            } else {

                return response()->json(['message' => trans('provider_api.cannotAddImageNotSpecial'), 'status' => 0]);

            }

        } else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function deleteImage($image) {

        $image = ProviderImage::find($image);

        if($image) {

            if(file_exists(public_path('uploads/providers_images/'.$image->image))){
                File::delete(public_path('uploads/providers_images/'.$image->image));
            }

            $image->delete();

            return response()->json(['message' => trans('provider_api.imageDeleted'), 'status' => 1]);

        } else {

            return response()->json(['message' => trans('provider_api.imageNotExist'), 'status' => 0]);

        }

    }

    public function getLocation($provider) {

        $provider = Provider::find($provider);

        if($provider) {

            if($provider->location) {

                return new ProviderLocationResource($provider->location);

            }else {

                return response()->json(['message' => trans('provider_api.noLocation'), 'status' => 0]);

            }

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function updateLocation(Request $request, $provider) {

        $provider = Provider::find($provider);

        if($provider) {

            $this->validate($request, [
                'lat' => 'required',
                'lng' => 'required'
            ]);

            $location = $provider->location;

            if(!$location){
                $location = new ProviderLocation;
                $location->provider_id = $provider->id;
            }

            $location->lat = $request->lat;
            $location->lng = $request->lng;
            $location->save();

            $data['location'] = new ProviderLocationResource($provider->location);

            return response()->json(['message' => trans('provider_api.locationUpdated'), 'data' => $data, 'status' => 1]);

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function getTotalRate($provider) {

        $provider = Provider::find($provider);

        if($provider) {

            return $provider->ratingTotal();

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function getRates($provider) {

        $provider = Provider::find($provider);

        if($provider) {

            return ProviderRatingResource::collection($provider->rate);

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

    public function rateProvider(Request $request, $provider) {

        $provider = Provider::find($provider);

        if($provider) {

            $this->validate($request, [
                'team' => 'required|numeric|max:5|min:0',
                'time' => 'required|numeric|max:5|min:0',
                'good' => 'required|numeric|max:5|min:0',
                'another' => 'required|numeric|max:5|min:0',
                'price' => 'required|numeric|max:5|min:0',
                'comment' => 'required'
            ]);

            $total = ($request->team + $request->time + $request->good + $request->another + $request->price) / 5;

            $rate = new ProviderRating;
            $rate->provider_id= $provider->id;
            $rate->team = $request->team;
            $rate->time = $request->time;
            $rate->good = $request->good;
            $rate->another = $request->another;
            $rate->price = $request->price;
            $rate->total = $total;
            $rate->comment = $request->comment;
            $rate->save();

            $data['rate'] = new ProviderRatingResource($rate);

            return response()->json(['message' => trans('provider_api.rated'), 'data' => $data, 'status' => 1]);

        }else {

            return response()->json(['message' => trans('provider_api.providerNotExist'), 'status' => 0]);

        }

    }

}
