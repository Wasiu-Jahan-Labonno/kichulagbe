@extends('layouts.app')

@section('content')
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Product Name">
    <textarea name="description"></textarea>
    <input type="number" name="price">
    <input type="number" name="stock">
    <select name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
    <input type="file" name="image">
    <button type="submit">Add Product</button>
</form>


@endsection