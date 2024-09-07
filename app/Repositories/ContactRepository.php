<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function withDetails($perPage)
    {
        return Contact::with(['phones', 'emails', 'addresses'])->paginate($perPage);
    }

    public function filterByGeneral($term, $perPage)
    {
        return Contact::where(function ($query) use ($term) {
            $query->where('name', 'LIKE', "%{$term}%")
                  ->orWhere('notes', 'LIKE', "%{$term}%")
                  ->orWhere('birthday', 'LIKE', "%{$term}%")
                  ->orWhere('website', 'LIKE', "%{$term}%")
                  ->orWhere('company', 'LIKE', "%{$term}%")
                  ->orWhereHas('phones', function ($q) use ($term) {
                      $q->where('phone_number', 'LIKE', "%{$term}%"); // Cambia a 'phone_number'
                  })
                  ->orWhereHas('emails', function ($q) use ($term) {
                      $q->where('email', 'LIKE', "%{$term}%");
                  })
                  ->orWhereHas('addresses', function ($q) use ($term) {
                      $q->where('city', 'LIKE', "%{$term}%")
                        ->orWhere('address_line', 'LIKE', "%{$term}%")
                        ->orWhere('postal_code', 'LIKE', "%{$term}%");
                  });
        })->with(['phones', 'emails', 'addresses'])->paginate($perPage);
    }

    public function create(array $data)
    {
        $contact = Contact::create([
            'name' => $data['name'],
            'notes' => $data['notes'],
            'birthday' => $data['birthday'],
            'website' => $data['website'],
            'company' => $data['company']
        ]);

        if (isset($data['phones']) && !empty($data['phones'])) {
            foreach ($data['phones'] as $phone) {
                $contact->phones()->create(['number' => $phone['number']]);
            }
        }

        if (isset($data['emails']) && !empty($data['emails'])) {
            foreach ($data['emails'] as $email) {
                $contact->emails()->create(['email' => $email['email']]);
            }
        }

        if (isset($data['addresses']) && !empty($data['addresses'])) {
            foreach ($data['addresses'] as $address) {
                $contact->addresses()->create([
                    'address_line' => $address['address_line'],
                    'city' => $address['city'],
                    'postal_code' => $address['postal_code']
                ]);
            }
        }

        return $contact;
    }

    public function update($id, array $data)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($data);

        return $contact;
    }

    public function find($id)
    {
        return Contact::with(['phones', 'emails', 'addresses'])->findOrFail($id);
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }
}
