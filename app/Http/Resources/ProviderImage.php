<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderImage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'provider_id' => $this->provider_id,
            'title' => $this->title,
            'image' => asset('uploads/providers_images/'.$this->image),
        ];

    }
}
