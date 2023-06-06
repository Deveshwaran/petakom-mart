@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Promotion</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
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
                    <th scope="col">Product</th>
                    <th scope="col">Cost (RM)</th>
                    <th scope="col">Price (RM)</th>
                    <th scope="col">Discount (%)</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($products as $product)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->cost }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->discount }}</td>
                      <td>{{ $product->stock }}</td>
                      <td>
                        @if($product->discount > 0)
                          <span class="badge bg-success">Ongoing</span>
                        @else
                          <span class="badge bg-secondary">None</span>
                        @endif
                      </td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#setDiscountModal{{ $product->id }}"><i class="bi bi-megaphone"></i></button>

                        <div class="modal fade" id="setDiscountModal{{ $product->id }}" tabindex="-1">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Set Discount</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="{{ route('admin.setDiscount', $product->id) }}">
                                @csrf
                                <div class="modal-body">
                                  <input type="text" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" placeholder="Enter discount amount">
                                  @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-success">Save</button>
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
  <script>document.getElementById("promotion").classList.remove("collapsed");</script>
@endpush