@extends('layouts.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect a Solution</span> To all your needs</h1>
            <p class="animated fadeIn mb-4 pb-2">
Welcome to Lagbe Kichu ! your ultimate destination for everything you need! From stylish clothing and modern furniture to dream properties and the latest gadgets, we bring a wide range of quality products to your fingertips.</p>
            <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="{{ asset('img/carousel-1.jpg') }}" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="{{ asset('img/carousel-2.jpg') }}" alt="">
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
                            <option value="1">Clothing</option>
                            <option value="2">Property</option>
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
            <h1 class="mb-3">Categories</h1>
            <p>Explore various items available on our platform.</p>
        </div>
        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="#">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src=" {{ asset('storage/' . $category->img) }}" alt="Icon">
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
                <h1 class="mb-4">Your One-Stop Marketplace for All Things Great</h1>
                <p class="mb-4">Our goal is to offer you a seamless shopping experience, whether you're upgrading your home, refreshing your wardrobe, or making a major investment in real estate. With our
</p>
                <p><i class="fa fa-check text-primary me-3"></i>user friendly platform</p>
                <p><i class="fa fa-check text-primary me-3"></i>secure transactions</p>
                <p><i class="fa fa-check text-primary me-3"></i>Fast delivery</p>
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
                    <p>We make shopping easier and more enjoyable. Discover the convenience of finding everything you need, all in one place!</p>
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
                                        @if($product->image)
                                            <a href=""><img class="img-fluid" src=" {{ asset('storage/' . $product->image) }} " alt="{{ $product->name }}"></a>
                                        @else
                                            <p>Image not found: {{ asset('storage/categories/' . $product->image) }}</p>
                                            <a href=""><img class="img-fluid" src="{{ asset('images/default-product.jpg') }}" alt="Default Image"></a>
                                        @endif
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $category->name }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">${{ number_format($product->price, 2) }}</h5>
                                        <a class="d-block h5 mb-2" href="">{{ $product->name }}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $product->description }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#cartModal{{ $product->id }}">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal for Add to Cart -->
                            <div class="modal fade" id="cartModal{{ $product->id }}" tabindex="-1" aria-labelledby="cartModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cartModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to add <strong>{{ $product->name }}</strong> to your cart for <strong>${{ number_format($product->price, 2) }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Yes, Add to Cart</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ route('list') }}">Browse More Item</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Property List End -->

<!-- Property List End -->




<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
            <p>We Are delivered products in time and they were well maintained</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-1.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Max Larson</h5>
                        <small>"I am very satisfied with Lagbe Kichu ."</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-2.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Nafisa Afra</h5>
                        <small>"The products are delivered on time and the quality is immaculate!"</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-3.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Lara Arson</h5>
                        <small>"I will be recommending this site to my closest people and am looking forward to order more"</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-4.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Sadman Sakib</h5>
                        <small>"Hoping they would widen their product range but I am happy with their current services"</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->




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
