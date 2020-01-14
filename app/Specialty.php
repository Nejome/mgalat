<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialty extends Model
{

    use HasTranslations;

    public $translatable = ['title'];

    public function department() {

        return $this->belongsTo('App\Department');

    }

    public function providers() {

        return $this->hasMany('App\Provider');

    }

}
