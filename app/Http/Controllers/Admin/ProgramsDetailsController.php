<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProgramsDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ProgramsDetailsController extends Controller
{
    public function add(ProgramsDetails $programdetails){
        $programdetails = ProgramsDetails::first();
        return view('admin.programs-details.add',compact('programdetails'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "morning_title"             => "required",
            "morning_start_time"        => "required",
            "morning_end_time"          => "required",
            "evening_title"             => "required",
            "evening_start_time"        => "required",
            "evening_end_time"          => "required",
        ]);

        try {
            $validate = $request->only( 
                "morning_title",
                "morning_start_time",
                "morning_end_time",
                "evening_title",
                "evening_start_time",
                "evening_end_time",
            );

            $programdetailsObj = ( $request->edit_id ) ? ProgramsDetails::where('id',$request->edit_id)->first()  : new ProgramsDetails;
            $programdetailsObj->fill( $validate );
            $programdetailsObj->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.programs.details.add')->with('success', 'Program update successfully');    
            }
            
            return redirect()->route('admin.programs.details.add')->with('success', 'Program Save Successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }
}
