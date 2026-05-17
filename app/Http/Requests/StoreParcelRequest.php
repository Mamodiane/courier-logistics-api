<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParcelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sender_name' => 'required|string|max:255',
            'sender_phone' => 'required|string|max:20',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:20',
            'pickup_address' => 'required|string',
            'delivery_address' => 'required|string',
            'parcel_description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:pending,collected,in_transit,delivered,cancelled',
        ];
    }
}