<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParcelController extends Controller
{
    public function index()
    {
        return response()->json(Parcel::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_phone' => 'required|string|max:20',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:20',
            'pickup_address' => 'required|string',
            'delivery_address' => 'required|string',
            'parcel_description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:pending,collected,in_transit,delivered,cancelled',
        ]);

        $validated['tracking_number'] = 'TRK-' . strtoupper(Str::random(8));
        $validated['user_id'] = 1;

        $parcel = Parcel::create($validated);

        return response()->json([
            'message' => 'Parcel created successfully',
            'data' => $parcel
        ], 201);
    }

    public function show(Parcel $parcel)
    {
        return response()->json($parcel);
    }

    public function update(Request $request, Parcel $parcel)
    {
        $validated = $request->validate([
            'sender_name' => 'sometimes|string|max:255',
            'sender_phone' => 'sometimes|string|max:20',
            'receiver_name' => 'sometimes|string|max:255',
            'receiver_phone' => 'sometimes|string|max:20',
            'pickup_address' => 'sometimes|string',
            'delivery_address' => 'sometimes|string',
            'parcel_description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'sometimes|in:pending,collected,in_transit,delivered,cancelled',
        ]);

        $parcel->update($validated);

        return response()->json([
            'message' => 'Parcel updated successfully',
            'data' => $parcel
        ]);
    }

    public function destroy(Parcel $parcel)
    {
        $parcel->delete();

        return response()->json([
            'message' => 'Parcel deleted successfully'
        ]);
    }
}