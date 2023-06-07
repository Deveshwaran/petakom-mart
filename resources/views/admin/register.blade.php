@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Register</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Register</li>
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
        <h5 class="card-title">User Details</h5>

        <!-- Multi Columns Form -->
        <form class="row g-3" action="{{ route('admin.createUser') }}" method="POST">
          @csrf

          <div class="col-lg-6">

            <div class="col-md-12">
              <label for="name" class="form-label">Username</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-md-12 mt-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-md-12 mt-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-md-12 mt-3">
              <label for="role" class="form-label">Select a Role:</label>
              <select id="role" name="role" class="form-control">
                @foreach($roles as $role)
                <option name="role" value="{{ $role->id }}" class="form-control @error('role') is-invalid @enderror">{{ $role->name }}</option>
                @endforeach
              </select>
              @error('role')
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
  <script>document.getElementById("register").classList.remove("collapsed");</script>
@endpush