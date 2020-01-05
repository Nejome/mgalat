<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProviderImage extends Model
{

    use HasTranslations;

    public $translatable = ['title'];

}
