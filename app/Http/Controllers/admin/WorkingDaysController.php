<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;
use App\WorkingDayes;

class WorkingDaysController extends Controller
{

    public function index(Provider $provider) {

        $week = $provider->workingDays;

        $week['saturday'] = json_decode($week['saturday'], true);
        $week['sunday'] = json_decode($week['sunday'], true);
        $week['monday'] = json_decode($week['monday'], true);
        $week['tuesday'] = json_decode($week['tuesday'], true);
        $week['wednesday'] = json_decode($week['wednesday'], true);
        $week['thursday'] = json_decode($week['thursday'], true);
        $week['friday'] = json_decode($week['friday'], true);

        return view('admin.providers.working_days', compact(['provider', 'week']));

    }

    public function update(Request $request, Provider $provider) {

        $days['saturday']  = ['from' => $request->saturday_from != ''? $request->saturday_from : '-', 'to' => $request->saturday_to != null? $request->saturday_to : '-'];
        $days['sunday']  = ['from' => $request->sunday_from != ''? $request->sunday_from : '-', 'to' => $request->sunday_to != null? $request->sunday_to : '-'];
        $days['monday']  = ['from' => $request->monday_from != ''? $request->monday_from : '-', 'to' => $request->monday_to != null? $request->monday_to : '-'];
        $days['tuesday']  = ['from' => $request->tuesday_from != ''? $request->tuesday_from : '-', 'to' => $request->tuesday_to != null? $request->tuesday_to : '-'];
        $days['wednesday']  = ['from' => $request->wednesday_from != ''? $request->wednesday_from : '-', 'to' => $request->wednesday_to != null? $request->wednesday_to : '-'];
        $days['thursday']  = ['from' => $request->thursday_from != ''? $request->thursday_from : '-', 'to' => $request->thursday_to != null? $request->thursday_to : '-'];
        $days['friday']  = ['from' => $request->friday_from != ''? $request->friday_from : '-', 'to' => $request->friday_to != null? $request->friday_to : '-'];

        $week = $provider->workingDays;
        if(!$week){
            $week = new WorkingDayes;
            $week->provider_id = $provider->id;
        }

        $week->saturday = json_encode($days['saturday']);
        $week->sunday = json_encode($days['sunday']);
        $week->monday = json_encode($days['monday']);
        $week->tuesday = json_encode($days['tuesday']);
        $week->wednesday = json_encode($days['wednesday']);
        $week->thursday = json_encode($days['thursday']);
        $week->friday = json_encode($days['friday']);
        $week->save();

        return redirect(url('admin/providers'))->with('daysUpdated', 'تم تعديل ايام العمل الخاصه بمزود الخدمة بنجاح');

    }

}
