<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ContactUsController extends Controller
{
    public function add(ContactUs $contactus){
        $contactus = ContactUs::first();
        return view('admin.contact-us.add',compact('contactus'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "phone"                 => "required",
            "email"                 => "required",
            "address"               => "required",
            "contact_us_title"      => "required",
        ]);

        try {
            $validate = $request->only( 
                "phone",
                "email",
                "address",
                "contact_us_title",
                "contact_us_description",
                "social_link1",
                "social_link2",
                "social_link3",
                "social_link4",
                "location"
            );

            $contactusObj = ( $request->edit_id ) ? ContactUs::where('id',$request->edit_id)->first()  : new ContactUs;
            $contactusObj->fill( $validate );
            $contactusObj->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.contact.us.add')->with('success', 'Contact-Us update successfully');    
            }
            
            return redirect()->route('admin.contact.us.add')->with('success', 'Contact-Us Save Successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }
}
