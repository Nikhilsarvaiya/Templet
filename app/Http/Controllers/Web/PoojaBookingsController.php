<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PoojaCreations;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use DB;
use Carbon\Carbon;

class PoojaBookingsController extends Controller
{
    public function index(Request $request)
    {

        $poojaCreations = PoojaCreations::select('date')->whereMonth('date', Carbon::now()->month)->orderBy('date','desc')->get();

        $poojaCreationsDate_arr = array();
        foreach($poojaCreations as $poojaCreation){
            array_push($poojaCreationsDate_arr,$poojaCreation->date);
        }

        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::MONDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SUNDAY);

        $calender_days = "";
        $dayLabels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

        $calender_days .= '<ul class="days">';
        foreach ($dayLabels as $dayLabel)
        {
            $calender_days .= '<li>' . $dayLabel . '</li>';
        }
        $calender_days .= '</ul><ul class="dates">';

        while($startOfCalendar <= $endOfCalendar)
        {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'fade' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' ' : '';

            // $date_string

            $calender_days .= '
                <li class="'.$extraClass.'">
                    <span class="date">' . $startOfCalendar->format('j') . '</span>';
                    if(in_array($startOfCalendar->format('Y-m-d'), $poojaCreationsDate_arr)){
                        $calender_days .= '
                            <ul class="event_add_new">
                                <li class="booking" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                                <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                                <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                                <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                                <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                                <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                                <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                                <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                                <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                                <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                                <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                                <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                                <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                                <li class="available" data-tooltip="Available For  7:00AM to 7:15AM"></li>
                                <li class="available" data-tooltip="Available For  7:15AM to 7:30AM"></li>
                                <li class="available" data-tooltip="Available For  7:30AM to 7:45AM"></li>
                            </ul>';
                    } else {
                        $calender_days .= '<h2 class="not_slot">Slot not Available </h2>';
                    }
                $calender_days .= '</li>';
            $startOfCalendar->addDay();
        }
        $calender_days .= '</ul>';

        return view('web.pooja-bookings.index',compact('calender_days'));
    }
}
