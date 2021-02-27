<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Flight extends JsonResource
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
            'code' => $this->code,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'departure_time' => $this->departure_time,
            'arrival_time' => $this->arrival_time,
            'delayed' => $this->delayed,
            'cancelled' => $this->cancelled
         ];
    }
}
