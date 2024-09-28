@extends('frontend.master')
@section('title','Contact Us | Rent-A-Ride')
@section('content')
<main class="main">
    <!-- Contact Section -->
    <section id="contact" class="contact section" style="background-color: #f8f9fa;">
        <div class="section-title text-center mb-5">
            <h2 style="font-weight: 600; color: #333;">Get In Touch</h2>
            <p style="color: #555;">We’d love to hear from you. Please fill out the form below!</p>
        </div>
        <div class="container" data-aos="fade">

            <div class="container border border-danger p-4 rounded" style="background-color: #ffffff;">
                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4 col-md-6">
                        <div class="info">
                            <div class="info-item d-flex mb-3">
                                <i class="bi bi-geo-alt flex-shrink-0" style="font-size: 1.5rem; color: #f74e00;"></i>
                                <div class="ms-3">
                                    <h4>Location:</h4>
                                    <p>2/A, M.A Rab Sharak, Dhanmondi, Dhaka</p>
                                </div>
                            </div><!-- End Info Item --><br>

                            <div class="info-item d-flex mb-3">
                                <i class="bi bi-envelope flex-shrink-0" style="font-size: 1.5rem; color: #f74e00;"></i>
                                <div class="ms-3">
                                    <h4>Email:</h4>
                                    <p>Rent.Ride@gmail.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex mb-3">
                                <i class="bi bi-phone flex-shrink-0" style="font-size: 1.5rem; color: #f74e00;"></i>
                                <div class="ms-3">
                                    <h4>Call:</h4>
                                    <p>+123456789101</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control" name="message" placeholder="Message" required="" style="height: 250px;"></textarea>
                            </div>
                           
                            <div class="text-center"><button type="submit" class="btn btn-primary" style="background-color: #f74e00; border: none;">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>
            </div>
            
        </div>

    </section><!-- /Contact Section -->

</main>
@endsection
