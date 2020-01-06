<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;

class SupportController extends Controller
{

    public function index() {

        $current = 'support';

        return view('client.support', compact('current'));

    }

    public function store(Request $request) {

        $this->validate($request, [
           'subject' => 'required',
            'phone' => 'required|numeric',
            'name' => 'required',
            'description' => 'required'
        ]);

        $support = new Support;
        $support->subject = $request->subject;
        $support->phone = $request->phone;
        $support->name = $request->name;
        $support->description = $request->description;
        $support->save();

        return back()->with('created', 'تم ارسال استعلامك بنجاح');

    }

}
