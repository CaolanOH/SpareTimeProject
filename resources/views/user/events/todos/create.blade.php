@extends('layouts.nav')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add New Todo
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
            <form class="" action="{{route('user.events.todos.store', $event_id)}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="start_date" name="description" value="{{old('description')}}"></textarea>
              </div>

              <div class="float-right">
                <a href="{{ route('user.events.eventstable') }}" class="btn btn-default">Cancel</a>
                <button type="submit"class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
