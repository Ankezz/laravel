<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $contactData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')
        ];

        Mail::to('andreykonstantinov73@mail.ru')->send(new ContactEmail($contactData));



        return redirect()->back()->with('success', 'Сообщение отправлено!');
    }
}

