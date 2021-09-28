@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) SPKA-->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) DATAEMAIL -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Data surat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope-open-text fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) DATAEMAIL -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Data surat belum di proses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $suratBelom }}</div>
                            </div>
                            <div class="col-auto">
                                <form action="{{ route('list') }}" method="get">
                                    <button name="belom" class="btn backdrop-brightness-0">
                                        <i class="fas fa-envelope-open-text fa-2x"></i>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
         <div class="card shadow-lg mt-2" style="padding : 3%;background-color: #fffffd;">
            <div class="card-header text-center mb-3" style="background-color: transparent; color :#757575">
                 <h4>Status Progess </h4>
            </div>

            <div class="card-body">
                {{-- <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-guletin-tab" data-toggle="tab" href="#nav-guletin" role="tab" aria-controls="nav-guletin" aria-selected="true">progress</a>
                        <a class="nav-item nav-link active" id="nav-guletin-tab" data-toggle="tab" href="#nav-guletin" role="tab" aria-controls="nav-guletin" aria-selected="true">Guletin</a>
                    </div>
                </nav> --}}
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-guletin" role="tabpanel" aria-labelledby="nav-guletin-tab">
                        <div class="card">
                            <canvas id="myProgressGuletin"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

      <script>
        var ctx = document.getElementById('myProgressGuletin');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Belum Diproses','Selesai','Dalam Proses','Tidak Dapat Diproses'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{$suratBelom}},{{$suratSelesai}},{{$suratDalamProses}},{{$suratTidakDapatDiproses}}],
                    borderWidth: 3,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        ],
                    borderColor: '#293B5F',
                    yAxisID: 'y',
                }, ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            },
            stacked: false,

        });
    </script>
    <!-- /.container-fluid -->
@endsection
