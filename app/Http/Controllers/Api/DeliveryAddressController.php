<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryAddressesStoreRequest;
use App\Http\Resources\DeliveryAddressResource;
use App\Models\DeliveryAddresses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  DeliveryAddressResource::collection(DeliveryAddresses::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryAddressesStoreRequest $request)
    {


        $created_address = DeliveryAddresses::create($request->validated());
        return new DeliveryAddressResource($created_address);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new DeliveryAddressResource(DeliveryAddresses::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryAddressesStoreRequest $request, DeliveryAddresses $deliveryAddress)
    {
        $deliveryAddress->update($request->validated());
        return new DeliveryAddressResource($deliveryAddress);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryAddresses $deliveryAddress)
    {
        $deliveryAddress->delete();
        return response()->json(['message' => 'Запись успешно удалена'], Response::HTTP_OK);
    }
}
