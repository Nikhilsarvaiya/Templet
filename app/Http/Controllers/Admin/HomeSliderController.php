<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = HomeSlider::select('id','title','image','sequence');

            $query = $query->latest();

            return DataTables::of($query)
            ->editColumn('image', function($row){
                return '<img src="'.getImageUrl($row->image).'" class="img-thumbnail h-auto" style="width: 55px !important; " alt="No image found">';
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.home.slider.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.home.slider.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['image','action'])
            ->make(true);
        }
        return view('admin.home-slider.list');
    }

    public function add( $id = null )
    {
        $home_slider = null;

        if( $id ){
            $home_slider = HomeSlider::select('id','title','image','sequence','url','url2')->findOrFail($id);
        }

        return view('admin.home-slider.add',compact('home_slider'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "title"       => "required|unique:home_sliders,title,{$request->edit_id}",
            // "image"     => "image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1368,max_height=619|".mimesFileValidation("image"),
            "image"     => "image|mimes:jpeg,png,jpg|dimensions:min_width=1371,min_height=648",
            // "image"     => "nullable",
        ]);

        try {
            $validate = $request->only("title","image","url","url2","sequence");

            if($request->hasFile('image')){
                $validate['image'] = $request->file('image')->store('home-slider');
            }

            $home_slider = ( $request->edit_id ) ? HomeSlider::where('id',$request->edit_id)->first()  : new HomeSlider();
            $home_slider->fill( $validate );
            $home_slider->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.home.slider.list')->with('success', 'Home slider update successfully');    
            }
            
            return redirect()->route('admin.home.slider.list')->with('success', 'Home slider save successfully');
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
       $delete =  HomeSlider::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

