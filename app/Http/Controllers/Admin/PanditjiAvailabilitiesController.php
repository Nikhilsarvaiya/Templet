<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanditjiAvailabilities;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PanditjiAvailabilitiesController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){
            $query = PanditjiAvailabilities::select('id','date','morning','evening');

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
            ->editColumn('morning', function($row){
                return $row->morning==1 ? "No" : "Yes";
            })
            ->editColumn('evening', function($row){
                return $row->evening==1 ? "No" : "Yes";
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.panditji.availabilities.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.panditji.availabilities.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['date','morning','evening','action'])
            ->make(true);
        }
        return view('admin.panditji-availabilities.list');
    }

    public function add( $id = null )
    {
        $panditji_availabilities = null;

        if( $id ){
            $panditji_availabilities = PanditjiAvailabilities::select('id','date','morning','evening')->findOrFail($id);
        }

        return view('admin.panditji-availabilities.add',compact('panditji_availabilities'));
    }

    public function edit( $id = null )
    {
        $panditji_availabilities = null;

        if( $id ){
            $panditji_availabilities = PanditjiAvailabilities::select('id','date','morning','evening')->findOrFail($id);
        }
        return view('admin.panditji-availabilities.edit',compact('panditji_availabilities'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date.*' => [
                'required',
                'unique:panditji_availabilities,date' . $request->id,
                'distinct',
            ],
        ]); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->all());
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $validate = $request->only('date','morning','evening');
            $date_arr = array();
            $morning_arr = array();
            $evening_arr = array();
            $date_arr = $request->date;
            $morning_arr = $request->morning + array_fill(0,count($date_arr),0);
            $evening_arr = $request->evening + array_fill(0,count($date_arr),0);
            ksort($morning_arr);
            ksort($evening_arr);

            if(!empty($date_arr)){
                foreach($date_arr as $key => $date_arr_d){
                    $pooja_masters_boj = new PanditjiAvailabilities();
                    $morning = 0;
                    $evening = 0;
                    if(!empty($morning_arr)){
                        foreach($morning_arr as $key_morning => $morning_arr_d){
                            if($key == $key_morning){
                                $morning = (int)$morning_arr_d;
                            }
                        }
                        $pooja_masters_boj->morning = $morning;
                    }
                    if(!empty($evening_arr)){
                        foreach($evening_arr as $key_evening => $evening_arr_d){
                            if($key == $key_evening){
                                $evening = (int)$evening_arr_d;
                            }   
                        }                        
                        $pooja_masters_boj->evening = $evening;
                    }
                    $pooja_masters_boj->date = $date_arr_d;
                    // dd($pooja_masters_boj);
                    $pooja_masters_boj->save();
                }
            }

            

            // if(!empty($request->edit_id)){
            //     return redirect()->route('admin.panditji.availabilities.list')->with('success', 'Update successfully');    
            // }
            
            return redirect()->route('admin.panditji.availabilities.list')->with('success', 'Create successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". $th->getMessage() );
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }

    public function update(Request $request)
    {
        $request->validate([
            "date"         => "required|unique:panditji_availabilities,date,{$request->edit_id}",
        ]);

        try {
            $validate = $request->only('date','morning','evening');
            $pooja_masters_boj = ( $request->edit_id ) ? PanditjiAvailabilities::where('id',$request->edit_id)->first()  : new PanditjiAvailabilities();
            $pooja_masters_boj->morning = (int)$request->morning;
            $pooja_masters_boj->evening = (int)$request->evening;
            $pooja_masters_boj->date = $request->date;
            $pooja_masters_boj->save();
            

            if(!empty($request->edit_id)){
                return redirect()->route('admin.panditji.availabilities.list')->with('success', 'Update successfully');    
            }
            
            return redirect()->route('admin.panditji.availabilities.list')->with('success', 'Create successfully');
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
       $delete =  PanditjiAvailabilities::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

