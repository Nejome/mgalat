<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Specialty extends JsonResource
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
            'department' => $this->department->title,
            'title' => $this->title,
            'providersCount' => $this->providers->count(),
        ];
    }
}
