@extends('layouts.backoffice')
@section('title', 'Dashboard')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">Dashboard</h5>
                    <h6 class="text-muted mb-1">Linkyi App</h6>
                </div>

                <div class="mb-0 position-relative">
                    <select class="form-select form-control" id="dailychart">
                        <option selected="">Minggu Ini</option>
                        <option>Bulan Ini</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div>

            <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
                <div class="col mt-4">
                    <a href="#!"
                        class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="uil uil-shopping-bag fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Toko</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                        data-target="{{ $store }}">{{ $store }}</span></p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
                <div class="col mt-4">
                    <a href="#!"
                        class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="uil uil-tag fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Kategori</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                        data-target="{{ $category }}">{{ $category }}</span></p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->



                <div class="col mt-4">
                    <a href="#!"
                        class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="uil uil-shopping-cart-alt fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Produk</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                        data-target="{{ $product }}">{{ $product }}</span></p>
                            </div>
                        </div>

                    </a>
                </div><!--end col-->

                <div class="col mt-4">
                    <a href="#!"
                        class="features feature-primary d-flex justify-content-between align-items-center rounded shadow p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon text-center rounded-pill">
                                <i class="uil uil-users-alt fs-4 mb-0"></i>
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 text-muted">Member</h6>
                                <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value"
                                        data-target="{{ $member }}">{{ $member }}</span></p>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->

            {{-- <div class="row">
                <div class="col-xl-8 col-lg-7 mt-4">
                    <div class="card shadow border-0 p-4 pb-0 rounded">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0 fw-bold">Sales Analytics</h6>

                            <div class="mb-0 position-relative">
                                <select class="form-select form-control" id="yearchart">
                                    <option selected>2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                        </div>
                        <div id="dashboard" class="apex-chart"></div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12 mt-4">
                            <div class="card rounded shadow border-0 p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <h6 class="mb-0">Produk populer </h6>

                                    <div class="text-end">
                                        <h6 class="text-muted mb-0">Tahun ini</h6>
                                    </div>
                                </div>
                                <div id="top-product-chart"></div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row--> --}}

            <div class="row">

            </div><!--end row-->
        </div>
    </div><!--end container-->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Simple Datatable
        $('.table').DataTable({
            "perPageSelect": false,
            "sortable": false,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    </script>
    {{-- <script>
        try {
            var options = {
                chart: {
                    height: 360,
                    type: 'area',
                    width: '100%',
                    stacked: true,
                    toolbar: {
                        show: false,
                        autoSelected: 'zoom'
                    },
                },
                colors: ['#2f55d4', '#2eca8b'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: [1.5, 1.5],
                    dashArray: [0, 4],
                    lineCap: 'round',
                },
                grid: {
                    padding: {
                        left: 0,
                        right: 0
                    },
                    strokeDashArray: 3,
                },
                markers: {
                    size: 0,
                    hover: {
                        size: 0
                    }
                },
                series: [{
                    name: 'Item Sales',
                    data: [0, 100, 40, 110, 60, 140, 55, 130, 65, 180, 75, 115],
                }, {
                    name: 'Revenue',
                    data: [0, 45, 10, 75, 35, 94, 40, 115, 30, 105, 65, 110],
                }],
                xaxis: {
                    type: 'month',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    axisBorder: {
                        show: true,
                    },
                    axisTicks: {
                        show: true,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: .8,
                        opacityFrom: 0.3,
                        opacityTo: 0.2,
                        stops: [0, 80, 100]
                    }
                },

                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
                legend: {
                    position: 'bottom',
                    offsetY: 0,
                },
            }

            var chart = new ApexCharts(
                document.querySelector("#dashboard"),
                options
            );

            chart.render();
        } catch (error) {

        }
        //Chart Three
        try {
            var options = {
                chart: {
                    height: 320,
                    type: 'donut',
                },
                series: {!! $dchart->total !!},
                labels: {!! $dchart->categories !!},
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 0,
                },
                dataLabels: {
                    enabled: true,
                    dropShadow: {
                        enabled: false,
                    }
                },
                stroke: {
                    show: true,
                    colors: ['transparent'],
                },
                // dataLabels: {
                //     enabled: false,
                // },
                theme: {
                    monochrome: {
                        enabled: true,
                        color: '#2f55d4',
                    }
                },
                responsive: [{
                    breakpoint: 768,
                    options: {
                        chart: {
                            height: 400,
                        },
                    }
                }]
            }
            var chart = new ApexCharts(document.querySelector("#top-product-chart"), options);
            chart.render();
        } catch (error) {

        }


        try {
            const counter = document.querySelectorAll('.counter-value');
            const speed = 2500; // The lower the slower

            counter.forEach(counter_value => {
                const updateCount = () => {
                    const target = +counter_value.getAttribute('data-target');
                    const count = +counter_value.innerText;

                    // Lower inc to slow and higher to slow
                    var inc = target / speed;

                    if (inc < 1) {
                        inc = 1;
                    }

                    // Check if target is reached
                    if (count < target) {
                        // Add inc to count and output in counter_value
                        counter_value.innerText = (count + inc).toFixed(0);
                        // Call function every ms
                        setTimeout(updateCount, 1);
                    } else {
                        counter_value.innerText = target;
                    }
                };

                updateCount();
            });
        } catch (err) {

        }
    </script> --}}
@endsection
