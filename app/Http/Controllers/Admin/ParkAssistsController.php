<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParkAssists;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ParkAssistsController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = ParkAssists::with('user')->select('id','user_id','vehicle_name','vehicle_no','mobile_no','created_at');
            if($request->from_date){
                $query->whereDate('created_at', '>=', $request->from_date);
            }
            if($request->to_date){
                $query->whereDate('created_at', '<=', $request->to_date);
            }

            $query = $query->latest();

            return DataTables::of($query)
            ->addColumn('user_id', function($row){
                return $row->user->name ?? '-';
            })
            ->addColumn('created_at', function($row){
                return date('d-m-Y h:i:a', strtotime($row->created_at));
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.parkassists.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.parkassists.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['user_id','action'])
            ->make(true);
        }
        return view('admin.parkassists.list');
    }

    public function add( $id = null )
    {
        $user = User::select('id','name')->get();
        $parkassists = null;

        if( $id ){
            $parkassists = ParkAssists::select('*')->findOrFail($id);
        }

        return view('admin.parkassists.add',compact('parkassists','user'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "vehicle_name"       => "required",
            "vehicle_no"       => "required",
            "mobile_no"       => "required",
        ]);

        try {
            $validate = $request->only('vehicle_name',
                'vehicle_no',
                'mobile_no',
            );

            $parkassists = ( $request->edit_id ) ? ParkAssists::where('id',$request->edit_id)->first()  : new ParkAssists();
            $parkassists->fill( $validate );
            $parkassists->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.parkassists.list')->with('success', 'Event update successfully');    
            }
            
            return redirect()->route('admin.parkassists.list')->with('success', 'Event create successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }
    public function delete(Request $request)
    {
        if(!$request->ajax()){
            return abort(404);
        }
       $delete =  ParkAssists::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

