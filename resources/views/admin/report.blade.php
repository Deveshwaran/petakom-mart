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

<!-- Left side columns -->
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

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reports <span>| This Week</span></h5>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                                name: 'Cost',
                                                data: {!! json_encode($cost) !!},
                                            }, {
                                                name: 'Sales',
                                                data: {!! json_encode($sales) !!},
                                            }, {
                                                name: 'Profit',
                                                data: {!! json_encode($profit) !!}
                                            }
                                        ],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'date',
                                            categories: {!! json_encode($datesFormatted) !!}
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'd/m/y'
                                            },
                                        }
                                    }).render();
                                });
                            </script>


                        </div>

                    </div>
                </div><!-- End Reports -->

            </div>
        </div><!-- End Recent Sales -->

    </div>
</div>

</div>
</section>

@endsection

@push('scripts')
  <script>document.getElementById("report").classList.remove("collapsed");</script>
@endpush