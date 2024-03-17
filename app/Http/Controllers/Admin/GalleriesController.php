<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = Galleries::select('id','title','image');

            $query = $query->latest();

            // dd($query);

            return DataTables::of($query)
            ->editColumn('image', function($row){
                return '<img src="'.getImageUrl($row->image).'" class="img-thumbnail h-auto" style="width: 55px !important; " alt="No image found">';
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.galleries.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.galleries.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('admin.galleries.list');
    }

    public function add( $id = null )
    {
        $galleries = null;

        if( $id ){
            $galleries = Galleries::select('*')->findOrFail($id);
        }

        return view('admin.galleries.add',compact('galleries'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "title"       => "required|unique:galleries,title,{$request->edit_id}",
            "image"     => "image|mimes:jpeg,png,jpg|dimensions:min_width=260,min_height=260",
        ]);

        try {
            $validate = $request->only('title');

            if($request->hasFile('image')){
                $validate['image'] = $request->file('image')->store('galleries');
            }

            $Galleries = ( $request->edit_id ) ? Galleries::where('id',$request->edit_id)->first()  : new Galleries();
            $Galleries->fill( $validate );
            $Galleries->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.galleries.list')->with('success', 'Gallery update successfully');    
            }
            
            return redirect()->route('admin.galleries.list')->with('success', 'Gallery save successfully');
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
       $delete =  Galleries::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

