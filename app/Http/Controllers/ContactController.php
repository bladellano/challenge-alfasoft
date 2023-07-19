<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    private $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->service->getAll();
        return view('app.contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $this->service->create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('app.contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('app.contacts.edit', ['contact' => $contact]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param ContactUpdateRequest $request
    * @param integer $id
    * @return void
    */
    public function update(ContactUpdateRequest $request, int $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param integer $id
    * @return void
    */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
    }

}
