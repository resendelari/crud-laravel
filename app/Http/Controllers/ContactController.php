<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function getContacts()
    {
        $v_Contact = Contact::get();

        return view('/contacts.list')->with([
            'p_Contact' => $v_Contact]);
    }

    public function getNewContacts()
    {
        return view('/contacts.form');
    }

    public function addContacts(Request $request)
    {
        $v_Contact = new Contact;
        $v_Contact =  $v_Contact->create($request->all());
        $v_ContactId =  $v_Contact->id;
        return Redirect::to('/contacts')->with([
            'p_ContactId' => $v_ContactId,
            ]);
    }

    public function editContacts($p_Id)
    {
        $v_Contact = Contact::findOrFail($p_Id);
        $v_ContactId = $p_Id;
        return view('/contacts.form')->with([
            'p_Contact' => $v_Contact,
            'p_ContactId' => $v_ContactId,
            ]);
    }

    public function updateContact($p_Id, Request $request)
    {
        $v_Contact = Contact::findOrFail($p_Id);
        $v_Contact->update($request->all());
        return Redirect::to('/contacts')->with('message', 'Operation performed successfully!');;
    }

    public function deleteContact($p_Id)
    {
        $v_Contact = Contact::findOrFail($p_Id);
        $v_Contact->delete();
        return Redirect::to('/contacts')->with('message', 'Operation performed successfully!');;
    }
}
