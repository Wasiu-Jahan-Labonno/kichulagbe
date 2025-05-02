@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category List</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Create New Category</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    @if($category->img)
                        <img src="{{ asset('storage/' . $category->img) }}" alt="Category Image" style="width: 50px; height: auto;">
                    @else
                        <span>No image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
