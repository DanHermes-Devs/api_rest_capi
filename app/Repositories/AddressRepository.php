<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{
    public function getAllAddressesByContactId($contactId)
    {
        return Address::where('contact_id', $contactId)->get();
    }

    public function create($data)
    {
        return Address::create($data);
    }

    public function update($data, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($data);
        return $address;
    }

    public function delete($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
    }
}
