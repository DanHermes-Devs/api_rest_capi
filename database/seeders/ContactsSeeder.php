<?php

namespace Database\Seeders;

use App\Models\Email;
use App\Models\Phone;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory(5000)->create()->each(function ($contact) {
            $contact->phones()->createMany(
                Phone::factory(rand(1, 3))->make()->toArray()
            );
            $contact->emails()->createMany(
                Email::factory(rand(1, 3))->make()->toArray()
            );
            $contact->addresses()->createMany(
                Address::factory(rand(1, 3))->make()->toArray()
            );
        });
    }
}
