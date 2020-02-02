<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApplicationRate;

class ApplicationRateController extends Controller
{

    public function index() {

        $rates = ApplicationRate::all();

        return view('admin.settings.application-rates', compact(['rates']));

    }

    public function delete(ApplicationRate $rate) {

        $rate->delete();

        return back()->with('deleted', 'تم حذف التقييم بنجاح');

    }

}
