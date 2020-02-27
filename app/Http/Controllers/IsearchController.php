<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 

use App\Place;
use App\Event;

class IsearchController extends Controller
{
    public function index(){
        $places = Place::all();
        $events = Event::orderBy('event_startdate', 'desc')->paginate(9);
        // all = 16

        return view('isearch', compact('places', 'events'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $events = Event::orderBy('event_startdate', 'desc')->paginate(9);
            return view('customPartials\eventsPartial', compact('events'));
        }
    }

}
