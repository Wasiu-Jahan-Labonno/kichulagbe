@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>

        <select name="category_id" class="form-control mb-2">
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
        <input type="number" name="stock" class="form-control mb-2" placeholder="Stock" required>
        <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
        <input type="file" name="image" class="form-control mb-2">

        <button class="btn btn-success">Create Product</button>
    </form>
</div>
@endsection
