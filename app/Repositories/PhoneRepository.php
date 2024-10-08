<?php

namespace App\Repositories;

use App\Models\Phone;

class PhoneRepository
{
    public function create($data)
    {
        return Phone::create($data);
    }

    public function getAllPhonesByContactId($contactId)
    {
        return Phone::where('contact_id', $contactId)->get();
    }

    public function update($data, $id)
    {
        $address = Phone::findOrFail($id);
        $address->update($data);
        return $address;
    }

    public function delete($id)
    {
        $address = Phone::findOrFail($id);
        $address->delete();
    }
}
