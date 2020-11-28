@extends('layouts.nav')

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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Date</th>
                            <th>Commute</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr data-id="{{ $event->id }}">
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->start_time }}</td>
                                <td>{{ $event->end_time }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->commute }}</td>
                                <td>{{ $event->type }}</td>
                                <td>
                                    <a href="{{ route('user.events.show', $event->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('admin.books.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.events.destroy', $event->id) }}">
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
