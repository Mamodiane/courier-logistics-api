<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParcelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tracking_number' => $this->tracking_number,
            'sender_name' => $this->sender_name,
            'sender_phone' => $this->sender_phone,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'pickup_address' => $this->pickup_address,
            'delivery_address' => $this->delivery_address,
            'parcel_description' => $this->parcel_description,
            'weight' => $this->weight,
            'status' => $this->status,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}