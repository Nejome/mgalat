<?php

namespace App\Http\Controllers\client;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\chatRoom;
use App\Message;
use App\Setting;
use GuzzleHttp\Client;

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

        $setting = Setting::find(1);

        if(isset($setting->phone) && $setting->phone != ''){

            $client = new Client();

            $data = [
                'json' => [
                    "Username" => "0505349879",
                    "Password" => "EID9879eid",
                    "Tagname" => "MJALATTK-AD",
                    "RecepientNumber" => $setting->phone,
                    "Message" => 'قام احد العملاء ببدء محادثة جديدة في الموقع',
                ]
            ];

            $client->post("http://api.yamamah.com/SendSMS", $data);

        }

        return redirect(url('support/'.$room->token.'/chat'));

    }

    public function getChatMessages($token) {

        $room = chatRoom::where('token', $token)->first();

        if($room){

            $messages = Message::where('room_id', $room->id)->get();

            return $messages;

        }else {

            return false;

        }

    }

    public function chat($token) {

        $room = chatRoom::where('token', $token)->first();

        if($room){

            $current = 'support';

            return view('client.support.chat', compact(['current', 'room']));

        }else {

            $current = 'support';

            session()->flash('room_not_exist', 'عفواً قم بإعادة المحاولة');

            return view('client.support.start-chat', compact('current'));


        }

    }

    public function sendMessage(Request $request, $token) {

        $room = chatRoom::where('token', $token)->first();

        if($room){

            $message = new Message;
            $message->room_id = $room->id;
            $message->sender_id = $request->sender_id;
            $message->receiver_id = $request->receiver_id;
            $message->message = $request->message;
            $message->save();

            broadcast(new MessageSent($message))->toOthers();

            return response(['message' => $message]);

        }else {

            return false;

        }

    }

}
