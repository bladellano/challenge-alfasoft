<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('app.contacts.guest', ['contacts' => $contacts]);
    }
}
