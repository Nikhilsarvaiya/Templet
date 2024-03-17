<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){

        $contactus = ContactUs::first();

        // dd($contactus->id);
        return view('web.contect-us.contect_us',compact('contactus'));
    }
}
