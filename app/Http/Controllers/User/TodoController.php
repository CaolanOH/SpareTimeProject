<?php
# @Date:   2021-02-03T13:45:56+00:00
# @Last modified time: 2021-02-03T14:57:34+00:00





namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Todo;
use Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:user');
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
         $request->validate([
           'title' => 'required|max:191',
           'description' => 'required|max:250',
         ]);
         //$eid = Event::findOrFail($id);
         $todo = new Todo();

         $todo->title = $request->input('title');
         $todo->description = $request->input('description');
         $todo->user_id = Auth::id();
         $todo->event_id = $event_id;
         $todo->save();
         return redirect()->route('user.events.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('user.todos.show',[
          'todo'->$todo
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
      $todo = Todo::findOrFail($id);
      return view('user.todos.edit',[
        'todo'->$todo
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
        'title' => 'required|max:191',
        'description' => 'required|max:250',
      ]);



      $todo = Todo::findOFail($id);

      $todo->title = $request->input('title');
      $todo->description = $request->input('description');
      $todo->user_id = $this->Auth::user('id');
      $todo->event = $event_id;
      $todo->save();
      return redirect()->route('user.events.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $review = Todo::findOrFail($id, $rid);
      $review->delete();
      return redirect()->route('user.todos.show', $id);
    }
}
