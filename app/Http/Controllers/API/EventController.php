<?php
# @Date:   2021-02-21T15:24:02+00:00
# @Last modified time: 2021-02-25T18:52:34+00:00




namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->load('todos');
        return response()->json([
          'status'=>'success',
          'data'=>$events
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'title'=> 'required|max:191',
          'start_date' => 'required|date_format:Y-m-d',
          'start_time'=>'required|date_format:H:i',
          'end_time'=>'required|date_format:H:i'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
              return response()->json($validator->errors(), 422);
        }
        $event = new Event();

        $start = $request->input('start_date') . 'T' . $request->input('start_time');
        $end = $request->input('start_date') . 'T' . $request->input('end_time');

        $event->title = $request->input('title');
        $event->start = $start;
        $event->end = $end;

        $event->save();

        return response()->json([
          'status' => 'success',
          'data' => $event->load('todos')
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        if($event === null){
          $statusMsg = 'Event not found';
          $statusCode = 404;
        }
        else{
          $event->load('todos');
          $statusMsg = 'Success';
          $statusCode = 200;
        }
        return response()->json([
          'status'=>$statusMsg,
          'data'=>$event
        ],$statusCode);
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
        $event = Event::find($id);

        if($event === null) {
          return response()->json([
            'status' => 'Book not found!',
            'data' => null
          ],404);
        }
          $rules = [
            'title'=> 'required|max:191',
            'start_date' => 'required|date_format:Y-m-d',
            'start_time'=>'required|date_format:H:i',
            'end_time'=>'required|date_format:H:i',
          ];
          $validator = Validator::make($request->all(), $rules);

          $start = $request->input('start_date') . 'T' . $request->input('start_time');
          $end = $request->input('start_date') . 'T' . $request->input('end_time');

          $event->title = $request->input('title');
          $event->start = $start;
          $event->end = $end;

          $event->save();

          return response()->json([
            'status'=>'success',
            'data'=>$event
          ], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if($event === null){
          $statusMsg = 'Event not found';
          $statusCode = 404;
        }
        else{
          $event->delete();
          $statusMsg = 'Success';
          $statusCode = 200;
        }
        return response()->json([
          'status'=>$statusMsg,
          'data'=>null
        ],$statusCode);

    }
}
