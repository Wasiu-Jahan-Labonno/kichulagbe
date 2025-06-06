@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                    <p>we make shopping easier and more enjoyable. Discover the convenience of finding everything you need, all in one place!
</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <!-- Loop through categories to dynamically generate tabs -->
                    @foreach($categories as $category)
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-{{ $category->slug }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tab-content">
            <!-- Loop through categories again to display products under each tab -->
        @foreach($categories as $category)
    <div id="tab-{{ $category->slug }}" class="tab-pane fade show p-0">
        <h3>{{ $category->name }}</h3>

        <div class="row g-4">
            @foreach($category->products as $product)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <a href="#">
                                <img class="img-fluid"
                                   src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $category->name }}</div>
                        </div>
                        <div class="p-4 pb-0">
                            <h5 class="text-primary mb-3">${{ number_format($product->price, 2) }}</h5>
                            <a class="d-block h5 mb-2" href="#">{{ $product->name }}</a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $product->description ?? 'No description' }}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#cartModal{{ $product->id }}">
                                            Add to Cart
                                        </button>
                                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
        </div>
    </div>
</div>


@endsection
