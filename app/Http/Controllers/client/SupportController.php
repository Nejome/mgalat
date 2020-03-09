<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\chatRoom;
use App\Message;

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

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $token = md5(rand());

        $room = new chatRoom();
        $room->name = $request->name;
        $room->email = $request->email;
        $room->phone = $request->phone;
        $room->title = $request->title;
        $room->token = $token;
        $room->save();

        $message = new Message();
        $message->room_id = $room->id;
        $message->sender_id = 1;
        $message->receiver_id = 0;
        $message->message = $request->description;
        $message->save();

        return redirect(url('support/'.$room->token.'/chat'));

    }

    public function getChatMessages($token) {

        $room = chatRoom::where('token', $token)->first();

        if($room){

            $messages = Message::where('room_id', $room->id)->get();

            return $messages;

        }else {

            return null;

        }

    }

    public function chat($token) {

        $current = 'support';

        return view('client.support.chat', compact(['current', 'token']));

    }

}
