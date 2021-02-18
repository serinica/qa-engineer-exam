@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="ml-3">Dashboard</h1>
@stop

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <x-dg-small-box title="New Orders" icon="fas fa-shopping-cart" text="150"></x-dg-small-box>
            </div>
            <div class="col-sm-3">
                <x-dg-small-box title="Bounce Rate" icon="fas fa-chart-line" text="53%" bg="success" ></x-dg-small-box>
            </div>
            <div class="col-sm-3">
                <x-dg-small-box title="New User" icon="fas fa-user-plus" text="500" bg="warning"></x-dg-small-box>
            </div>
            <div class="col-sm-3">
                <x-dg-small-box title="Unique Visitors" icon="fas fa-chart-pie" text="500" bg="danger"></x-dg-small-box>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0" style="background-color: white">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Online Store Visitors</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-md">
                                    <b>820</b>
                                </span>
                                <span>
                                    Visitors Over Time
                                </span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                <i class="fas fa-arrow-up"></i>
                                    12.5%
                                </span>
                                <span class="text-muted">
                                    Since last week
                                </span>
                            </p>
                        </div>
                        <div class="position-relative mb-4">
                            <canvas id="myChart" width="487" height="200" style="display: block; width: 487px; height: 200px;"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                            </span>
                            <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Products</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Sales</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                        Some Product
                                    </td>
                                    <td>$13 USD</td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            12%
                                        </small>
                                        12,000 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                        Another Product
                                    </td>
                                    <td>$29 USD</td>
                                    <td>
                                        <small class="text-warning mr-1">
                                            <i class="fas fa-arrow-down"></i>
                                            0.5%
                                        </small>
                                        123,234 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                        Amazing Product
                                    </td>
                                    <td>$1,230 USD</td>
                                    <td>
                                        <small class="text-danger mr-1">
                                            <i class="fas fa-arrow-down"></i>
                                            3%
                                        </small>
                                        198 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                        Perfect Item
                                        <span class="badge bg-danger">NEW</span>
                                    </td>
                                    <td>$199 USD</td>
                                    <td>
                                        <small class="text-success mr-1">
                                            <i class="fas fa-arrow-up"></i>
                                            63%
                                        </small>
                                        87 Sold
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0 " style="background-color: white">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Sales</h3>
                            <a href="#">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-md">$18,230.00</span>
                                <span>Sales Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> 33.1%
                                </span>
                                <span class="text-muted">Since last month</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="sales-chart" width="487" height="200" style="display: block; width: 487px; height: 200px;" width="487"
                                class="chartjs-render-monitor"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This year
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Last year
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Online Store Overview</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-tool">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-success text-lg">
                                <i class="fas fa-redo-alt"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="fas fa-arrow-up text-success"></i> 12%
                                </span>
                                <span class="text-muted">CONVERSION RATE</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-warning text-lg">
                                <i class="fas fa-shopping-cart"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="fas fa-arrow-up text-warning"></i> 0.8%
                                </span>
                                <span class="text-muted">SALES RATE</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="d-flex justify-content-between align-items-center mb-0">
                            <p class="text-danger text-lg">
                                <i class="fas fa-users"></i>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span class="font-weight-bold">
                                    <i class="fas fa-arrow-down text-danger"></i> 1%
                                </span>
                                <span class="text-muted">REGISTRATION RATE</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart');
        var stackedLine = new Chart(ctx, {
            type: 'line',
            data: {
                display: false,
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{

                    fill: false,
                    data: [100,120,170,167,180,177,160],
                    backgroundColor:'rgba(44, 130, 201, 1)',
                    borderColor:'rgba(44, 130, 201, 1)',
                    borderWidth: 2.5
                },{
                    fill: false,
                    data: [60,80,70,67,80,77,100],
                    backgroundColor:'rgba(191, 191, 191, 1)',
                    borderColor:'rgba(191, 191, 191, 1)',
                    borderWidth: 2.5
                    }]
                },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: "rgba(0, 0, 0, 0)",
                        },
                        ticks: {
                            fontStyle: 'bold'
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                            color: "rgba(0, 0, 0, 0)",
                        },
                        ticks: {
                            fontStyle: 'bold',
                            suggestedMax: 200,
                            beginAtZero: true,
                            stepSize: 20,
                        }
                    }]
                }
            }
        });
        var ct = document.getElementById('sales-chart');
        var stackedLine = new Chart(ct, {
            type: 'bar',
            data: {
                display: false,
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                    fill: false,
                    data: [100,120,170,167,180,177,160],
                    backgroundColor:'rgba(44, 130, 201, 1)',
                    borderColor:'rgba(44, 130, 201, 1)',
                    borderWidth: 2.5
                    },{
                    fill: false,
                    data: [60,80,70,67,80,77,100],
                    backgroundColor:'rgba(191, 191, 191, 1)',
                    borderColor:'rgba(191, 191, 191, 1)',
                    borderWidth: 2.5
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: "rgba(0, 0, 0, 0)",
                        },
                        ticks: {
                            fontStyle: 'bold'
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                            color: "rgba(0, 0, 0, 0)",
                        },
                        ticks: {
                            fontStyle: 'bold',
                            suggestedMax: 200,
                            beginAtZero: true,
                            stepSize: 20,
                        }
                    }]
                }
            }
        });
    </script>
@stop
