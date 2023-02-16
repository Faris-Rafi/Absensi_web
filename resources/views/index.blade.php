@extends('layouts.main')

@section('section')
    <h1 class="text-3xl font-bold">Welcome, {{ auth()->user()->name }}!</h1>
@endsection
