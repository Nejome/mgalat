<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Provider;
use Illuminate\Http\Request;
use App\ApplicationImage;
use App\Department;
use App\Specialty;

class HomeController extends Controller
{

    public function index() {

        $current = 'home';

        return view('client.index', compact(['current']));

    }

    public function applicationPage() {

        $current = 'application';

        $images = ApplicationImage::all();

        return view('client.application', compact(['current', 'images']));

    }

    public function departments() {

        $current = 'departments';

        $departments = Department::all();

        return view('client.departments.index', compact(['current', 'departments']));

    }

    public function showDepartment(Request $request, Department $department) {

        $current = 'departments';

        $specialties = Specialty::where('department_id', $department->id)->get();

        $specialties_id = [];
        foreach ($specialties as $row){
            $specialties_id[] = $row->id;
        }

        $special_providers_count = 0;
        $normal_providers_count = 0;

        if(isset($request->specialty)) {
            $providers = Provider::where('specialty_id', $request->specialty);
        }else {
            $providers = Provider::whereIn('specialty_id', $specialties_id);
        }

        if(isset($request->type)) {
            $providers = $providers->where(['is_special' => $request->type, 'active' => 1]);
        }else {
            $providers = $providers->where(['active' => 1])
                ->OrderBy('is_special', 'desc');
        }

        $providers = $providers->get();

        foreach($providers as $provider) {
            if($provider->is_special == 1) {
                $special_providers_count = $special_providers_count + 1;
            }else {
                $normal_providers_count = $normal_providers_count + 1;
            }
        }

        return view('client.departments.show', compact(['current', 'department', 'specialties', 'providers', 'special_providers_count', 'normal_providers_count']));

    }


}
