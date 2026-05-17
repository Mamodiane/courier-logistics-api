<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreParcelRequest;
use App\Http\Requests\UpdateParcelRequest;
use App\Http\Resources\ParcelResource;

class ParcelController extends Controller
{
    public function index(Request $request)
    {
        $parcels = Parcel::where('user_id', $request->user()->id)
        ->latest()
        ->paginate(6);

        return ParcelResource::collection($parcels);
    }

    public function store(StoreParcelRequest $request)
    {
        $validated = $request->validated();

        $validated['tracking_number'] = 'TRK-' . strtoupper(Str::random(8));
        $validated['user_id'] = $request->user()->id;

        $parcel = Parcel::create($validated);

        return response()->json([
            'message' => 'Parcel created successfully',
            'data' => new ParcelResource($parcel)
        ], 201);
    }

    public function show(Request $request, Parcel $parcel)
    {
        $this->authorizeParcelOwner($parcel, $request);

        return new ParcelResource($parcel);
    }

    public function update(UpdateParcelRequest $request, Parcel $parcel)
    {
        $this->authorizeParcelOwner($parcel, $request);

        $validated = $request->validated();

        $parcel->update($validated);

        return response()->json([
            'message' => 'Parcel updated successfully',
            'data' => new ParcelResource($parcel)
        ]);
    }

    public function destroy(Request $request, Parcel $parcel)
    {
        $this->authorizeParcelOwner($parcel, $request);

        $parcel->delete();

        return response()->json([
            'message' => 'Parcel deleted successfully'
        ]);
    }

    private function authorizeParcelOwner(Parcel $parcel, Request $request): void
    {
        if ($parcel->user_id !== $request->user()->id) {
            abort(403, 'You are not allowed to access this parcel.');
        }
    }
}