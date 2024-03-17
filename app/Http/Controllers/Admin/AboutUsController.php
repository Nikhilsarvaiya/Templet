<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\PageHeaderTitle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AboutUsController extends Controller
{

    public function add(AboutUs $aboutus){
        $aboutus = AboutUs::first();
        return view('admin.about-us.add',compact('aboutus'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'aboutus_title' => "required",
            'aboutus_description' => "required",
            'aboutus_image' => "image|mimes:jpeg,png,jpg|dimensions:min_width=550,min_height=614",
            'programs_title' => "required",
            'programs_description1' => "required",
            'programs_description2' => "required",
            'programs_description3' => "required",
            'ourmission_title' => "required",
            'ourmission_description' => "required",
            'history_title' => "required",
            'history_description1' => "required",
            'history_description2' => "required",
            'history_description3' => "required",
            'history_image' => "image|mimes:jpeg,png,jpg|dimensions:min_width=554,min_height=346",
            'whoweare_title' => "required",
            // 'whoweare_description' => "required",
            'whatarewe_title' => "required",
            // 'whatarewe_description' => "required",
            'objectives_title' => "required",
            'objectives_description1' => "required",
            'objectives_description2' => "required",
            'objectives_description3' => "required",
        ],[
           'whoweare_title.required'=>'this title field is required',
        //    'whoweare_description.required'=>'this field is required',
           'whatarewe_title.required'=>'this title field is required',
        //    'whatarewe_description.required'=>'this field is required',
        ]);

        try {
            $validate = $request->only( 
                            'aboutus_title',
                            'aboutus_description',
                            'aboutus_image',
                            'programs_title',
                            'programs_description1',
                            'programs_description2',
                            'programs_description3',
                            'ourmission_title',
                            'ourmission_description',
                            'history_title',
                            'history_description1',
                            'history_description2',
                            'history_description3',
                            'history_image',
                            'whoweare_title',
                            'whoweare_description',
                            'whatarewe_title',
                            'whatarewe_description',
                            'objectives_title',
                            'objectives_description1',
                            'objectives_description2',
                            'objectives_description3'
                            );

            if($request->hasFile('aboutus_image')){
                $validate['aboutus_image'] = $request->file('aboutus_image')->store('aboutus');
            }
            if($request->hasFile('history_image')){
                $validate['history_image'] = $request->file('history_image')->store('aboutus');
            }

            $aboutusObj = ( $request->edit_id ) ? AboutUs::where('id',$request->edit_id)->first()  : new AboutUs;
            $aboutusObj->fill( $validate );
            $aboutusObj->save();
            
            return redirect()->route('admin.about.us.add')->with('success', 'Save Successfully');
        } catch (\Throwable $th) {
            \Log::error(request()->path()."\n". json_encode( $th ));
            return back()->with('error', 'Oops! something went wrong, Please try again later');
        }

    }
}
