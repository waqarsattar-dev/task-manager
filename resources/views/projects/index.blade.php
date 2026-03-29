@extends('layouts.app')

@section('content')

<h2>Projects</h2>

<a href="{{ route('projects.create') }}"
    class="btn btn-primary mb-3">
    Create Project
</a>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<table class="table">

    <thead>
        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Team</th>

        </tr>
    </thead>

    <tbody>

        @foreach($projects as $project)

        <tr>

            <td>{{ $project->id }}</td>

            <td>{{ $project->name }}</td>

            <td>{{ $project->team->name }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection