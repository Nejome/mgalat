<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;
use App\ProviderRating;
use Carbon\Carbon;
use App\Specialty;

class ProviderController extends Controller
{

    public function details(Provider $provider) {

        $current = 'departments';

        $today = Carbon::today()->locale('en')->dayName;

        $week = $provider->week();

        return view('client.providers.details', compact(['current', 'provider', 'today', 'week']));

    }

    public function rate(Request $request, Provider $provider) {

        $this->validate($request, [
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

        return back()->with('rated', 'تمت اضافة تقييمك بنجاح');

    }

    public function search(Request $request) {

        $current = 'departments';

        $specialties = Specialty::where('title->ar','LIKE','%'.$request->text.'%')->get();

        $specialties_id = [];
        foreach ($specialties as $row){
            $specialties_id[] = $row->id;
        }

        $special_providers_count = 0;
        $normal_providers_count = 0;

        $providers = Provider::whereIn('specialty_id', $specialties_id)->where('city_id', $request->city)->OrderBy('is_special', 'desc')->get();

        foreach($providers as $provider) {
            if($provider->is_special == 1) {
                $special_providers_count = $special_providers_count + 1;
            }else {
                $normal_providers_count = $normal_providers_count + 1;
            }
        }

        return view('client.providers.search-result', compact(['current', 'specialties', 'providers', 'special_providers_count', 'normal_providers_count']));

    }

}
