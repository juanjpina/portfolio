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
    $this->validate($request, [
        'nom' => 'bail|required|nom',
        'email' => 'bail|required|email',
        'message' => 'bail|required|max:500'
    ]);

    $contact = new \App\Models\Contact;
    $contact->nom = $request->nom;
    $contact->email = $request->email;
    $contact->message = $request->message;
    $contact->save();

    return "C'est bien enregistré !";
    }
    
    
    
    public function confirm(ContactRequest $request){
        Mail::to('administrateur@roger.com')
        ->send(new Contact($request->except('_token')));
        return view('/');
    }
    
}