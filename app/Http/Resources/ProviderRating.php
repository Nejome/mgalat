<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderRating extends JsonResource
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
            'team' => $this->team,
            'time' => $this->time,
            'good' => $this->good,
            'another' => $this->another,
            'price' => $this->price,
            'total' => $this->total,
            'comment' => $this->comment,
        ];
    }
}
