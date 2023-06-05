@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Add Product</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Inventory</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product Details</h5>
    
            <!-- Multi Columns Form -->
            <form class="row g-3">
              <div class="col-md-12">
                <label for="productname" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productname">
              </div>
              <div class="col-md-12">
                <label for="supplier" class="form-label">Supplier</label>
                <input type="text" class="form-control" id="supplier">
              </div>
              <div class="col-md-12">
                <label for="date" class="form-label">Date Received</label>
                <input type="date" class="form-control" id="date">
              </div>
              <div class="col-md-12">
                <label for="price" class="form-label">Price (RM)</label>
                <input type="text" class="form-control" id="price">
              </div>
              <div class="col-md-12">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock">
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