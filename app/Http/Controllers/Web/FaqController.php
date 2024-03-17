<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faqPagq(){

        $faq = Faq::select('id','title','description')->get();
        return view('web.faq.faqpage',compact('faq'));
    }
}
