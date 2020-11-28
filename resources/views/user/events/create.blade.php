@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offest-2">
            <div class="card">
                <div class="card-header">
                    Create a new Event
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
                    <form method="POST" action="{{ route('user.events.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            {{-- <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" /> --}}
                            <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input class="form-control" type="time" value="{{ old('start_time') }}" id="start_time">
                        </div>
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input class="form-control" type="time" value="{{ old('end_time') }}" id="end_time">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
                        </div>
                        <div class="form-group">
                            <label for="commute">Commute</label>
                            <input type="text" class="form-control" id="commute" name="commute" value="{{ old('commute') }}" />
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" />
                        </div>
                        <div class="float-right">
                            <a href="{{ route('user.events.index') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
