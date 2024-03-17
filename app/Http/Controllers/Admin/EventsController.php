<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Categories;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function list(Request $request)
    {    
        if($request->method() == 'POST'){
            $query = Events::with('category')->select('id','category_id','title','cost','event_image','start_datetime','end_datetime');

            $query = $query->latest();

            // dd($query);

            return DataTables::of($query)
            ->editColumn('event_image', function($row){
                return '<img src="'.getImageUrl($row->event_image).'" class="img-thumbnail h-auto" style="width: 55px !important; " alt="No image found">';
            })
            ->addColumn('category_id', function($row){
                return $row->category->title ?? '-';
            })
            ->addColumn('action', function($row){
                $editRoute   = "<a href='".route('admin.events.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                $deleteRoute = "<a href='".route('admin.events.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                $editRoute   = $editRoute ? $editRoute : null;
                $deleteRoute = $deleteRoute ? $deleteRoute : null;

                return "{$editRoute}{$deleteRoute}";
            })
            ->rawColumns(['event_image','category','action'])
            ->make(true);
        }
        return view('admin.events.list');
    }

    public function add( $id = null )
    {
        $categories = Categories::select('id','title')->get();
        $events = null;

        if( $id ){
            $events = Events::select('*')->findOrFail($id);
        }

        return view('admin.events.add',compact('events','categories'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "title"       => "required|unique:events,title,{$request->edit_id}",
            "category_id"       => "required",
            "address"       => "nullable",
            "description"       => "nullable",
            "start_datetime"       => "required",
            "end_datetime"       => "required",
            "cost"       => "nullable",
            "website_url"       => "nullable",
            "name"       => "nullable",
            "phone"       => "nullable",
            "email"       => "nullable",
            "organizer_website_url"       => "nullable",
            "venue"       => "nullable",
            "google_map_url"       => "nullable",
            "event_image"     => "image|mimes:jpeg,png,jpg|dimensions:min_width=1141,min_height=474",
            "list_image"=> "image|mimes:jpeg,png,jpg|dimensions:min_width=199,min_height=176",
        ]);

        try {
            $validate = $request->only('title',
                'days',
                'address',
                'description',
                'start_datetime',
                'end_datetime',
                'duration',
                'cost',
                'category_id',
                'website_url',
                'name',
                'phone',
                'email',
                'organizer_website_url',
                'venue',
                'google_map_url'
            );

            if($request->hasFile('event_image')){
                $validate['event_image'] = $request->file('event_image')->store('events');
            }

            if($request->hasFile('list_image')){
                $validate['list_image'] = $request->file('list_image')->store('events');
            }

            $events = ( $request->edit_id ) ? Events::where('id',$request->edit_id)->first()  : new Events();
            $events->fill( $validate );
            $events->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.events.list')->with('success', 'Event update successfully');    
            }
            
            return redirect()->route('admin.events.list')->with('success', 'Event create successfully');
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
       $delete =  Events::where('id', request('id'))->delete();
       echo ($delete > 0) ? true :  false;
    }
}

