<?php
namespace App\Services;

use App\Models\Contact;
use App\Repositories\ContactRepository;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContactsWithDetails($perPage = 15)
    {
        return $this->contactRepository->withDetails($perPage);
    }

    public function filterContactsByGeneral($term, $perPage = 15)
    {
        return $this->contactRepository->filterByGeneral($term, $perPage);
    }

    public function createContact(array $data)
    {
        return $this->contactRepository->create($data);
    }

    public function updateContact($id, array $data)
    {
        return $this->contactRepository->update($id, $data);
    }

    public function getContactById($id)
    {
        return $this->contactRepository->find($id);
    }

    public function deleteContact($id)
    {
        return $this->contactRepository->delete($id);
    }
}
