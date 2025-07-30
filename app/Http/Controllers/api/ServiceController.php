<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();
        return response()->json([
            'services' => ServiceResource::collection($services)
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        //store service
        $service = new Service();
        $service->name = $validate['name'];
        $service->description = $validate['description'];
        $service->price = $validate['price'];
        $service->status = $request->status ?? 'active'; // default status to 'active' if not provided
        $service->save();
        return response()->json([
            'service' => $service
        ], 201);
    }


    public function update(Request $request, $id)
    {

        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'sometimes|in:active,inactive' // Add validation for status
        ]);

        $service->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            'service' => $service->fresh() // Return refreshed instance
        ], 200);
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json([
            'message' => 'Service deleted successfully'
        ], 200);
    }
}
