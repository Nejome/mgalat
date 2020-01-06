<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{

    use HasTranslations;

    public $translatable = ['title', 'details'];

    public function user() {

        return $this->belongsTo('App\User');

    }

    public function comments() {

        return $this->hasMany('App\PostComment');

    }

}
