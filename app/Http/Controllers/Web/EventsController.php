<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Categories;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use DB;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::select('id','title','slug')->get();
        $paginationLoad = false;

        // $events = Events::select('id','title','slug','description','event_image','list_image','start_datetime','address','days')->orderBy('id', 'DESC')->paginate(9);
        $events = Events::select('id','title','slug','description','event_image','list_image','start_datetime','duration','address','days')->orderBy('id', 'DESC')->get();
        
        // $events->setPath(route('web.events.load.more.events'));

        return view('web.events.index',compact('categories','events','paginationLoad'));
    }
    public function detail($slug)
    {
        $this->slug = $slug;

        $events    = Events::with('category')->select('id','category_id','title','slug','description','event_image','list_image','start_datetime','end_datetime','duration','address','days','cost','website_url','name','phone','email','organizer_website_url','venue','google_map_url')->where('slug',$slug)->first();

        $related_events    = Events::select('id','title','slug','description','event_image','list_image','start_datetime','address','days')->where('category_id',$events->category_id)->where('id','!=',$events->id)->orderBy('id', 'DESC')->take(2)->get();        

        return view('web.events.detail', compact( 'events','related_events'));

    }

    public function loadMoreEventsMenu(Request $request)
    {   
        $paginationLoad = true;
        $events = Events::select('id','title','slug','description','event_image','list_image','start_datetime','address','days')->orderBy('id', 'DESC')->paginate(9);
        if (request()->ajax()) {
            return response()->json([
                'status' => true,
                'html'   => view('web.events.more-list-menu',compact('events','paginationLoad'))->render(),
            ]);
        }
        return redirect( route('web.home'));
    }
}
