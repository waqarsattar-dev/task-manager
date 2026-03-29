@extends('layouts.app')

@section('content')

<h2>Create Task</h2>

<form method="POST"
    action="{{ route('tasks.store') }}">

    @csrf

    <!-- Task Title -->

    <div class="mb-3">

        <label>Task Title</label>

        <input type="text"
            name="title"
            class="form-control"
            required>

    </div>

    <!-- Select Project -->

    <div class="mb-3">

        <label>Select Project</label>

        <select name="project_id"
            class="form-control">

            @foreach($projects as $project)

            <option value="{{ $project->id }}">
                {{ $project->name }}
            </option>

            @endforeach

        </select>

    </div>

    <!-- Assign User -->

    <div class="mb-3">

        <label>Assign To</label>

        <select name="assigned_to"
            class="form-control">

            @foreach($users as $user)

            <option value="{{ $user->id }}">
                {{ $user->name }}
            </option>

            @endforeach

        </select>

    </div>

    <!-- Status -->

    <div class="mb-3">

        <label>Status</label>

        <select name="status"
            class="form-control">

            <option value="pending">Pending</option>

            <option value="in_progress">
                In Progress
            </option>

            <option value="completed">
                Completed
            </option>

        </select>

    </div>

    <button class="btn btn-primary">
        Save Task
    </button>

</form>

@endsection