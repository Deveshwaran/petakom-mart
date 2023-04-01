@extends('layouts.template')

@section('content')

<div class="pagetitle">
  <h1>Promotion</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Promotion</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

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
                    <th scope="col">Discount %</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">#2457</th>
                    <td>Supplier</td>
                    <td>Date Received</td>
                    <td>Brandon Jacob</td>
                    <td>64.00</td>
                    <td>20</td>
                    <td>100</td>
                    <td>
                      <span class="badge bg-success">High</span>
                      <span class="badge bg-warning">Low</span>
                      <span class="badge bg-danger">Out of Stock</span>
                    </td>
                    <td>
                      <button type="button" class="btn btn-success btn-sm"><i class="bi bi-megaphone"></i></button>
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
  <script>document.getElementById("promotion").classList.remove("collapsed");</script>
@endpush