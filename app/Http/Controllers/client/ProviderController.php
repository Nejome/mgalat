<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;
use App\ProviderRating;
use Carbon\Carbon;

class ProviderController extends Controller
{

    public function details(Provider $provider) {

        $current = 'services';

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

}
