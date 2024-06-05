@extends('layouts.app')

@section('title', 'Welcome page')

@section('content')
    <h1>Welcome page</h1>


    <a href="{{ route('todos.create') }}">Create Todo</a>


@endsection
