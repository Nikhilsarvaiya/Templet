<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\Request;

class CmsPageController extends Controller
{
    
    public function cmsPage($slug){

        $cmspage = CmsPage::select('title','id','slug','description')->whereSlug($slug)->firstOrFail();
        // return $cmspage;
        return view('web.cms-pages.cmspage',compact('cmspage'));
    }
}
