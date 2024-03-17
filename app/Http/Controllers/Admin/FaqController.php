<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){
            $query = Faq::select('id','title','description');

            $query = $query->latest();

            return DataTables::of($query)
            ->editColumn('description', function($row){
                if($row->description){
                    return mb_strimwidth(strip_tags($row->description), 0, 100, '...');
                }else{
                    return "<span> No Data </span>";
                }
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.faq.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.faq.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['description','file','action'])
            ->make(true);
        }
        return view('admin.faq.list');
    }

    public function add( $id = null )
    {
        $faq = null;

        if( $id ){
            $faq = Faq::select('id','title','description')->findOrFail($id);
        }

        return view('admin.faq.add',compact('faq'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "title"         => "required|unique:faqs,title,{$request->edit_id}",
        ]);

        try {
            $validate = $request->only("title","description");
            $faq = ( $request->edit_id ) ? Faq::where('id',$request->edit_id)->first()  : new Faq();
            $faq->fill( $validate );
            $faq->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.faq.list')->with('success', 'Faq update successfully');    
            }
            
            return redirect()->route('admin.faq.list')->with('success', 'Faq create successfully');
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
       $delete =  Faq::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

