@extends('layouts.worker')

@section('content')

<div class="pagetitle">
  <h1>Inventory</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('worker.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Inventory</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <div class="col-lg-2 mb-3">
        <a class="btn btn-success" href="{{ route('worker.addProduct') }}">
          Add Product
        </a>
    </div>

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
                    <th scope="col">Action</th>
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
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addStockModal{{$product->id}}"><i class="bx bx-plus"></i></button>

                        <div class="modal fade" id="addStockModal{{$product->id}}" tabindex="-1">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Add Stock</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="{{ route('worker.addStock', $product->id) }}">
                                @csrf
                                <div class="modal-body">
                                  <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Enter stock amount">
                                  @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-success">Add</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div><!-- End Basic Modal-->

                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#minusStockModal{{$product->id}}"><i class="bx bx-minus"></i></button>

                        <div class="modal fade" id="minusStockModal{{$product->id}}" tabindex="-1">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Minus Stock</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="{{ route('worker.minusStock', $product->id) }}">
                                @csrf
                                <div class="modal-body">
                                  <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Enter stock amount">
                                  @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-warning">Minus</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div><!-- End Basic Modal-->
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