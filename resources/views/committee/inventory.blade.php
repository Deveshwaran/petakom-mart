@extends('layouts.committee')

@section('content')

<div class="pagetitle">
  <h1>Inventory</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('committee.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Inventory</li>
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
                      <td>{{ $product->date_received->format('d/m/Y') }}</td>
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
  <script>document.getElementById("inventory").classList.remove("collapsed");</script>
@endpush