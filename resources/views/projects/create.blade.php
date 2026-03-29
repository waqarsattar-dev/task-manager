@extends('layouts.app')

@section('content')

<h2>Create Project</h2>

<form method="POST"
    action="{{ route('projects.store') }}">

    @csrf

    <!-- Project Name -->

    <div class="mb-3">

        <label>Project Name</label>

        <input type="text"
            name="name"
            class="form-control"
            required>

    </div>

    <!-- Description -->

    <div class="mb-3">

        <label>Description</label>

        <textarea name="description"
            class="form-control"></textarea>

    </div>

    <!-- Team Dropdown -->

    <div class="mb-3">

        <label>Select Team</label>

        <select name="team_id"
            class="form-control"
            required>

            @foreach($teams as $team)

            <option value="{{ $team->id }}">
                {{ $team->name }}
            </option>

            @endforeach

        </select>

    </div>

    <button class="btn btn-primary">
        Save Project
    </button>

</form>

@endsection