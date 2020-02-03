<?php

namespace App\Http\Controllers\admin;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Provider;
use Illuminate\Http\Request;
use App\Message;
use App\Http\Resources\Provider as ProviderResource;

class MessageController extends Controller
{

    public function index() {

        return view('admin.support.messages');

    }

    public function getProviders() {

        $providers_id = Message::where('sender_id', '!=', 0)->get('sender_id');

        $providers = Provider::whereIn('id', $providers_id)->get();

        return ProviderResource::collection($providers);

    }

    public function getMessages($provider) {

        $messages = Message::where(['sender_id' => 0, 'receiver_id' => $provider])
            ->orWhere(function($query) use($provider){
                $query->where(['sender_id' => $provider, 'receiver_id' => 0]);
            })
            ->get();

        return $messages;

    }

    public function sendMessage(Request $request) {

        $message = new Message;
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        broadcast(new MessageSent($message))->toOthers();

        return response(['message'=>$message, 'status'=> 1]);

    }

}
