<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact.index');
    }

    public function addContact(Request $request){
        $data = $request->all();

        Contact::create($data);

        return redirect('contact/result')
            ->with('notification', 'We take note of your feedback');
    }

    public function result()
    {
        $notification = session('notification');
        $error = session('error');

        if ($notification == null && $error == null) {
            return redirect('');
        }

        return view('front.contact.result', compact('notification', 'error'));
    }
}
