<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teams;
use App\Models\Categories;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = Teams::select('*');

            $query = $query->latest();

            // dd($query);

            return DataTables::of($query)
            ->editColumn('image', function($row){
                return '<img src="'.getImageUrl($row->image).'" class="img-thumbnail h-auto" style="width: 55px !important; " alt="No image found">';
            })
            ->addColumn('category_id', function($row){
                return $row->category->title ?? '-';
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.teams.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.teams.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('admin.teams.list');
    }

    public function add( $id = null )
    {
        $teams = null;

        if( $id ){
            $teams = Teams::select('*')->findOrFail($id);
        }

        return view('admin.teams.add',compact('teams'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "name"       => "required",
            "designation"       => "required",
            "image"     => "image|mimes:jpeg,png,jpg|dimensions:min_width=261,min_height=257",
        ]);

        try {
            $validate = $request->only('name', 'designation');

            if($request->hasFile('image')){
                $validate['image'] = $request->file('image')->store('teams');
            }

            $teams = ( $request->edit_id ) ? Teams::where('id',$request->edit_id)->first()  : new Teams();
            $teams->fill( $validate );
            $teams->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.teams.list')->with('success', 'Team update successfully');    
            }
            
            return redirect()->route('admin.teams.list')->with('success', 'Team create successfully');
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
       $delete =  Teams::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

