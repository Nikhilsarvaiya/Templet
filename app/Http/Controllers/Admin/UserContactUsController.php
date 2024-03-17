<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class UserContactUsController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){
            $query = UserContactUs::select('id','name','email','subject');

            $query = $query->latest();

            return DataTables::of($query)
                ->editColumn('description', function($row){
                    return mb_strimwidth(strip_tags($row->description), 0, 100, '...');
                })
                ->addColumn('action', function($row){
                    $editRoute   = "<a href='".route('admin.user.contact.us.view',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='View details'><i class='la la-eye'></i></a>&nbsp";
                    $deleteRoute = "<a href='".route('admin.user.contact.us.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                    $editRoute   = $editRoute ? $editRoute : null;
                    $deleteRoute = $deleteRoute ? $deleteRoute : null;

                    return "{$editRoute}{$deleteRoute}";
                    return "{$deleteRoute}";
                })
                ->rawColumns(['description','action'])
                ->make(true);
        }
        return view('admin.user-contact-us.list');
    }
    public function view(Request $request)
    {
        $user_inquiry = UserContactUs::select('*')->find($request->id);
        return view('admin.user-contact-us.view',compact('user_inquiry'));
    }

    public function delete(Request $request)
    {
        if(!$request->ajax()){
            return abort(404);
        }
       $delete =  UserContactUs::where('id', request('id'))->delete();
       Cache::forget('usercontactus');
       echo ($delete > 0) ? true :  false;
    }
}
