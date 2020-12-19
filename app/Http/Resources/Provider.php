<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Provider extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'country' => $this->country->title,
            'specialty' => $this->specialty->title,
            'description' => $this->description,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'whatsapp' => $this->whatsapp,
            'snapchat' => $this->snapchat,
            'website' => $this->website,
            'email' => $this->email,
            'is_special' => $this->is_special,
            'special_until' => $this->special_until,
            'views' => $this->views,
            'image' => asset('uploads/providers/'.$this->image),
            'ratingTotal' => $this->ratingTotal(),
            'location' => $this->location
        ];
    }
}
