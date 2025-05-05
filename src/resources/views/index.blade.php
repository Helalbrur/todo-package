<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todos</h1>
    <a href="{{ route('todo.create') }}" class="btn btn-primary mb-3">Add Todo</a>
    
    @foreach($todos as $todo)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $todo->title }}</h5>
                <p class="card-text">{{ $todo->description }}</p>
                <a href="{{ route('todo.edit', $todo) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('todo.destroy', $todo) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection