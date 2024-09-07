<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Services\AddressService;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function createAddress(AddressRequest $request)
    {
        $this->addressService->createAddress($request->all());

        return response()->json([
            "message" => "Record successfully created",
            "code" => 200
        ]);
    }

    public function updateAddress(AddressRequest $request, $id)
    {
        $this->addressService->updateAddress($request->all(), $id);

        return response()->json([
            "message" => "Record successfully updated",
            "code" => 200
        ]);
    }

    public function deleteAddress($id)
    {
        $this->addressService->deleteAddress($id);

        return response()->json([
            "message" => "Record successfully deleted",
            "code" => 200
        ]);
    }
}
