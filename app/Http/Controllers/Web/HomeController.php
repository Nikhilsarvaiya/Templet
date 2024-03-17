<?php

namespace App\Http\Controllers\Web;


use App\Models\HomeSlider;
use App\Models\AboutUs;
use App\Models\Events;
use App\Models\Galleries;
use App\Models\CmsPage;
use App\Models\Teams;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $home_sliders = HomeSlider::orderBy('sequence', 'ASC')->get();

        $aboutus = AboutUs::first();

        $events = Events::with('category')->orderBy('id', 'DESC')->take(4)->get();
        $events_counts = Events::with('category')->orderBy('id', 'DESC')->get();

        $galleries = Galleries::orderBy('id', 'DESC')->take(8)->get();
        $galleries_counts = Galleries::orderBy('id', 'DESC')->get();

        $cmspage = CmsPage::orderBy('id', 'DESC')->get();

        $teams = Teams::select('*')->orderBy('id', 'DESC')->paginate(9);
        $teams->setPath(route('web.teams.load.more.teams'));

        $paginationLoad = false;
        return view('web.home',compact('home_sliders','aboutus','events','events_counts','galleries_counts','galleries','cmspage','teams','paginationLoad'));
    }

    public function loadMoreTeamsMenu(Request $request)
    {   
        $paginationLoad = true;
        $teams = Teams::select('*')->orderBy('id', 'DESC')->paginate(9);
        if (request()->ajax()) {
            return response()->json([
                'status' => true,
                'html'   => view('web.about-us.more-list-menu',compact('teams','paginationLoad'))->render(),
            ]);
        }
        return redirect( route('web.home'));
    }

    public function aboutUs()
    {
        $aboutus = AboutUs::first();

        $teams = Teams::select('*')->orderBy('id', 'DESC')->paginate(8);
        $teams->setPath(route('web.teams.load.more.teams'));

        $paginationLoad = false;
        return view('web.about-us.index',compact('aboutus','teams','paginationLoad'));
    }
}