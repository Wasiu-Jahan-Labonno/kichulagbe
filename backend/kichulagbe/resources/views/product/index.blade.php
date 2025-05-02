@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Add Product</a>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="wasiu jahan border rounded shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <a href="#">
                            @if ($product->image)
                                <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img class="img-fluid" src="{{ asset('img/no-image.jpg') }}" alt="No Image">
                            @endif
                        </a>
                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-3 py-1 px-2">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </div>
                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-3 pt-1 px-2">
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </div>
                    </div>
                    <div class="p-3 pb-0">
                        <h5 class="text-primary mb-2">${{ $product->price }}</h5>
                        <a class="d-block h5 mb-1 text-dark" href="#">{{ $product->name }}</a>
                        <p><i class="fa fa-box text-primary me-2"></i>Stock: {{ $product->stock }}</p>
                    </div>
                    <div class="d-flex border-top">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm flex-fill border-end rounded-0">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline w-100">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm flex-fill rounded-0" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No products found.</p>
        @endforelse
    </div>
</div>
@endsection
