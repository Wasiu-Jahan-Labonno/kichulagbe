@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" class="form-control mb-2" value="{{ $product->name }}" required>

        <select name="category_id" class="form-control mb-2">
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <input type="number" name="price" class="form-control mb-2" value="{{ $product->price }}" required>
        <input type="number" name="stock" class="form-control mb-2" value="{{ $product->stock }}" required>
        <textarea name="description" class="form-control mb-2">{{ $product->description }}</textarea>
        <input type="file" name="image" class="form-control mb-2">

        <button class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
