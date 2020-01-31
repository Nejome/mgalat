<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkingDays extends JsonResource
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
            'saturday' => json_decode($this->saturday),
            'sunday' => json_decode($this->sunday),
            'monday' => json_decode($this->monday),
            'tuesday' => json_decode($this->tuesday),
            'wednesday' => json_decode($this->wednesday),
            'thursday' => json_decode($this->thursday),
            'friday' => json_decode($this->friday),
        ];

    }
}
