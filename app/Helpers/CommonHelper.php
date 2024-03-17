<?php

use App\Models\CmsPage;
use Illuminate\Support\Str;
// use App\Models\FooterSetting;
use App\Models\ContactUs;
use App\Models\AboutUs;
use App\Models\ProgramsDetails;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

function dummyImage($text = 'Image',$size = '500x500')
{
    return asset('assets/admin/images/200x200.png');
}

function makeResponse(
    $status = false,
    $messages = [
        'Something went wrong please try again.'
    ],
    $data = null,
    $statusCode = 200
){
    $data = (is_array($data) and count($data) == 0) ? null : $data;
    return response()->json([
        "status" => $status,
        "messages" => is_array($messages) ? $messages : ($messages == "" ? [] : [$messages]),
        "data" => $data
    ],$statusCode);
}

function makePaginationResponse($data)
{
    return [
        "total"        => $data->total(),
        "current_page" => $data->currentPage(),
        "per_page"     => $data->perPage(),
        "last_page"    => $data->lastPage(),
        "items"        => $data->items(),
    ];
}

function makeId($number = 0,$pre = 'SC')
{
    $length = 5;
    return $pre . str_pad($number, $length, "0", STR_PAD_LEFT);
}

function showDate($date,$format = 'd M, Y'){
    return $date ? \Carbon\Carbon::parse($date)->format($format) : '-';
}

function getImageUrl($name,$text = "Radhe Krishna Temple",$size = "500x500")
{
    if(is_file(storage_path("app/{$name}"))){
        return asset("storage/{$name}");
    }
    return dummyImage($text,$size);
}

function strongPasswordValidate(){
    return Password::min(8)->mixedCase()->symbols()->numbers();
}

function mimesFileValidation($type = 'image'){
    if($type == 'image'){
        return "mimes:jpg,jpeg,png";
    }elseif($type == 'video'){
        $types = "3g2,3gp,aaf,asf,avchd,avi,drc,flv,m2v,m3u8,m4p,m4v,mkv,mng,mov,mp2,mp4,mpe,mpeg,mpg,mpv,mxf,nsv,ogg,ogv,qt,rm,rmvb,roq,svi,vob,webm,wmv,yu";
        return "mimes:$types";
    }
}

function getMailSubject($subject)
{
    $app = config('app.name');
    return "$subject | $app";
}

function getAgoTime($date,$type = null)
{
    $date = \Carbon\Carbon::parse($date);
    if($type == "year"){
        $diff = $date->diffInYears();
        if($diff <= 1){
            $diff = $date->diffInMonths();
            if($diff <= 1){
                $diff = $date->diffInDays();
                if($diff == 0){
                    $diff = "Today";
                } else {
                    $diff .= " Days";
                }
            } else {
                $diff .= " Months";
            }
        } else {
            $diff .= " Years";
        }
        return $diff;
    }
    return $date->diffForHumans();
}

function removeFile($name)
{
    try {
        if($name){
            if(Storage::exists($name)){
                Storage::delete($name);
            }
            $name = str_replace(asset('storage/'),'',$name);
            if(Storage::exists($name)){
                Storage::delete($name);
            }
        }
    } catch (\Exception $exception){
    }
}

function getFileType($file)
{
    $type = strtolower($file->getClientMimeType());
    if (Str::contains($type, "video")) {
        $type = 'video';
    } else if (Str::contains($type, "image")) {
        $type = 'image';
    }
    return $type;
}

function accountType($index)
{
    $type = [
        'open_account' => 'Open account',
        'aps'          => 'APS',
        'mld_life'     => 'MLD',
        'partners'     => 'Become a partners',
        'remisier'     => 'Become a Remisier',
    ];
    $type = $index ? $type[$index] : null;
    return $type;
}

function csrPolicy()
{
    $csr_policy = CsrPolicy::first();
    return $csr_policy;
}

function productMenus()
{
    if (!Cache::has( 'product_menu' ) ) {
        $obj = ProductMenu::select('id','title','slug','parent_id','is_parent','redirect_url')->whereNull('parent_id')->with('submenu')->get();
        Cache::put( 'product_menu', $obj, now()->addYears(1) ); // 1 Year
    }
    $obj = Cache::get( 'product_menu');
    return $obj ?? [];
}

function servicesMenus()
{
    if (!Cache::has('service_menu') ) {
        $obj = ServiceMenu::select('id','title','slug','parent_id','is_parent','redirect_url')->whereNull('parent_id')->with('submenu')->get();
        Cache::put( 'service_menu', $obj, now()->addYears(1) ); // 1 Year
    }
    $obj = Cache::get('service_menu');
    return $obj ?? [];
}

function footerData()
{
    if (!Cache::has( 'footer_data' ) ) {
        $obj = FooterSetting::first();
        Cache::put( 'footer_data', $obj, now()->addYears(1) ); // 1 Year
    }
    $obj = Cache::get( 'footer_data');
    return $obj ?? [];
}

function AboutUsData()
{
    // if (!Cache::has( 'aboutus_data' ) ) {
        $obj = AboutUs::first();
        Cache::put( 'aboutus_data', $obj, now()->addYears(1) ); // 1 Year
    // }
    $obj = Cache::get( 'aboutus_data');
    return $obj ?? [];
}

function ContactUsData()
{
    // if (!Cache::has( 'contactus_data' ) ) {
        $obj = ContactUs::first();
        Cache::put( 'contactus_data', $obj, now()->addYears(1) ); // 1 Year
    // }
    $obj = Cache::get( 'contactus_data');
    return $obj ?? [];
}

function ProgramsData()
{
    // if (!Cache::has( 'programs_data' ) ) {
        $obj = ProgramsDetails::first();
        Cache::put( 'programs_data', $obj, now()->addYears(1) ); // 1 Year
    // }
    $obj = Cache::get( 'programs_data');
    return $obj ?? [];
}


function accordWebServices( $URL, $params = [], $method = 'post', $full_url = null)
{
    try {
        $apiURL = ( $full_url ) ? $full_url.$URL  : env('WEB_SERVICE_BASE_URL').$URL;
        // Headers
        $headers = [ ];
    
        $response = ( $method == 'get' ) ? Http::withHeaders($headers)->get($apiURL, $params) : Http::withHeaders($headers)->post($apiURL, $params);
        $statusCode   = $response->status();
        return $responseBody = json_decode($response->getBody(), true);
        
    } catch (\Throwable $th) {
        \Log::error( 'accordWebServices'.request()->path()."\n". $th->getMessage());
    }
    return [];
}

function bofficeAPI( $URL, $params = [], $method = 'post', $full_url = null)
{
    try {
        $apiURL = ( $full_url ) ? $full_url.$URL  : env('WEB_SERVICE_BASE_URL').$URL;
        // Headers
        $headers = [ ];
    
        $response = ( $method == 'get' ) ? Http::withHeaders($headers)->get($apiURL, $params) : Http::withHeaders($headers)->post($apiURL, $params);
        $statusCode   = $response->status();
        return $responseBody = json_decode($response->getBody(), true);
        
    } catch (\Throwable $th) {
        \Log::error( 'accordWebServices'.request()->path()."\n". $th->getMessage());
    }
    return [];
}

function marketInfo()
{
    $params = [
        'EXCHANGE' => 'nse',
        'token'    => env('WEB_SERVICE_TOKEN'),
    ];
    $res = accordWebServices( 'COMPANY/GETCOMPANYTICKER', $params, 'get' );
    return $res;
}

function cmsPages(){
    if (!Cache::has('cmspages') ) {
        $obj = CmsPage::select('id','title','slug','description')->get();

        Cache::put('cmspages', $obj, now()->addYears(1) ); // 1 Year
    }
    $obj = Cache::get('cmspages');
    return $obj ?? [];
}

function researchAdvice()
{
    $research_advice = ResearchAdvice::first();
    return $research_advice;
}

function investor_relations_data( $id )
{   
    $obj = null;
    if ($id) {
        $obj = InvestorRelations::select('id','title','slug','file','investor_relations_menu_id','description')->where('investor_relations_menu_id',$id)->get();
    }
    return $obj ?? [];
}

function amountShow($value)
{   
    return ( is_numeric($value) ) ? round($value,2) : 'N/A';
}

function numDifferentiation($amount) {
    // if($amount >= 1000 ){
    //     $val = '( in K )';
    // }
    $val = '';
    if($amount >= 100000){
        $val = '( in Lac )';
    }
    if($amount >= 10000000){
        $val = '( in Cr )';
    }
    return $val;
}

function highLowPercentage($low = 0, $high = 0 ) {

    if ( $low == 0 &&  $high == 0) {
        return 0;
    }
    $ans = ( $low * 100 ) / $high;
    return round( $ans ) ?? 0;
}

function getPageHeaderTitle($page_name = null)
{
    if (!Cache::has('pageHeaderTitle') ) {
        $obj = PageHeaderTitle::select('page_name','title')->get();
        Cache::put('pageHeaderTitle', $obj, now()->addYears(1) ); // 1 Year
    }
    $obj   = Cache::get('pageHeaderTitle');
    $title = $obj->where('page_name',$page_name)->first();
    
    return $title->title ?? '';

}

function researchOption($index = null)
{
    $type = [
        'daily'      => 'Daily',
        'weekly'     => 'Weekly',
        'monthly'    => 'Monthly',
        'occasional' => 'Occasional',
    ];

    if ( $index ) {
        if (isset( $type[$index] )) {
            return  $type[$index];
        }
        return null;
    }
    return $type;
}

function researchOptionOnlyThree($index = null)
{
    $type = [
        'daily'      => 'Daily',
        'weekly'     => 'Weekly',
        'monthly'    => 'Monthly',
    ];

    if ( $index ) {
        if (isset( $type[$index] )) {
            return  $type[$index];
        }
        return null;
    }
    return $type;
}