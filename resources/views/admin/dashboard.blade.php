@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Products</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>1244 products</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Out of Stock</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-box-seam"></i>
                </div>
                <div class="ps-3">
                  <h6>12 products</h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Sales</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>RM 145.00</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">All Products</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Date Received</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price (RM)</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">#2457</th>
                    <td>Supplier</td>
                    <td>Date Received</td>
                    <td>Brandon Jacob</td>
                    <td>64.00</td>
                    <td>100</td>
                    <td>
                      <span class="badge bg-success">High</span>
                      <span class="badge bg-warning">Low</span>
                      <span class="badge bg-danger">Out of Stock</span>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div>

  </div>
</section>

@endsection

@push('scripts')
  <script>document.getElementById("dashboard").classList.remove("collapsed");</script>
@endpush