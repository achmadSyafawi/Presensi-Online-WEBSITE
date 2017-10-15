<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

// load model
use App\HariLibur;

class LiburController extends Controller
{
    public function laporan()
    {
        $api_key = "AIzaSyCZE08CcrIH3NZMMRq4T3C8uoxwm4S4W8I"; // your google api key here
        $country_code = "indonesian__id";
        $url = "https://www.googleapis.com/calendar/v3/calendars/{$country_code}@holiday.calendar.google.com/events?key={$api_key}";
        $data = file_get_contents($url);
        // $decoding = json_decode($data, true); // array index
        // $holidays = $decoding['items'];
        $decoding = json_decode($data); // array object
        $holidays = $decoding->items;
        // kitchen
        $preparing = array();
        $id = 0;
        foreach ($holidays as $key => $item) {
            $start = Carbon::createFromFormat('Y-m-d', $item->start->date);
            $end = Carbon::createFromFormat('Y-m-d', $item->end->date);
            if($start->lt($end)) {
                // multiple dates
                $current = $start;
                while ($start->lt($end)) {
                    $preparing[$id]['summary'] = $item->summary;
                    $preparing[$id]['date'] = $current;
                    $current = $current->addDay();
                    $id++;
                }
            } else {
                // single dates
                $preparing[$id]['summary'] = $item->summary;
                $preparing[$id]['date'] = $start;
                $id++;
            }
        }
        // checking data
        foreach($preparing as $key => $dates)
        {
            HariLibur::firstOrCreate($dates);
        }
        // echo json_encode($preparing);
        return redirect('admin/absensi');
    }
}
