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
        if ($this->image){
            $image = asset('uploads/specialtiesImages/'.$this->image);
        }else{
            $image = '';
        }
        return [
            'id' => $this->id,
            'department' => $this->department->title,
            'title' => $this->title,
            'image' => $image,
            'providersCount' => $this->providers->count(),
        ];
    }
}
