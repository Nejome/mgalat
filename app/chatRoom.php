<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatRoom extends Model
{

    public function messages() {

        return $this->hasMany('App\Message');

    }

}
