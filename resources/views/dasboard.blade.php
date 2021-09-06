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
            <div class="col-xl-3 col-md-6 mb-4">
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
            <div class="col-xl-3 col-md-6 mb-4">
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
            <div class="col-xl-3 col-md-6 mb-4">
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
    <!-- /.container-fluid -->
@endsection
