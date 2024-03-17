<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\UserContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserContactUsController extends Controller
{
    public function save(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name'          => 'nullable',
            'email'         => 'nullable',
            'subject'      => 'nullable',
        ],[
            'name.required'         => 'The name field is required.',
            'email.required'     => 'The email field is required.',
            'subject.required'     => 'The subject field is required.',
        ]);

        try {
            $validate = $request->only( 
                        'name',
                        'email',
                        'phone',
                        'subject',
                        'message',
                        );

            if($request->code){
                $validate['phone'] = $request->code;
            }

            // $usercontactus = UserContactUs::create($request->all());
            $usercontactus = new UserContactUs;
            $usercontactus->fill( $validate );

            
            if($usercontactus->save()){
                return redirect()
                    ->route('web.contect.us')
                    ->with('success', 'Your request send successfully. We will contact you soon.');
                    // ->with('success', 'Investor Complaints Send Successfully');
            }
            return back()
                    ->with('error', 'Investor Complaints Inquiry failed');

        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }
        
    }
}
