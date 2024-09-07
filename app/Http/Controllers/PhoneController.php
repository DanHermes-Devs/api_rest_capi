<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use Illuminate\Http\Request;
use App\Services\PhoneService;

class PhoneController extends Controller
{
    protected $phoneService;

    public function __construct(PhoneService $phoneService)
    {
        $this->phoneService = $phoneService;
    }

    public function createPhone(PhoneRequest $request)
    {
        $this->phoneService->createPhone($request->all());

        return response()->json([
            "message" => "Record successfully created",
            "code" => 201
        ]);
    }

    public function updatePhone(PhoneRequest $request, $id)
    {
        $this->phoneService->updatePhone($request->all(), $id);

        return response()->json([
            "message" => "Record successfully updated",
            "code" => 200
        ]);
    }

    public function deletePhone($id)
    {
        $this->phoneService->deletePhone($id);

        return response()->json([
            "message" => "Record successfully deleted",
            "code" => 200
        ]);
    }
}
