<?php

namespace App\Repositories;

use App\Models\Email;

class EmailRepository
{
    public function getAllEmailsByContactId($contactId)
    {
        return Email::where('contact_id', $contactId)->get();
    }

    public function create($data)
    {
        return Email::create($data);
    }

    public function update($data, $id)
    {
        $address = Email::findOrFail($id);
        $address->update($data);
        return $address;
    }

    public function delete($id)
    {
        $address = Email::findOrFail($id);
        $address->delete();
    }
}
