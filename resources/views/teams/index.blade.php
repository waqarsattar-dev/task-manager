@extends('layouts.app')

@section('content')

<h2>Teams</h2>

<a href="{{ route('teams.create') }}"
   class="btn btn-primary mb-3">
   Create Team
</a>

<table class="table">

<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
</tr>
</thead>

<tbody>

@foreach($teams as $team)

<tr>
    <td>{{ $team->id }}</td>
    <td>{{ $team->name }}</td>
</tr>

@endforeach

</tbody>

</table>

@endsection