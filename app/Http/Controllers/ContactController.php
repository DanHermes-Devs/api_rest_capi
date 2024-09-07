<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        return response()->json($this->contactService->getAllContactsWithDetails($perPage));
    }

    public function filterByGeneral(Request $request)
    {
        $term = $request->input('term');
        $perPage = $request->get('per_page', 15);
        return response()->json($this->contactService->filterContactsByGeneral($term, $perPage));
    }

    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->contactService->createContact($data), 201);
    }

    public function update($id, ContactRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->contactService->updateContact($id, $data));
    }

    public function findUser($id)
    {
        return response()->json($this->contactService->getContactById($id));
    }

    public function destroy($id)
    {
        $this->contactService->deleteContact($id);
        return response()->json([
            "message" => "Record successfully deleted",
            "code" => 204
        ]);
    }
}
