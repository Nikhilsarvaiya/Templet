<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PoojaCreations;
use App\Models\PoojaMasters;
use App\Models\PanditjiAvailabilities;
use App\Models\PoojaCreationsSlots;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


class PoojaCreationsController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){
            $query = PoojaCreations::select('id','pooja_name','pooja_desc','samagri_list','date','morning_blocked','evening_blocked');

            $query = $query->orderBy('id','desc')->latest();

            return DataTables::of($query)
            ->editColumn('pooja_desc', function($row){
                if($row->pooja_desc){
                    return mb_strimwidth(strip_tags($row->pooja_desc), 0, 100, '...');
                }else{
                    return "<span> No Data </span>";
                }
            })
            ->editColumn('samagri_list', function($row){
                if($row->samagri_list){
                    return mb_strimwidth(strip_tags($row->samagri_list), 0, 100, '...');
                }else{
                    return "<span> No Data </span>";
                }
            })
            ->editColumn('date', function($row){
                return date('D, d F, Y', strtotime($row->date));
            })
            ->editColumn('morning_blocked', function($row){
                return $row->morning_blocked==1 ? "Yes" : "No";
            })
            ->editColumn('evening_blocked', function($row){
                return $row->evening_blocked==1 ? "Yes" : "No";
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.pooja.creations.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.pooja.creations.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['pooja_desc','samagri_list','date','morning_blocked','evening_blocked','action'])
            ->make(true);
        }
        return view('admin.pooja-creations.list');
    }

    public function add( $id = null )
    {
        $pooja_creations = null;
        // $poojaMasters = PoojaMasters::whereDoesntHave('poojaCreations')->get();
        $poojaMasters = PoojaMasters::get();
        if( $id ){
            $pooja_creations = PoojaCreations::select('id','pooja_id','pooja_name','pooja_desc','samagri_list','date','morning_start_time','morning_end_time','evening_start_time','evening_end_time','morning_blocked','evening_blocked')->findOrFail($id);
        }
        return view('admin.pooja-creations.add',compact('pooja_creations','poojaMasters'));
    }

    public function edit( $id = null )
    {
        $pooja_creations = null;
        // $poojaMasters = PoojaMasters::whereDoesntHave('poojaCreations')->get();
        $poojaMasters = PoojaMasters::get();
        if( $id ){
            $pooja_creations = PoojaCreations::select('id','pooja_id','pooja_name','pooja_desc','samagri_list','date','morning_start_time','morning_end_time','evening_start_time','evening_end_time','morning_blocked','evening_blocked')->findOrFail($id);
        }
        return view('admin.pooja-creations.edit',compact('pooja_creations','poojaMasters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "pooja_id"                  => "required",
            "pooja_name"                => "nullable",
            "pooja_desc"                => "nullable",
            "samagri_list"              => "nullable",
            // "date"                      => "required|unique:pooja_creations,date,{$request->edit_id}",
            'date.*' => [
                'required',
                'unique:pooja_creations,date' . $request->id,
                'distinct',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->all());
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $validate = $request->only('pooja_id','pooja_name','pooja_desc','samagri_list','date','morning_start_time','morning_end_time','evening_start_time','evening_end_time','morning_blocked','evening_blocked');

            $date_arr = array();
            $morning_start_time_arr = array();
            $morning_end_time_arr = array();
            $evening_start_time_arr = array();
            $evening_end_time_arr = array();
            $date_arr = $request->date;
            $morning_start_time_arr = $request->morning_start_time;
            $morning_end_time_arr = $request->morning_end_time;
            $evening_start_time_arr = $request->evening_start_time;
            $evening_end_time_arr = $request->evening_end_time;

            if(!empty($date_arr)){
                foreach($date_arr as $key => $date_arr_d){

                    $pooja_masters_boj = new PoojaCreations();

                    $pooja_masters_boj->date = $date_arr_d;

                    $morning_start_time = null;
                    $morning_end_time = null;
                    $evening_start_time = null;
                    $evening_end_time = null;

                    foreach($morning_start_time_arr as $key_morning => $morning_start_time_arr_d){
                        if($key == $key_morning){
                            $morning_start_time = $morning_start_time_arr_d;
                        }
                    }
                    foreach($morning_end_time_arr as $key_morning => $morning_end_time_arr_d){
                        if($key == $key_morning){
                            $morning_end_time = $morning_end_time_arr_d;
                        }
                    }
                    foreach($evening_start_time_arr as $key_morning => $evening_start_time_arr_d){
                        if($key == $key_morning){
                            $evening_start_time = $evening_start_time_arr_d;
                        }
                    }
                    foreach($evening_end_time_arr as $key_morning => $evening_end_time_arr_d){
                        if($key == $key_morning){
                            $evening_end_time = $evening_end_time_arr_d;
                        }
                    }

                    $pooja_masters_boj->morning_start_time = $morning_start_time;
                    $pooja_masters_boj->morning_end_time = $morning_end_time;
                    $pooja_masters_boj->evening_start_time = $evening_start_time;
                    $pooja_masters_boj->evening_end_time = $evening_end_time;
                    
                    if(empty($morning_start_time)){
                        $pooja_masters_boj->morning_blocked = 1;
                    } else {
                        $pooja_masters_boj->morning_blocked = 0;
                    }
                    if(empty($evening_start_time)){
                        $pooja_masters_boj->evening_blocked = 1;
                    } else {
                        $pooja_masters_boj->evening_blocked = 0;
                    }
                    $pooja_masters_boj->pooja_id = $request->pooja_id;
                    $pooja_masters_boj->pooja_name = $request->pooja_name;
                    $pooja_masters_boj->pooja_desc = $request->pooja_desc;
                    $pooja_masters_boj->samagri_list = $request->samagri_list;
                    // $pooja_masters_boj->fill( $validate );
                    $pooja_masters_boj->save();

                    // morning slot calculation start
                        if($evening_start_time!=null && $evening_end_time!=null){
                            if($morning_start_time!=null && $morning_end_time!=null){
                                $period_morning = new CarbonPeriod($morning_start_time, '15 minutes', $morning_end_time);
                                $slots_morning = [];
                                foreach($period_morning as $item_morning){
                                    array_push($slots_morning,$item_morning->format("H:i:s"));
                                }
                                if(!empty($slots_morning)){
                                    foreach($slots_morning as $slot_morning){
                                        $pooja_creations_slots_obj = new PoojaCreationsSlots();
                                        $pooja_creations_slots_obj->pooja_create_id = $pooja_masters_boj->id;
                                        $pooja_creations_slots_obj->morning_start_time = $pooja_masters_boj->morning_start_time;
                                        $pooja_creations_slots_obj->morning_end_time = $pooja_masters_boj->morning_end_time;
                                        $pooja_creations_slots_obj->evening_start_time = null;
                                        $pooja_creations_slots_obj->evening_end_time = null;
                                        $pooja_creations_slots_obj->is_morning = $pooja_masters_boj->morning_blocked==0 ? 1 : 0;
                                        $pooja_creations_slots_obj->is_evening = 0;
                                        $pooja_creations_slots_obj->slot_time = $slot_morning;
                                        $pooja_creations_slots_obj->save();
                                    }
                                }
                            }
                        }
                    // morning slot calculation end

                    // evening slot calculation start
                        if($evening_start_time!=null && $evening_end_time!=null){
                            $period_evening = new CarbonPeriod($evening_start_time, '15 minutes', $evening_end_time);
                            $slots_evening = [];
                            foreach($period_evening as $item_evening){
                                array_push($slots_evening,$item_evening->format("H:i:s"));
                            }
                            if(!empty($slots_evening)){
                                foreach($slots_evening as $slot_evening){
                                    $pooja_creations_slots_obj = new PoojaCreationsSlots();
                                    $pooja_creations_slots_obj->pooja_create_id = $pooja_masters_boj->id;
                                    $pooja_creations_slots_obj->morning_start_time = null;
                                    $pooja_creations_slots_obj->morning_end_time = null;
                                    $pooja_creations_slots_obj->evening_start_time = $pooja_masters_boj->evening_start_time;
                                    $pooja_creations_slots_obj->evening_end_time = $pooja_masters_boj->evening_end_time;
                                    $pooja_creations_slots_obj->is_morning = 0;
                                    $pooja_creations_slots_obj->is_evening = $pooja_masters_boj->evening_blocked==0 ? 1 : 0;
                                    $pooja_creations_slots_obj->slot_time = $slot_evening;
                                    $pooja_creations_slots_obj->save();
                                }
                            }
                        }
                    // evening slot calculation end
                }
            }
            
            return redirect()->route('admin.pooja.creations.list')->with('success', 'Pooja create successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". $th->getMessage() );
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }

    public function update(Request $request)
    {
        $request->validate([
            "pooja_id"                  => "required",
            "pooja_name"                => "nullable",
            "pooja_desc"                => "nullable",
            "samagri_list"              => "nullable",
            "date"                      => "required|unique:pooja_creations,date,{$request->edit_id}", 
        ]);

        try {
            $validate = $request->only('pooja_id','pooja_name','pooja_desc','samagri_list','date','morning_start_time','morning_end_time','evening_start_time','evening_end_time','morning_blocked','evening_blocked');
            $pooja_masters_boj = ( $request->edit_id ) ? PoojaCreations::where('id',$request->edit_id)->first()  : new PoojaCreations();
            if(empty($request->morning_start_time)){
                $pooja_masters_boj->morning_blocked = 1;
            } else {
                $pooja_masters_boj->morning_blocked = 0;
            }
            if(empty($request->evening_start_time)){
                $pooja_masters_boj->evening_blocked = 1;
            } else {
                $pooja_masters_boj->evening_blocked = 0;
            }
            $pooja_masters_boj->fill( $validate );
            $pooja_masters_boj->save();

            $morning_start_time = $request->morning_start_time ?? null;
            $morning_end_time = $request->morning_end_time ?? null;
            $evening_start_time = $request->evening_start_time ?? null;
            $evening_end_time = $request->evening_end_time ?? null;

            $delete_PoojaCreationsSlots =  PoojaCreationsSlots::where('pooja_create_id', $pooja_masters_boj->id)->delete();

            // morning slot calculation start
                if($morning_start_time!=null && $morning_end_time!=null){
                    $period_morning = new CarbonPeriod($morning_start_time, '15 minutes', $morning_end_time);
                    $slots_morning = [];
                    foreach($period_morning as $item_morning){
                        array_push($slots_morning,$item_morning->format("H:i:s"));
                    }
                    if(!empty($slots_morning)){
                        foreach($slots_morning as $slot_morning){
                            $pooja_creations_slots_obj = new PoojaCreationsSlots();
                            $pooja_creations_slots_obj->pooja_create_id = $pooja_masters_boj->id;
                            $pooja_creations_slots_obj->morning_start_time = $pooja_masters_boj->morning_start_time;
                            $pooja_creations_slots_obj->morning_end_time = $pooja_masters_boj->morning_end_time;
                            $pooja_creations_slots_obj->evening_start_time = null;
                            $pooja_creations_slots_obj->evening_end_time = null;
                            $pooja_creations_slots_obj->is_morning = $pooja_masters_boj->morning_blocked==0 ? 1 : 0;
                            $pooja_creations_slots_obj->is_evening = 0;
                            $pooja_creations_slots_obj->slot_time = $slot_morning;
                            $pooja_creations_slots_obj->save();
                        }
                    }
                }
            // morning slot calculation end

            // evening slot calculation start
                if($evening_start_time!=null && $evening_end_time!=null){
                    $period_evening = new CarbonPeriod($evening_start_time, '15 minutes', $evening_end_time);
                    $slots_evening = [];
                    foreach($period_evening as $item_evening){
                        array_push($slots_evening,$item_evening->format("H:i:s"));
                    }
                    if(!empty($slots_evening)){
                        foreach($slots_evening as $slot_evening){
                            $pooja_creations_slots_obj = new PoojaCreationsSlots();
                            $pooja_creations_slots_obj->pooja_create_id = $pooja_masters_boj->id;
                            $pooja_creations_slots_obj->morning_start_time = null;
                            $pooja_creations_slots_obj->morning_end_time = null;
                            $pooja_creations_slots_obj->evening_start_time = $pooja_masters_boj->evening_start_time;
                            $pooja_creations_slots_obj->evening_end_time = $pooja_masters_boj->evening_end_time;
                            $pooja_creations_slots_obj->is_morning = 0;
                            $pooja_creations_slots_obj->is_evening = $pooja_masters_boj->evening_blocked==0 ? 1 : 0;
                            $pooja_creations_slots_obj->slot_time = $slot_evening;
                            $pooja_creations_slots_obj->save();
                        }
                    }
                }
            // evening slot calculation end

            if(!empty($request->edit_id)){
                return redirect()->route('admin.pooja.creations.list')->with('success', 'Pooja update successfully');    
            }
            
            return redirect()->route('admin.pooja.creations.list')->with('success', 'Pooja create successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". $th->getMessage() );
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }

    // poojaData
    public function poojaData(Request $request)
    {
        $poojaMasters = null;
        if( $request->id ){
            $poojaMasters = PoojaMasters::select('id','pooja_name','pooja_desc','samagri_list')->findOrFail($request->id);
        }
        return response()->json($poojaMasters);
    }

    // panditjiData
    public function panditjiData(Request $request)
    {
        $panditjiData = null;
        if( $request->date ){
            $panditjiData = PanditjiAvailabilities::select('id','date','morning','evening')->where('date',$request->date)->first();
        }
        return response()->json($panditjiData);
    }

    // poojaDate
    public function poojaDate(Request $request)
    {
        $poojaDate = null;
        if( $request->date ){
            $poojaDate = PoojaCreations::select('id','date','morning_blocked as morning','evening_blocked as evening')->where('date',$request->date)->first();
        }
        return response()->json($poojaDate);
    }

    public function delete(Request $request)
    {
        if(!$request->ajax()){
            return abort(404);
        }
       $delete =  PoojaCreations::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

