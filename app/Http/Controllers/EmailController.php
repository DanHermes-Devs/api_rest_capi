<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Services\EmailService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function createEmail(EmailRequest $request)
    {
        $this->emailService->createEmail($request->all());

        return response()->json([
            "message" => "Record successfully created",
            "code" => 201
        ]);
    }

    public function updateEmail(EmailRequest $request, $id)
    {
        $this->emailService->updateEmail($request->all(), $id);

        return response()->json([
            "message" => "Record successfully updated",
            "code" => 200
        ]);
    }

    public function deleteEmail($id)
    {
        $this->emailService->deleteEmail($id);

        return response()->json([
            "message" => "Record successfully deleted",
            "code" => 200
        ]);
    }
}
