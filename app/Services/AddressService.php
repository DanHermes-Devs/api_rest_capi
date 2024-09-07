<?php

namespace App\Services;

use App\Repositories\AddressRepository;

class AddressService
{
    protected $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function createAddress($data)
    {
        return $this->addressRepository->create($data);
    }

    public function updateAddress($data, $id)
    {
        return $this->addressRepository->update($data, $id);
    }

    public function deleteAddress($id)
    {
        return $this->addressRepository->delete($id);
    }
}
