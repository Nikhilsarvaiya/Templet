<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // get category
    public function list(Request $request){
        if($request->method() == 'POST'){

            $query = Categories::select('id','title');

            $query = $query->latest();

            return DataTables::of($query)

            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.category.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.category.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.category.list');
    }

    public function add( $id = null )
    {
        $category = null;

        if( $id ){
            $category = Categories::select('id','title')->findOrFail($id);
        }

        return view('admin.category.add',compact('category'));

    }

    public function store(Request $request)
    {
        $request->validate([
            // "title" => "required|string",
            'title' => [
                'required',
                'unique:categories,title,' . $request->edit_id
            ],
        ]);

        try {
            $validate = $request->only("title");

            $categoryObj = ( $request->edit_id ) ? Categories::where('id',$request->edit_id)->first()  : new Categories;
            $categoryObj->fill( $validate );
            $categoryObj->save();
            
            return redirect()->route('admin.category.list')->with('success', ($request->edit_id) ? 'Category update successfully' : 'Category create successfully');
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

        try {
            $delete =  Categories::where('id', request('id'))->first();
            $delete->events()->delete();
            $delete->delete();
            echo true;
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th->getMessage() ));
        }
        echo false;
        return;
    }
}
