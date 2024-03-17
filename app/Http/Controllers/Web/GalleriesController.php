<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use DB;

class GalleriesController extends Controller
{
    public function index(Request $request)
    {
        $paginationLoad = false;

        $galleries = Galleries::select('id','title','image')->orderBy('id', 'DESC')->paginate(20);
        
        $galleries->setPath(route('web.galleries.load.more.galleries'));

        return view('web.galleries.index',compact('galleries','paginationLoad'));
    }
    public function detail($slug)
    {
        $this->slug = $slug;

        $galleries    = Galleries::select('id','title','image')->where('slug',$slug)->first();

        return view('web.galleries.detail', compact( 'galleries'));

    }

    public function loadMoreGalleriesMenu(Request $request)
    {   
        $paginationLoad = true;
        $galleries = Galleries::select('id','title','image')->orderBy('id', 'DESC')->paginate(20);
        if (request()->ajax()) {
            return response()->json([
                'status' => true,
                'html'   => view('web.galleries.more-list-menu',compact('galleries','paginationLoad'))->render(),
            ]);
        }
        return redirect( route('web.home'));
    }
}
