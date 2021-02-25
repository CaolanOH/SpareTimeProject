@extends('layouts.nav')
@section('content')
  {{ "This is the event id = " . $event_id }}
  {{ "This is the todo object = " . $todo }}
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit Todo
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form class="" action="{{route('user.events.todos.update', [$event_id, $todo])}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $todo->title) }}">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="start_date" name="description" value="{{old('description', $todo->description)}}"></textarea>
              </div>

              <div class="float-right">
                <a href="{{ route('user.events.show', $event_id) }}" class="btn btn-default">Cancel</a>
                <button type="submit"class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
