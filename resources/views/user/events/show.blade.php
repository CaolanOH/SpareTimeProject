@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Evenrt: {{ $event->title }}
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
        </div>
    </div>
</div>

@endsection
