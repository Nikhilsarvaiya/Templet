<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = Programs::select('id','title','date','month','year');
            $query = $query->latest();

            return DataTables::of($query)
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.programs.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.programs.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.programs.list');
    }

    public function add( $id = null )
    {
        $programs = null;

        if( $id ){
            $programs = Programs::select('*')->findOrFail($id);
        }

        return view('admin.programs.add',compact('programs'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "title"       => "required",
            "date"        => "required",
            "month"       => "required",
        ]);

        try {
            $validate = $request->only('title','date','month');

            $objPrograms = ( $request->edit_id ) ? Programs::where('id',$request->edit_id)->first()  : new Programs();
            $objPrograms->fill( $validate );
            $objPrograms->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.programs.list')->with('success', 'Programs update successfully');    
            }
            
            return redirect()->route('admin.programs.list')->with('success', 'Programs save successfully');
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
       $delete =  Programs::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

