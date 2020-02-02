<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Setting extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'terms_conditions' => $this->terms_conditions,
            'usage_policy' => $this->usage_policy,
            'phone' => $this->phone,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'whatsapp' => $this->whatsapp,
            'android_link' => $this->android_link,
            'ios_link' => $this->ios_link,
            'application_version' => $this->application_version,
            'application_video_link' => $this->application_video_link,
            'max_providers_images' => $this->max_providers_images,

        ];
    }
}
