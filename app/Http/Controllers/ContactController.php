<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::get();
      return view('contact.index', compact('contacts'));
    }

    public function store(){
        Contact::create(['name'=>"Tola","username"=>"chala"]);
        return view('welcome');
    }
}
