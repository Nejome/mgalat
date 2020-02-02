<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;

class Message extends Model
{

    public function senderName() {

        if($this->send_id == 0) {

            return trans('general_api.admin');

        }else {

            $provider = Provider::find($this->sender_id);

            return $provider->name;

        }

    }

    public function receiverName() {

        if($this->receiver_id == 0) {

            return trans('general_api.admin');

        }else {

            $provider = Provider::find($this->receiver_id);

            return $provider->name;

        }

    }

}
