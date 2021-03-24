<?php

namespace App;

use App\Provider;
use App\Http\Resources\Provider as ProviderResource;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{

    use HasTranslations;

    public $translatable = ['title'];

    public function specialty() {

        return $this->hasMany('App\Specialty');

    }

    public function providersCount() {

        $count = 0;

        foreach ($this->specialty as $row) {

            $count += $row->providers->count();

        }

        return $count;

    }

    public function providers() {

        $specialties_id = [];

        foreach ($this->specialty as $row) {
            $specialties_id[] = $row->id;
        }

        $special_providers_count = 0;
        $normal_providers_count = 0;

        $providers = Provider::whereIn('specialty_id', $specialties_id)
            ->OrderBy('is_special', 'desc')
            ->where('active', 1)
            ->get();

        foreach($providers as $provider) {
            if($provider->is_special == 1) {
                $special_providers_count = $special_providers_count + 1;
            }else {
                $normal_providers_count = $normal_providers_count + 1;
            }
        }

        $data['providers'] = ProviderResource::collection($providers);
        $data['special_providers_count'] = $special_providers_count;
        $data['normal_providers_count'] = $normal_providers_count;

        return $data;

    }

}
