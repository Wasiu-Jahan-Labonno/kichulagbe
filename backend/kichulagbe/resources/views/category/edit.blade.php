@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Category</h1>

    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" 
                   value="{{ old('slug', $category->slug) }}">
            @error('slug')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="img">Category Image (Optional)</label>
            <input type="file" class="form-control" id="img" name="img">
            @if($category->img)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $category->img) }}" alt="Category Image" width="100">
                </div>
            @endif
            @error('img')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Category</button>
    </form>

    <a href="{{ route('category.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
</div>
@endsection
