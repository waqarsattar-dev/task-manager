@extends('layouts.app')

@section('content')

<h2>Create Team</h2>

<form method="POST" action="{{ route('teams.store') }}">

    @csrf

    <div class="mb-3">
        <label>Team Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Create Team
    </button>

</form>

@endsection