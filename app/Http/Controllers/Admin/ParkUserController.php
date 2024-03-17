<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParkUserController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = User::select('*');
            $query = $query->latest();

            return DataTables::of($query)
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.parkusers.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.parkusers.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('admin.parkusers.list');
    }

    public function add( $id = null )
    {
        $parkusers = null;

        if( $id ){
            $parkusers = User::select('*')->findOrFail($id);
        }

        return view('admin.parkusers.add',compact('parkusers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "name"       => "required",
            "email"       => "required",
            "password"       => "nullable",
        ]);

        try {
            $validate = $request->only('name', 'email');

            if($request->password){
                $validate['password'] = Hash::make($request->password);
            }
            $validate['role'] = 1;

            $users = ( $request->edit_id ) ? User::where('id',$request->edit_id)->first()  : new User();
            $users->fill( $validate );
            $users->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.parkusers.list')->with('success', 'User update successfully');    
            }
            
            return redirect()->route('admin.parkusers.list')->with('success', 'User create successfully');
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
       $delete =  User::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

