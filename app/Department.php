<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{

    use HasTranslations;

    public $translatable = ['title'];

    public function specialty() {

        return $this->hasMany('App\Specialty');

    }

}
