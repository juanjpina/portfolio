<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('layout.layoutContact');
    }
    
    public function store(Request $request)
    {
        // dd(\App\Models\Contact::create ($request->all ()));
    // $this->validate($request, [
       
        \App\Models\Contact::create([
        'nom' => $request->nom,
        'email' => $request->email,
        'message' => $request->message ,

    ]);

    // $contact = new \App\Models\Contact;
    // $contact->nom = $request->nom;
    // $contact->email = $request->email;
    // $contact->message = $request->message;
    // $contact->save();

    return "C'est bien enregistré !";
    }
    
    
    
    public function confirm(ContactRequest $request){
        Mail::to('administrateur@roger.com')
        ->send(new Contact($request->except('_token')));
        return view('mail/mail');
    }
    
}