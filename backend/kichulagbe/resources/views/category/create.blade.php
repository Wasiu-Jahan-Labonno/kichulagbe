@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Category</h1>

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug (Optional)</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
            
            @error('slug')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="img">Category Image (Optional)</label>
            <input type="file" class="form-control" id="img" name="img">
            
            @error('img')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Create Category</button>
    </form>

    <a href="{{ route('category.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
</div>
@endsection
