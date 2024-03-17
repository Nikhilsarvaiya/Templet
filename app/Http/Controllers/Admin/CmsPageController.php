<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CmsPageController extends Controller
{
    public function list(Request $request){
        if($request->method() == 'POST'){
            $query = CmsPage::select('id','title','description');

            $query = $query->latest();

            return DataTables::of($query)
                ->editColumn('description', function($row){
                    return mb_strimwidth(strip_tags($row->description), 0, 100, '...');
                })
                ->addColumn('action', function($row){
                    $editRoute   = "<a href='".route('admin.cms.page.edit',$row->id)."' class='btn btn-icon btn-outline-brand btn-sm' title='Edit details'><i class='la la-edit'></i></a>&nbsp";
                    $deleteRoute = "<a href='".route('admin.cms.page.delete')."' data-id='".$row->id."' class='delete-record btn btn-icon btn-outline-danger btn-sm' title='Delete'><i class='la la-trash'></i></a>&nbsp;";

                    $editRoute   = $editRoute ? $editRoute : null;
                    $deleteRoute = $deleteRoute ? $deleteRoute : null;

                    // return "{$editRoute}{$deleteRoute}";
                    return "{$editRoute}";
                })
                ->rawColumns(['description','action'])
                ->make(true);
        }
        return view('admin.cms-page.list');
    }

    public function add( $id = null )
    {
      
        $cmspage = null;

        if( $id ){
            $cmspage = CmsPage::select('id','title','description')->findOrFail($id);
        }

        return view('admin.cms-page.add',compact('cmspage'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            "title"       => "required|unique:cms_pages,title,{$request->edit_id}",
            "description" => "required|string",
        ]);

        try {
            $validate = $request->only("title","type","description");

            
    
            $cmspageObj = ( $request->edit_id ) ? CmsPage::where('id',$request->edit_id)->first()  : new CmsPage;
            $cmspageObj->slug = Str::slug($request->title , "_");
            $cmspageObj->fill( $validate );
            $cmspageObj->save();

            if(!empty($request->edit_id)){
                return redirect()->route('admin.cms.page.list')->with('success', 'CMS Page update successfully');    
            }
            
            Cache::forget('cmspages');
            return redirect()->route('admin.cms.page.list')->with('success', 'CMS Page Save Successfully');
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
       $delete =  CmsPage::where('id', request('id'))->delete();
       Cache::forget('cmspages');
       echo ($delete > 0) ? true :  false;
    }
}
