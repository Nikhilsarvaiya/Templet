<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use DB;
use Carbon\Carbon;

class ProgramsController extends Controller
{
    public function index(Request $request)
    {
        $paginationLoad = false;

        $date = $request->date;

        $programs = Programs::select('id','title','date','month')
            // ->where('month',Carbon::now()->subMonth(1)->format('Y-m'))
            ->where(function($query) use ($date){
                if($date != null){
                    $query->where('month',Carbon::create($date)->format('Y-m'));
                }
                else{
                    $query->where('month',Carbon::now()->format('Y-m'));
                }
            })
            ->orderBy('id', 'DESC')->get();
        
        // $programs->setPath(route('web.programs.load.more.programs'));

        return view('web.programs.index',compact('programs','paginationLoad','date'));
    }

    public function filter(Request $request)
    {
        $paginationLoad = false;
        $date = $request->date;

        $programs = Programs::select('id','title','date','month')
            ->where(function($query) use ($date){
                if($date != null){
                    $query->where('month',Carbon::create($date)->format('Y-m'));
                }
                else{
                    $query->where('month',Carbon::now()->format('Y-m'));
                }
            })
            ->orderBy('id', 'DESC')->get();

            $pre_date = $date ? Carbon::create($date)->subMonth(1)->format('Y-m') : Carbon::now()->subMonth(1)->format('Y-m');
            $next_date = $date ? Carbon::create($date)->addMonth(1)->format('Y-m') :Carbon::now()->addMonth(1)->format('Y-m');
            $display_date = $date ? Carbon::create($date)->format('M Y') : Carbon::now()->format('M Y');

            $data = "<div class='row text-center d-block date-filter-lr'>
                        <a href='javascript:;' data-date='$pre_date' class='pre-date'><</a>$display_date<a href='javascript:;' data-date='$next_date' class='next-date'>></a>
                    </div>";
            if ($programs->isEmpty()){
                $data.="<div class='row'><div class='col-md-12 text-center'><p>Data Not Found.</p></div></div>";
            }
            else{
                $data.="<div class='row'>";
                foreach ($programs as $key => $program){
                    $data.="
                        <div class='col-md-3 programs_list_main'>
                            <a href='#'>
                                <div class='programs_list'>
                                    <div class='programs_list_icon'>
                                        <i class='i_ctm_font flaticon-kalasha'></i>
                                    </div>
                                    <div class='programs_list_info'>
                                        <h4>$program->date</h4>
                                        <p>$program->title</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ";
                }
                $data.="</div>";
            }

        return Response::json( $data );
    }

    public function loadMoreProgramsMenu(Request $request)
    {   
        $paginationLoad = true;
        $programs = Programs::select('id','title','date','month')->orderBy('id', 'DESC')->paginate(2);
        if (request()->ajax()) {
            return response()->json([
                'status' => true,
                'html'   => view('web.programs.more-list-menu',compact('programs','paginationLoad'))->render(),
            ]);
        }
        return redirect( route('web.home'));
    }
}
