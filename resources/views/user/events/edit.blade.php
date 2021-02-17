@extends('layouts.nav')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Event
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
          <form class="" action="{{route('user.events.update', $event->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label for="title">Event Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}">
            </div>
            <div class="form-group">
              <label for="start_date">Date</label>
              <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
            </div>

            <div class="form-group">
              <label for="start_time">Start Time</label>
              <input type="time" class="form-control" id="start_time" name="start_time" value="{{old('start_time')}}">
            </div>
            <div class="form-group">
              <label for="end_time">End Time</label>
              <input type="time" class="form-control" id="end_time" name="end_time" value="{{old('end_time')}}">
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
