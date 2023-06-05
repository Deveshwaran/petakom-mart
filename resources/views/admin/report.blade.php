@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Report</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Report</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">


  </div>
</section>

@endsection

@push('scripts')
  <script>document.getElementById("report").classList.remove("collapsed");</script>
@endpush