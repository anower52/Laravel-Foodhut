<?php

namespace App\Http\Controllers;

use App\contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage( Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required|email',
           'subject' => 'required',
           'message' => 'required'
        ]);

        $contacts = new Contact();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->subject = $request->subject;
        $contacts->message = $request->message;
        $contacts->save();

        Toastr::success('Message sent successfully.woner contacts soon','Success',["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
