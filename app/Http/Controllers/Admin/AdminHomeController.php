<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookSession;
use App\Models\CmsPage;
use App\Models\Service;
use App\Models\Product;
use App\Models\Admin;
use App\Models\UserContactUs;
use App\Models\Events;
use App\Models\HomeSlider;
use App\Models\Galleries;
use App\Models\Categories;
use App\Models\Teams;
use App\Models\PoojaMasters;
use App\Models\PanditjiAvailabilities;
use App\Models\PoojaCreations;
use App\Models\CustomerPoojaBookings;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // $service = Service::count(); // Services total count
        // $product = Product::count(); // Products total count
        $subadmin = Admin::count(); // SubAdmins total count
        $user_inquiry = UserContactUs::count();
        $events = Events::count();
        $cmspages = CmsPage::count();
        $home_slider = HomeSlider::count();
        $galleries = Galleries::count();
        $categories = Categories::count();
        $teams = Teams::count();
        $poojaMasters = PoojaMasters::count();
        $panditjiAvailabilities = PanditjiAvailabilities::count();
        $poojaCreations = PoojaCreations::count();
        $customerPoojaBookings = CustomerPoojaBookings::count();

        return view('admin.dashboard', compact('subadmin','user_inquiry','events','cmspages','home_slider','galleries','categories','teams','poojaMasters','panditjiAvailabilities','poojaCreations','customerPoojaBookings'));
    }

    public function storeImage(Request $request)
    {
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            
            $upload = $request->file('upload')->store('upload');
            $url = getImageUrl($upload);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }

        return false;
    }
}
