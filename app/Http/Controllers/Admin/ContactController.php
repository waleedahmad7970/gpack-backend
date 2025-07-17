<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Http\Requests\ContactUpdateRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::first();

        return view('pages.admin.contact.index', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, $id)
    {
        $contact = Contact::find($id);
        if(empty($contact)) {
            abort(404);
        }

        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $contact->update($data);

        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Contact information updated successfully');
    }
}
