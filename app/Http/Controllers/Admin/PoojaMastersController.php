<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PoojaMasters;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PoojaMastersController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){
            $query = PoojaMasters::select('id','pooja_name','pooja_desc','samagri_list','random_id');

            $query = $query->latest();

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
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.pooja.masters.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.pooja.masters.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['pooja_desc','samagri_list','action'])
            ->make(true);
        }
        return view('admin.pooja-masters.list');
    }

    public function add( $id = null )
    {
        $pooja_masters = null;

        if( $id ){
            $pooja_masters = PoojaMasters::select('id','pooja_name','pooja_desc','samagri_list','random_id')->findOrFail($id);
        }

        return view('admin.pooja-masters.add',compact('pooja_masters'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "pooja_name"         => "required|unique:pooja_masters,pooja_name,{$request->edit_id}",
        ]);

        try {
            $validate = $request->only('pooja_name','pooja_desc','samagri_list','random_id');
            $pooja_masters_boj = ( $request->edit_id ) ? PoojaMasters::where('id',$request->edit_id)->first()  : new PoojaMasters();
            if(!$request->edit_id){
                $validate['random_id'] = rand(100000,900000);
            }            
            $pooja_masters_boj->fill( $validate );
            $pooja_masters_boj->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.pooja.masters.list')->with('success', 'Pooja update successfully');    
            }
            
            return redirect()->route('admin.pooja.masters.list')->with('success', 'Pooja create successfully');
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
       $delete =  PoojaMasters::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

