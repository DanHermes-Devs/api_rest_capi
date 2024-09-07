<?php

namespace App\Services;

use App\Repositories\EmailRepository;

class EmailService
{
    protected $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function createEmail($data)
    {
        return $this->emailRepository->create($data);
    }

    public function updateEmail($data, $id)
    {
        return $this->emailRepository->update($data, $id);
    }

    public function deleteEmail($id)
    {
        return $this->emailRepository->delete($id);
    }
}
