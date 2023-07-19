<?php

namespace App\Http\Controllers;

use App\Services\ContactService;

class HomeController extends Controller
{
    private $contactService;

    public function __construct(ContactService $service)
    {
        $this->contactService = $service;
    }

    public function index()
    {

        $contacts = $this->contactService->getAll();
        return view('app.contacts.guest', ['contacts' => $contacts]);
    }
}
