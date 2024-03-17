<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ParkAssists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ParkAssistsController extends Controller
{
    public function __construct()
    {
        if(!Auth::check())
        {
            return redirect()->route('web.home');
        }
    }

    public function save(Request $request)
    {
        // return $request->all();
        $request->validate([
            'vehicle_name'      => 'nullable',
            'vehicle_no'        => 'nullable',
            'mobile_no'         => 'nullable|min:10',
        ],[
            'vehicle_name.required'     => 'The name field is required.',
            'vehicle_no.required'       => 'The vehicle number field is required.',
            'mobile_no.required'        => 'The mobile number field is required.',
        ]);

        try {
            $validate = $request->only( 
                        'vehicle_name',
                        'vehicle_no',
                        'mobile_no',
                        'user_id',
                    );

            if(Auth::check()){
                $validate['user_id'] = Auth::user()->id;
            }

            $parkAssists = new ParkAssists;
            $parkAssists->fill( $validate );

            
            if($parkAssists->save()){
                return redirect()->route('web.park.assist')->with('success', 'Save Successfully');
            }
            return back()->with('error', 'Oops! something went wrong, Please try again later');

        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }
        
    }

    public function searchVehicle(Request $request)
    {
        return view('web.park-assist.search');
    }

    public function searchVehiclePost(Request $request)
    {
        // dd($request->vehicle_no);
        try {
            if($request->vehicle_no){
                $vehicle_data = ParkAssists::where('vehicle_no',$request->vehicle_no)->first();

                return response()->json(['success'=>$vehicle_data]);
            }
            else{
                return back()->with('error', 'Oops! something went wrong, Please try again later');    
            }
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }
    }

    public function updateVehicle(Request $request)
    {
        return view('web.park-assist.update');
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'vehicle_name'      => 'required',
            'vehicle_no'        => 'required',
            'mobile_no'         => 'required|min:10',
        ],[
            'vehicle_name.required'     => 'The name field is required.',
            'vehicle_no.required'       => 'The vehicle number field is required.',
            'mobile_no.required'        => 'The mobile number field is required.',
        ]);

        try {
            $validate = $request->only( 
                        'vehicle_name',
                        'vehicle_no',
                        'mobile_no',
                        'user_id',
                    );

            if(Auth::check()){
                $validate['user_id'] = Auth::user()->id;
            }

            $parkAssists = ParkAssists::where('id',$request->vehicle_id)->first();
            $parkAssists->fill( $validate );

            
            if($parkAssists->save()){
                return redirect()->route('web.park.update.vehicle')->with('success', 'Update Successfully');
            }
            return back()->with('error', 'Oops! something went wrong, Please try again later');

        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }
        
    }
}
