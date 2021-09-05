@extends('layouts.index')

@push('jquery')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            {{-- <h1 class="h3 mb-0 text-gray-800">DATA SURAT</h1> --}}
                @if (Auth::user()->role == 'user')
                    <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Surat
                    </a>
                @endif

                @if (Auth::user()->role == 'admin')
                    <a href="/view" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Download Pdf
                    </a>
                @endif
        </div>

        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" id="email-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Tgl Surat</th>
                            <th>Perihal Surat</th>
                            <th>No Administrasi</th>
                            <th>Tgl Administrasi</th>
                            <th>Distribusi</th>
                            <th>Tindak Lanjut</th>
                            <th>Status</th>
                            <th>Sifat Surat</th>
                             @if (Auth::user()->role == 'user')
                                <th>Akasi</th>
                             @endif
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- App scripts -->
    <script>
    $(function() {
        var user = "{{Auth::user()->role }}"
        let cols = [
                {
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                { data: 'no_surat', name: 'no_surat' },
                { data: 'tgl_surat', name: 'tgl_surat' },
                { data: 'perihal', name: 'perihal' },
                { data: 'no_adm', name: 'no_adm' },
                { data: 'tgl_adm', name: 'tgl_adm' },
                { data: 'distribusi', name: 'distribusi' },
                { data: 'tindak_lanjut', name: 'tindak_lanjut' },
                { data: 'status', name: 'status' },
                { data: 'sifat', name: 'sifat' },

            ]
            if ( user == 'user') {
                cols.push({data: 'action', name: 'action'})
            }

        $('#email-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'list',
            columns:cols
        });
    });
</script>
@endpush
