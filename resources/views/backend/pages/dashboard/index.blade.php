@extends('backend.layouts.master')


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">لوحة التحكم</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        {{-- 'users_count','clients_count','service_providers_count',
    'services_count','receive_cash_count','cash_out_count','expense_items_count' --}}

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                عدد المستخدمين</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clients -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                عدد العملاء</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $clients_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Providers -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                عدد مقدمى الخدمات </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $service_providers_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                عدد الخدمات</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $services_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">أستلام نقدية</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="receive_cash_bar"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">صرف نقدية</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="cash_out_bar"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Get the current date
        var currentDate = new Date();

        // Initialize an array to hold the next six months
        var nextSixMonths = [];

        // Loop to generate the labels for the next six months
        for (var i = 0; i < 4; i++) {
            // Get the month and year for the current iteration
            var month = currentDate.getMonth(); // 0 to 11 (January to December)
            var year = currentDate.getFullYear();

            // Format the label as "Month Year"
            var label = new Intl.DateTimeFormat('en-US', {
                month: 'long'
            }).format(currentDate) + ' ' + year;

            // Add the label to the array
            nextSixMonths.push(label);

            // Move to the next month
            currentDate.setMonth(currentDate.getMonth() + 1);
        }

        var receiveCounts = @json($receive_cash_monthly->pluck('total_paid_amount'));

        var ctx1 = document.getElementById("receive_cash_bar");
        var receive_cash_bar = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: nextSixMonths,
                datasets: [{
                    label: "أستلام نقدية",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: receiveCounts,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 10000,
                            maxTicksLimit: 10,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return ' جنية ' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + '  ' + number_format(tooltipItem.yLabel) + ' جنية ';
                        }
                    }
                },
            }
        });



        var cashOutCounts = @json($cash_out_monthly->pluck('total_paid_amount'));

        var ctx2 = document.getElementById("cash_out_bar");
        var receive_cash_bar = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: nextSixMonths,
                datasets: [{
                    label: "صرف نقدية",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: cashOutCounts,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 10000,
                            maxTicksLimit: 10,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return ' جنية ' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + '  ' + number_format(tooltipItem.yLabel) + ' جنية ';
                        }
                    }
                },
            }
        });
    </script>
@endpush
