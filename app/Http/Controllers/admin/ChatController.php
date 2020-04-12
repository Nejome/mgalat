<?php

namespace App\Http\Controllers\admin;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Provider;
use Illuminate\Http\Request;
use App\Message;
use App\Http\Resources\Provider as ProviderResource;
use App\chatRoom;

class ChatController extends Controller
{

    public function index() {

        $rooms = chatRoom::orderBy('id', 'desc')->get();

        return view('admin.support.chat-list', compact(['rooms']));

    }

    public function chat(chatRoom $room) {

        return view('admin.support.chat', compact(['room']));

    }


    public function getMessages(chatRoom $room) {

        $messages = Message::where('room_id', $room->id)->get();

        return $messages;

    }

    public function sendMessage(Request $request, chatRoom $room) {

        $message = new Message;
        $message->room_id = $room->id;
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        broadcast(new MessageSent($message))->toOthers();

        return response(['message' => $message]);

    }

    public function delete(chatRoom $room) {

        $room->delete();

        session()->flash('deleted', 'تم حذف المحادثة بنجاح');

        return redirect()->back();

    }

}
