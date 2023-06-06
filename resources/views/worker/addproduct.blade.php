@extends('layouts.worker')

@section('content')

<div class="pagetitle">
  <h1>Add Product</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('worker.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Inventory</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-12">
      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product Details</h5>
    
            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ route('worker.createProduct') }}" method="POST">
              @csrf

              <div class="col-lg-6">

                <div class="col-md-12">
                  <label for="product_name" class="form-label">Product Name</label>
                  <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name">
                  @error('product_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-12 mt-3">
                  <label for="supplier" class="form-label">Supplier</label>
                  <input type="text" class="form-control @error('supplier') is-invalid @enderror" id="supplier" name="supplier">
                  @error('supplier')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-12 mt-3">
                  <label for="date_received" class="form-label">Date Received</label>
                  <input type="date" class="form-control @error('date_received') is-invalid @enderror" id="date_received" name="date_received">
                  @error('date_received')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-12 mt-3">
                  <label for="discount" class="form-label">Discount (%)</label>
                  <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount">
                  @error('discount')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              </div>

              <div class="col-lg-6">

                <div class="col-md-12">
                  <label for="price" class="form-label">Price (RM)</label>
                  <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                  @error('price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-12 mt-3">
                  <label for="cost" class="form-label">Cost (RM)</label>
                  <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost">
                  @error('cost')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-12 mt-3">
                  <label for="stock" class="form-label">Stock</label>
                  <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">
                  @error('stock')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>

            </form><!-- End Multi Columns Form -->
    
          </div>
        </div>
    
      </div>
    </div>

  </div>
</section>

@endsection

@push('scripts')
  <script>document.getElementById("inventory").classList.remove("collapsed");</script>
@endpush