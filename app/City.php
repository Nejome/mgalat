<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{

    use HasTranslations;

    public $translatable = ['title'];

}
