<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
//        $users = Contact::where('email', 'Thijmenhbakker@outlook.com')->get();
//
//        Contact::findOrFail(3);


        // alle contacten ophalen uit de database
        Contact::all();

        return view('admin.contact.index', [
            'contacts' =>Contact::orderBy('created_at', 'ASC')->get(),
        ]);
    }
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('dashboard.contact.index');
    }

}
