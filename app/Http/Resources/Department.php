<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Department extends JsonResource
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
            'title' => $this->title,
            'image' => asset('uploads/departmentsImages/'.$this->image),
            'icon' => asset('uploads/svg/'.$this->icon),
            'color' => $this->color,
            'specialtyCount' => $this->specialty->count(),
            'providersCount' => $this->providersCount(),
        ];
    }
}
