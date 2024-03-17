<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerPoojaBookings;
use App\Models\PoojaCreations;
use App\Models\PoojaCreationsSlots;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class CustomerPoojaBookingsController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){

            $query = CustomerPoojaBookings::select('id','pooja_creation_id','date','slots','customer_name','customer_number','country_code');

            if($request->from_date){
                $query->whereDate('date', '>=', $request->from_date);
            }
            if($request->to_date){
                $query->whereDate('date', '<=', $request->to_date);
            }

            $query = $query->orderBy('id','desc')->latest();

            return DataTables::of($query)
            ->editColumn('date', function($row){
                return date('D, d F, Y', strtotime($row->date));
            })
            ->editColumn('pooja_creation_id', function($row){
                $poojaCreations = PoojaCreations::select('id','pooja_name')->where('id',$row->pooja_creation_id)->first();
                return $poojaCreations->pooja_name;
            })
            ->editColumn('customer_number', function($row){
                return '+'.$row->country_code.' '.$row->customer_number;
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.customer.pooja.bookings.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.customer.pooja.bookings.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['date','pooja_creation_id','customer_number','action'])
            ->make(true);
        }
        return view('admin.customer-pooja-bookings.list');
    }

    public function add( $id = null )
    {
        $customer_pooja_bookings = null;

        $poojaCreations = PoojaCreations::orderBy('id','desc')->get();
        if( $id ){
            $customer_pooja_bookings = CustomerPoojaBookings::select('id','pooja_creation_id','date','slots','customer_name','customer_number','country_code')->findOrFail($id);
        }

        return view('admin.customer-pooja-bookings.add',compact('customer_pooja_bookings','poojaCreations'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // "pooja_creation_id"         => "required|unique:customer_pooja_bookings,pooja_creation_id,{$request->edit_id}",
            "pooja_creation_id"         => "nullable",
            // "date"                      => "required|unique:customer_pooja_bookings,date,{$request->edit_id}",
            "date"                      => "required",
            "customer_name"             => "required",
            "customer_number"           => "required",
            "slots.*"                   => "required",
        ]);

        if (empty($request->slots)) {
            return redirect()->back()->withErrors("Slot is required.");
        }

        try {
            $validate = $request->only('pooja_creation_id','date','customer_name','customer_number','country_code');
            $pooja_masters_boj = ( $request->edit_id ) ? CustomerPoojaBookings::where('id',$request->edit_id)->first()  : new CustomerPoojaBookings();
            
            $slots = implode(',',$request->slots);
            $pooja_masters_boj->slots = $slots;
            $pooja_masters_boj->fill( $validate );
            // dd($pooja_masters_boj);
            $pooja_masters_boj->save();
            

            if(!empty($request->edit_id)){
                return redirect()->route('admin.customer.pooja.bookings.list')->with('success', 'Update successfully');    
            }
            
            return redirect()->route('admin.customer.pooja.bookings.list')->with('success', 'Create successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". $th->getMessage() );
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }

    public function delete(Request $request)
    {
        if(!$request->ajax()){
            return abort(404);
        }
       $delete =  CustomerPoojaBookings::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }

    public function poojaDateSlot(Request $request)
    {
        $poojaDate = "";
        $poojaCreationsSlots = "";
        $slot_arr_html = "";
        if( $request->date ){
            $poojaDate = PoojaCreations::select('id','date','morning_blocked as morning','evening_blocked as evening')->where(['date'=>$request->date])->where('pooja_name', 'LIKE', '%'.$request->pooja_creation_name.'%')->first();

            if(!empty($poojaDate)){
                if($poojaDate->morning==0 || $poojaDate->evening==0){
                    $poojaCreationsSlots = PoojaCreationsSlots::where('pooja_create_id',$poojaDate->id)->get();

                    $customerPoojaBookings = CustomerPoojaBookings::select('id','slots')->where('date',$request->date)->get();
                    if(!empty($customerPoojaBookings)){
                        $get_slot_arr = array();
                        foreach($customerPoojaBookings as $customerPoojaBooking){
                            array_push($get_slot_arr,$customerPoojaBooking->slots);
                        }
                    }
                    $slots_arr = explode(',',implode(',',$get_slot_arr));

                    if(!empty($poojaCreationsSlots)){
                        foreach($poojaCreationsSlots as $poojaCreationsSlot){
                            $slot_arr_html .= "
                                    <div class='col-lg-2'>
                                        <p><label><input type='checkbox' name='slots[]' placeholder='Select slots' value='".$poojaCreationsSlot->slot_time."' class='panditji-checkbox'"; 
                                        if(in_array($poojaCreationsSlot->slot_time, $slots_arr)){
                                            $slot_arr_html .= "disabled";
                                        }                                        
                                        $slot_arr_html .= "/>".date('h:i A', strtotime($poojaCreationsSlot->slot_time." 03/15/2024"))."</label></p>
                                    </div>
                            ";
                        }
                    }
                }
            }
        }
        return response()->json($slot_arr_html);
    }

    public function poojaDateSlotEdit(Request $request)
    {
        $poojaDate = "";
        $poojaCreationsSlots = "";
        $slot_arr_html = "";

        if( $request->date ){
            $poojaDate = PoojaCreations::select('id','date','morning_blocked as morning','evening_blocked as evening')->where(['date'=>$request->date])->where('pooja_name', 'LIKE', '%'.$request->pooja_creation_name.'%')->first();

            if(!empty($poojaDate)){
                if($poojaDate->morning==0 || $poojaDate->evening==0){
                    $poojaCreationsSlots = PoojaCreationsSlots::where('pooja_create_id',$poojaDate->id)->get();
                    $customerPoojaBookings = CustomerPoojaBookings::select('id','slots')->where('id',$request->edit_id)->first();
                    $slots_arr = explode(',',$customerPoojaBookings->slots);

                    $customerPoojaBookings = CustomerPoojaBookings::select('id','slots')->where('id','!=',$request->edit_id)->where('date',$request->date)->get();
                    if(!empty($customerPoojaBookings)){
                        $get_slot_arr = array();
                        foreach($customerPoojaBookings as $customerPoojaBooking){
                            array_push($get_slot_arr,$customerPoojaBooking->slots);
                        }
                    }
                    $disabled_slots_arr = explode(',',implode(',',$get_slot_arr));

                    if(!empty($poojaCreationsSlots)){
                        foreach($poojaCreationsSlots as $poojaCreationsSlot){
                            $slot_arr_html .= "
                                <div class='col-lg-2'>
                                    <p><label><input type='checkbox' name='slots[]' placeholder='Select slots' value='".$poojaCreationsSlot->slot_time."' class='panditji-checkbox'";
                                    if(in_array($poojaCreationsSlot->slot_time, $slots_arr)){
                                        $slot_arr_html .= "checked";
                                    }

                                    if(in_array($poojaCreationsSlot->slot_time, $disabled_slots_arr)){
                                        $slot_arr_html .= "disabled";
                                    }
                                    
                                    $slot_arr_html .= " />".date('h:i A', strtotime($poojaCreationsSlot->slot_time." 03/15/2024")).' - '.date('h:i A', strtotime($poojaCreationsSlot->slot_time." 03/15/2024 + 15 minute"))."</label></p>
                                </div>
                            ";
                        }
                    }
                }
            }
        }
        return response()->json($slot_arr_html);
    }
}

