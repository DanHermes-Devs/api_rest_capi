<?php

namespace App\Services;

use App\Repositories\PhoneRepository;

class PhoneService
{
    protected $phoneRepository;

    public function __construct(PhoneRepository $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    public function getAllPhonesByContactId($contactId)
    {
        return $this->phoneRepository->getAllPhonesByContactId($contactId);
    }

    public function createPhone($data)
    {
        return $this->phoneRepository->create($data);
    }

    public function updatePhone($data, $id)
    {
        return $this->phoneRepository->update($data, $id);
    }

    public function deletePhone($id)
    {
        return $this->phoneRepository->delete($id);
    }
}
