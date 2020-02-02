<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;
use App\ProviderRating;
use Carbon\Carbon;
use App\Specialty;
use App\ProviderView;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{

    public function details(Request $request, Provider $provider) {

        $current = 'departments';

        $exist = ProviderView::where(['ip' => $request->ip(), 'provider_id' => $provider->id])->first();

        if(!$exist){

            $new = new ProviderView;
            $new->provider_id = $provider->id;
            $new->ip = $request->ip();
            $new->Save();

            $provider->views += 1;
            $provider->save();

        }

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

        $message = [
            'text.required' => 'عفوا قم بإدخال نص البحث',
            'lat.required' => 'عفوا قم بتحدد موقعك عن طريق الضغط علي زر تحديد الموقع',
        ];

        $this->validate($request, [
           'text' => 'required',
           'lat' => 'required'
        ], $message);

        $current = 'departments';

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

        return view('client.providers.search-result', compact(['current', 'specialties', 'providers', 'special_providers_count', 'normal_providers_count']));

    }

}
