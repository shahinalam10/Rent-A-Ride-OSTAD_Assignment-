<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register | Ren-A-Ride</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('Admin') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('Admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Admin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('Admin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('Admin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('Admin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('Admin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('Admin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('Admin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('Admin') }}/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-10 col-12 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('Admin') }}/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Ren-A-Ride</span>
                </a>
              </div><!-- End Logo -->

              <div class="card">
                <div class="card-body">
                  <div class="pb-1">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  </div>

                  <form action="{{ route('register') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="row">
                        <div class="col-6"> <label for="name" class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            <div class="invalid-feedback">Please, enter your name!</div></div>
                        <div class="col-6">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">Please enter a valid Email address!</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6"> 
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                            <div class="invalid-feedback">Please enter your phone number!</div></div>
                        <div class="col-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" required>
                            <div class="invalid-feedback">Please enter your address!</div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6"> 
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            <div class="invalid-feedback">Please enter your password!</div></div>
                        <div class="col-6">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                            <div class="invalid-feedback">Please confirm your password!</div>
                        </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0 text-center">Already have an account? <a href="{{route('login')}}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('Admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/quill/quill.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('Admin') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('Admin') }}/assets/js/main.js"></script>

</body>

</html>
