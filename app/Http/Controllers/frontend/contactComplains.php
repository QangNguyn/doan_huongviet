<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\support\Facades\Auth;

class contactComplains extends Controller
{
    public function index()
    {
        return view('frontend.ContactUS');
    }

    public function submitForm(ContactRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $user  = Auth::user();
        // if($user->hasVerifiedEmail())
        {
            $contact = new Contact();
            $contact->name = $name;
            $contact->email = $email;
            $contact->message = $message;
            $contact->save();
            return back()->with('status', "Tin nhắn đã được gửi thành công");
        }
        // else
        // {
        //     return response()->json(['status' => "Please Verify you Email"]);
        // }

    }


    public function viewcomplains()
    {
        $PER_PAGE = 10;
        $complain =  Contact::paginate($PER_PAGE);
        return view('Admin.complains.index', compact('complain'));
    }
}
