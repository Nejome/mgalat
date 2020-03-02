<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;

class SupportController extends Controller
{

    public function index() {

        $current = 'support';

        return view('client.support.index', compact('current'));

    }

    public function store(Request $request) {

        $this->validate($request, [
           'subject' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'name' => 'required',
            'description' => 'required'
        ]);

        $support = new Support;
        $support->subject = $request->subject;
        $support->phone = $request->phone;
        $support->email = $request->email;
        $support->name = $request->name;
        $support->description = $request->description;
        $support->save();

        return back()->with('created', 'تم ارسال استعلامك بنجاح');

    }

    public function startChat() {

        $current = 'support';

        return view('client.support.start-chat', compact('current'));

    }


    public function createRoom(Request $request) {


    }

    public function chat($token) {



    }

}
