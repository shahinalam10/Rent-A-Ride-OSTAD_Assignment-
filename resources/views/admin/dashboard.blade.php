@extends('admin.layouts.master')
@section('title','Dashboard | Admin')
@section('content')
<section class="section dashboard">
  <div class="row">
    <!-- Total Cars -->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Total Cars</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-car-front"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $totalCars }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Total Cars -->

    <!-- Available Cars -->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Available Cars</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-check-circle"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $availableCars }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Available Cars -->

    <!-- Total Rentals -->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card customers-card">
        <div class="card-body">
          <h5 class="card-title">Total Rentals</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-file-text"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $totalRentals }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Total Rentals -->

    <!-- Total Earnings -->
    <div class="col-xxl-3 col-md-6">
      <div class="card info-card earnings-card">
        <div class="card-body">
          <h5 class="card-title">Total Earnings</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="ps-3">
              <h6>$ {{ number_format($totalEarnings, 2) }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Total Earnings -->

  </div>
</section>
@endsection
