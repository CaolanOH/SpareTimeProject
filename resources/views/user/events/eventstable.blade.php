@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                    Events
                    <a href="{{ route('user.events.create') }}" class="btn btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    @if (count($events) === 0)
                    <p>You have no events.</p>
                    @else
                    <table id="table-events" class="table table-hover">
                        <thead>
                            <th>Title</th>

                            <th>Start</th>
                            <th>End</th>

                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr data-id="{{ $event->id }}">
                                <td>{{ $event->title }}</td>

                                <td>{{ $event->start }}</td>
                                <td>{{ $event->end }}</td>



                                <td>
                                    <a href="{{ route('user.events.show', $event->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('user.events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('user.events.destroy', $event->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
