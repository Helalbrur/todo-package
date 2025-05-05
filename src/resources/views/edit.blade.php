<!-- resources/views/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Todo</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('todo.update', $todo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $todo->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" 
                              class="form-control @error('description') is-invalid @enderror" 
                              rows="3">{{ old('description', $todo->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="completed" id="completed" 
                               class="form-check-input" 
                               @if(old('completed', $todo->completed)) checked @endif>
                        <label class="form-check-label" for="completed">Completed</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('todo.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Todo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection