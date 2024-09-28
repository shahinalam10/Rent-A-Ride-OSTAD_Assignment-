@extends('frontend.master')
@section('title', 'Home Page | Rent-A-Ride')

@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('frontEnd/assets/img/hero-carousel/car1.jpg') }}" alt="">
                <div class="container">
                    <h2>"Explore Your Next Adventure"</h2>
                    <p>"Discover a wide range of rental cars tailored to your travel needs. Experience convenience and comfort on your journeys."</p>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('frontEnd/assets/img/hero-carousel/car2.jpg') }}" alt="">
                <div class="container">
                    <h2>"Affordable Rentals at Your Fingertips"</h2>
                    <p>"Choose from a variety of vehicles at competitive prices. Book your ride today and hit the road with confidence!"</p>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('frontEnd/assets/img/hero-carousel/car3.jpg') }}" alt="">
                <div class="container">
                    <h2>"Drive with Confidence"</h2>
                    <p>"Enjoy a seamless rental experience with our user-friendly platform. Your satisfaction is our priority!"</p>
                </div>
            </div><!-- End Carousel Item -->

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>
    </section><!-- /Hero Section -->


<!-- Services Section -->
<section id="services" class="services section py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Browse Your Car</h2>
        </div>
        <div class="row gy-4">
            @foreach($cars as $car)
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item card shadow border-0" style="overflow: hidden;">
                    <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #f03c02; font-size: 1.25rem; font-weight: bold;">{{ $car->name }}</h5>
                        <p class="card-text" style="font-size: 0.9rem; line-height: 1.5;">
                            <span class="text-muted"><strong>Brand:</strong> {{ $car->brand }}</span><br>
                            <span class="text-muted"><strong>Type:</strong> {{ $car->car_type }}</span><br>
                            <span class="text-muted"><strong>Price:</strong>{{ $car->daily_rent_price }}<i class="fa-solid fa-bangladeshi-taka-sign"></i>/day</span>
                        </p>
                        <div class="text-center">
                            <a href="{{ route('rentals.index', $car->id) }}" class="btn rent-btn px-4" style="background-color: #f03c02; color: white; font-size: 0.9rem; border-radius: 5px;">Rent Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /Services Section -->

</main>
@endsection
