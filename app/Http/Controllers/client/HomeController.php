<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApplicationImage;
use App\Department;

class HomeController extends Controller
{

    public function applicationPage() {

        $current = 'application';

        $images = ApplicationImage::all();

        return view('client.application', compact(['current', 'images']));

    }

    public function services() {

        $current = 'services';

        $departments = Department::all();

        return view('client.services', compact(['current', 'departments']));

    }

}
