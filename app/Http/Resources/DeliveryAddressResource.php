<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return  [
          'id' => $this->id,
          'region' => $this->region,
          'locality' => $this->locality,
          'street' => $this->street,
          'house' => $this->house,
          'postcode' => $this->postcode,
          'users_id' => $this->users_id,
        ];
    }
}
