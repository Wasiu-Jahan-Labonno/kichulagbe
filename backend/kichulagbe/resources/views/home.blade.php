@extends('layouts.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Your <span class="text-primary"> One-Stop </span> Marketplace for All Things Great</h1>
            <p class="animated fadeIn mb-4 pb-2">Discover the convenience of finding everything you need, all in one place!</p>
            <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Item Type</option>
                            <option value="1">Property</option>
                            <option value="2">Clothing</option>
                            <option value="3">Furniture</option>
                            <option value="4">Electronics</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Location</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Gazipur</option>
                            <option value="3">Noakhali</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3">Search</button>
            </div>
        </div>
    </div>
</div>

<!-- Search End -->
<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">

        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3 text-center">Categories</h1>
            <p>Explore various categories of items available on our platform.</p>
        </div>
        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="#">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ $category->image ?? 'default-image.jpg' }}" alt="Icon">
                            </div>
                            <h6>{{ $category->name }}</h6>
                            <span>{{ $category->properties_count }} Properties</span> <!-- Replace with the actual property count field -->
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="img/about.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Your Place That Meets All Your Needs</h1>
                <p class="mb-4">With our user-friendly platform, secure transactions, and prompt delivery, we make shopping easier and more enjoyable. Discover the convenience of finding everything you need, all in one place!</p>
                <p><i class="fa fa-check text-primary me-3"></i>User Friendly platform</p>
                <p><i class="fa fa-check text-primary me-3"></i>Secure Transactions</p>
                <p><i class="fa fa-check text-primary me-3"></i>Fast Delivery</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Property List Start -->
<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Item Listing</h1>
                    <p>Discover quality, style, and value all in one place. Whether it’s fashion, furniture, or property find what you need, when you need it.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    @foreach($categories as $category)
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tab-content">
            @foreach($categories as $category)
                <div id="tab-{{ $category->id }}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                    <h3>{{ $category->name }}</h3>
                    <div class="row g-4">
                        @foreach($category->products as $product)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $category->name }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">${{ number_format($product->price, 2) }}</h5>
                                        <a class="d-block h5 mb-2" href="">{{ $product->name }}</a> <!-- This is where the product name is displayed -->
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $product->description }}</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $product->stock }} Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ route('list') }}">Browse More Items</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Property List End -->

<!-- Property List End -->








<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
