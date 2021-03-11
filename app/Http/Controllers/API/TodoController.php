<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;
use Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $todos = Todo::where('event_id', $id)->get();
      return response()->json([
        'status'=>'success',
        'data'=>$todos
      ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
      $rules =[
        'title' => 'required|max:191',
        'description' => 'required|max:250'
      ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $todo = new Todo();

        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->user_id = Auth::id();
        $todo->event_id = $event_id;
        $todo->status = 'ongoing';
        $todo->save();

        return response()->json([
          'status' => 'success',
          'data' => $todo
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eid, $tid)
    {



      $rules =[
        'title' => 'required|max:191',
        'description' => 'required|max:250',
        'status' => 'required|max:191'
      ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $todo = Todo::find($tid);

        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->user_id = Auth::id();
        $todo->event_id = $eid;
        $todo->status = $request->input('status');
        $todo->save();

        return response()->json([
          'status' => 'success',
          'data' => $todo
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
      $todo = Todo::find($id);

      if($todo === null){
        $statusMsg = 'Todo not found';
        $statusCode = 404;
      }
      else{
        $todo->delete();
        $statusMsg = 'Success';
        $statusCode = 200;
      }
      return response()->json([
        'status'=>$statusMsg,
        'data'=>null
      ],$statusCode);
    }
}
