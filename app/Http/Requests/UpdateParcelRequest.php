<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParcelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sender_name' => 'sometimes|string|max:255',
            'sender_phone' => 'sometimes|string|max:20',
            'receiver_name' => 'sometimes|string|max:255',
            'receiver_phone' => 'sometimes|string|max:20',
            'pickup_address' => 'sometimes|string',
            'delivery_address' => 'sometimes|string',
            'parcel_description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'sometimes|in:pending,collected,in_transit,delivered,cancelled',
        ];
    }
}