@extends('layouts.worker')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('worker.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Payment</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-12">
                    <div class="row">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Weekly Product Payment Return</h5>

                                <!-- Multi Columns Form -->
                                <form class="row g-3" action="{{ route('worker.addpayment') }}" method="POST">
                                    @csrf

                                    <div class="row">

                                    <div class="col-lg-6">

                                        <div class="col-md-12 mt-3">
                                            <label for="total_cost" class="form-label">Total Cost: (RM)</label>
                                            <input type="text" class="form-control @error('total_cost') is-invalid @enderror" id="total_cost" name="total_cost">
                                            @error('total_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="date" class="form-label">Date:</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
                                            </div>
                                            @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                    
                                        <div class="col-md-12 mt-3">
                                            <label for="total_sales" class="form-label">Total Sales: (RM)</label>
                                            <input type="text" class="form-control @error('total_sales') is-invalid @enderror" id="total_sales" name="total_sales">
                                            @error('total_sales')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

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

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">All Payments</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total Sales (RM)</th>
                                        <th scope="col">Total Cost (RM)</th>
                                        <th scope="col">Total Profit (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($payments as $payment)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $payment->date->format('d/m/Y') }}</td>
                                        <td>{{ $payment->total_sales}}</td>
                                        <td>{{ $payment->total_cost }}</td>
                                        <td>
                                            @if($payment->total_profit < 0)
                                            <span class="badge bg-danger">{{ $payment->total_profit }}</span>
                                            @else
                                            <span class="badge bg-success">{{ $payment->total_profit }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
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
<script>
    document.getElementById("payment").classList.remove("collapsed");
</script>
@endpush