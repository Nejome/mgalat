<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{

    use HasTranslations;

    public $translatable = ['title', 'description', 'terms_conditions', 'usage_policy'];

}
