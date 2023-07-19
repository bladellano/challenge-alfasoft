<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Contracts\RepositoryInterface;

class ContactRepository extends AbstractRepository implements RepositoryInterface
{
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }

}
