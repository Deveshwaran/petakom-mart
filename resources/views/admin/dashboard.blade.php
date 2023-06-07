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

    <!-- Full side columns -->
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
                  <h6>{{ $totalProducts }} products</h6>
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
                  <h6>{{ $outOfStock }} products</h6>
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
                  <h6>RM {{ $total_sales }}</h6>
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
                    <th scope="col">Product</th>
                    <th scope="col">Cost (RM)</th>
                    <th scope="col">Price (RM)</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($products as $product)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $product->supplier }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->cost }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->stock }}</td>
                      <td>
                        @if($product->stock > 20)
                          <span class="badge bg-success">High</span>
                        @elseif($product->stock > 0 && $product->stock <= 20)
                          <span class="badge bg-warning">Low</span>
                        @else
                          <span class="badge bg-danger">Out of Stock</span>
                        @endif
                      </td>
                      <td>
                    </tr>
                  @endforeach

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