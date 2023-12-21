@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('issues.store') }}">
        @csrf
        {{-- Form fields for issue creation here --}}
        <button type="submit">Add Issue</button>
    </form>
@endsection