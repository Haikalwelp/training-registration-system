@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('issues.create') }}" class="btn btn-primary">Add New Issue</a>

        {{-- List all issues here --}}
        @foreach ($issues as $issue)
            <div>{{ $issue->title }}</div>
            {{-- Additional issue details here --}}
        @endforeach
    </div>
@endsection