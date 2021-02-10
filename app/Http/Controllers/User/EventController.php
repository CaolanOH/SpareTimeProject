<?php
# @Date:   2020-11-30T11:38:44+00:00
# @Last modified time: 2020-11-30T12:44:16+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:user');
     }

    public function index()
    {
        $events = Event::all();
        return view('user.home', [
          'events' => $events
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventsTable()
    {
      $events = Event::all();
      return view('user.events.eventstable', [
        'events' => $events
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'title'=> 'required|max:191',
            'start_date' => 'required|date_format:Y-m-d',
            'start_time'=>'required|date_format:H:i',
            'end_time'=>'required|date_format:H:i',
          ]);

          $event = new Event();

          $start = $request->input('start_date') . 'T' . $request->input('start_time');
          $end = $request->input('start_date') . 'T' . $request->input('end_time');

          $event->title = $request->input('title');
          $event->start = $start;
          $event->end = $end;

          $event->save();
          return redirect()->route('user.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $event = Event::findOrfail($id);

      return view('user.events.show',[
        'event'=>$event,

      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::findOrfail($id);
      return view('user.events.edit',[
        'event' => $event
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=> 'required|max:191',
        'start_date' => 'required|date_format:Y-m-d',
        'start_time'=>'required|date_format:H:i',
        'end_time'=>'required|date_format:H:i',
      ]);

      $event = Event::findOrFail($id);

      $start = $request->input('start_date') . 'T' . $request->input('start_time');
      $end = $request->input('start_date') . 'T' . $request->input('end_time');

      $event->title = $request->input('title');
      $event->start = $start;
      $event->end = $end;

      $event->save();
      return redirect()->route('user.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::findOrFail($id);
      $event->delete();
      return redirect()->route('user.events.eventstable');
    }
}
