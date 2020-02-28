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
        $events = Event::all()->sortByDesc('id')->take(9);
        // all = 16

        return view('isearch', compact('places', 'events'));
    }

    public function loadData(Request $request){

        $first = intval($request['last_IdLoaded']) - 1;
        $last = intval($request['last_IdLoaded']) - 10;

        // Requesting 14 more entries sorted by id
        $moreEvents = Event::whereBetween('id', [$last , $first])->orderBy('id', 'desc')->take(9)->get();

        $moreEvents_nbr = count($moreEvents);

        return Response()->json( array('moreEvents' => $moreEvents, 'moreEvents_nbr' => $moreEvents_nbr) );
    }

}
