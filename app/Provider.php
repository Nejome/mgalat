<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    public function city() {

        return $this->belongsTo('App\City');

    }

    public function specialty() {

        return $this->belongsTo('App\Specialty');

    }

    public function location() {

        return $this->hasOne('App\ProviderLocation');

    }

    public function workingDays() {

        return $this->hasOne('App\WorkingDayes');

    }

}
