@extends('layouts.nav')

@section('content')
<div class="container">
  {{ "This is the event id = " . $event->id }}

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Event: {{ $event->title }}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $event->title }}</td>
                            </tr>
                            <tr>
                                <td>Start</td>
                                <td>{{ $event->start }}</td>
                            </tr>
                            <tr>
                                <td>End</td>
                                <td>{{ $event->end }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('user.events.eventstable') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('user.events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('user.events.destroy', $event->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>


                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Todos
                    <a href="{{ route('user.events.todos.create', $event->id) }}" class="btn btn-primary float-right">Add</a>
                </div>
                <div class="card-body">
                    @if (count($event->todos) == 0)
                    <p>There are no Todos for this event.</p>
                    @else
                    <table class="table">
                        <thead>

                            <th>Title</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($event->todos as $todo)
                            <tr>

                                <th>{{ $todo->title }}</th>
                                <th>{{ $todo->description }}</th>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">

                                    </div>
                                </th>
                                <th>
                                    <a href="{{ route('user.events.todos.edit', ['id' => $event->id, 'tid' => $todo->id]) }}" class="form-control btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('user.events.todos.destroy', ['id' => $event->id, 'tid' => $todo->id]) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </th>
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
