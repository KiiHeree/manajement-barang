@extends('main.index')
@section('content')
    <div class="row mb-4">
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 me-3 badge badge-center bg-secondary">
                            <i class='bx bx-archive'></i>
                        </div>
                    </div>
                    <span>Total Barang</span>
                    <h3 class="card-title text-nowrap mb-1">{{$barang}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 me-3 badge badge-center bg-primary">
                            <i class='bx bxs-collection'></i>
                        </div>
                    </div>
                    <span>Total Transaksi</span>
                    <h3 class="card-title text-nowrap mb-1">{{$totalTransaksi}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 me-3 badge badge-center bg-success">
                            <i class='bx bx-archive-in'></i>
                        </div>
                    </div>
                    <span>Penerimaan</span>
                    <h3 class="card-title text-nowrap mb-1">{{$penerimaan}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 me-3 badge badge-center bg-danger">
                            <i class='bx bx-archive-out' style='color:#ffffff' ></i>
                        </div>
                    </div>
                    <span>Pengiriman</span>
                    <h3 class="card-title text-nowrap mb-1">{{$pengiriman}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-8 col-xl-8 order-0 h-100">
            <div class="card" id="pengirimanChart">
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-4 ">

            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transaksi Baru</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach ($transaksiBaru as $tb)
                            <li class="d-flex mb-4 pb-1"
                                @if ($tb->tipe == 'PENERIMAAN') @foreach ($tb->penerimaan as $bTerima)
                                onclick="window.location='{{ route('penerimaanDetail', $bTerima->id_terima) }}'"
                            @endforeach
                        @else 
                            @foreach ($tb->pengiriman as $bKirim)
                                onclick="window.location='{{ route('pengirimanDetail', $bKirim->id_kirim) }}'"
                            @endforeach @endif
                                style="cursor:pointer;">

                                @if ($tb->tipe == 'PENERIMAAN')
                                    @foreach ($tb->penerimaan as $bpenerimaan)
                                        @if ($bpenerimaan->status == 'PENDING')
                                            <div class="avatar flex-shrink-0 me-3 badge badge-center bg-warning">
                                                <i class='bx bx-loader-circle'></i>
                                            </div>
                                        @else
                                            <div class="avatar flex-shrink-0 me-3 badge badge-center bg-success">
                                                <i class='bx bx-check'></i>
                                            </div>
                                        @endif

                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1">{{ $tb->tipe }}</small>
                                                <h6 class="mb-0">{{ $bpenerimaan->asal }}</h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0" style="font-size: 12px">
                                                    {{ \Carbon\Carbon::parse($tb->created_at)->format('H:i:s') }}</h6>
                                                <span class="text-muted"
                                                    style="font-size: 15px; width:100px;">{{ $bpenerimaan->user->nama }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($tb->pengiriman as $bpengiriman)
                                        @if ($bpengiriman->status == 'PENDING')
                                            <div class="avatar flex-shrink-0 me-3 badge badge-center bg-warning">
                                                <i class='bx bx-loader-circle'></i>
                                            </div>
                                        @else
                                            <div class="avatar flex-shrink-0 me-3 badge badge-center bg-success">
                                                <i class='bx bx-check'></i>
                                            </div>
                                        @endif
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1">{{ $tb->tipe }}</small>
                                                <h6 class="mb-0">{{ $bpengiriman->tujuan }}</h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0" style="font-size: 12px">
                                                    {{ \Carbon\Carbon::parse($tb->created_at)->format('H:i:s') }}</h6>
                                                <span class="text-muted"
                                                    style="font-size: 15px; width:100px;">{{ $bpengiriman->user->nama }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        let chart;

        function loadChart(data) {
            if (chart) {
                chart.destroy();
            }
            fetch('/api/dashboardData')
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    var options = {
                        series: [{
                            name: 'Pengiriman',
                            data: data.pengiriman
                        }, {
                            name: 'Penerimaan',
                            data: data.penerimaan
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                borderRadius: 5,
                                borderRadiusApplication: 'end'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                'Nov',
                                'Des'
                            ],
                        },
                        yaxis: {
                            title: {
                                text: 'Total Transaksi'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " Kali"
                                }
                            }
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#pengirimanChart"), options);
                    chart.render();
                });
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi yang mau dijalankan setelah HTML selesai dimuat
            loadChart();
        });
    </script>
@endsection
