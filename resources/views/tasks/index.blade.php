@extends('layouts.app')

@section('content')

<h2>Tasks</h2>

<a href="{{ route('tasks.create') }}"
    class="btn btn-primary mb-3">
    Create Task
</a>

<table class="table">

    <thead>

        <tr>

            <th>Title</th>
            <th>Project</th>
            <th>Assigned To</th>
            <th>Status</th>

        </tr>

    </thead>

    <tbody>

        @foreach($tasks as $task)

        <tr>

            <td>{{ $task->title }}</td>

            <td>{{ $task->project->name }}</td>

            <td>{{ $task->user->name }}</td>

            <td>{{ $task->status }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection