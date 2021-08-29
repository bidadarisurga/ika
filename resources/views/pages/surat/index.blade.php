@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            {{-- <h1 class="h3 mb-0 text-gray-800">DATA SURAT</h1> --}}
                @if (Auth::user()->role == 'admin')
                <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Surat
                </a>
                <a href="/view" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Download Pdf
                </a>
            @endif
        </div>

        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No Surat</th>
                            <th>Tgl Surat</th>
                            <th>Perihal Surat</th>
                            <th>No Administrasi</th>
                            <th>Tgl Administrasi</th>
                            <th>Distribusi</th>
                            <th>Tindak Lanjut</th>
                            <th>Status</th>
                            <th>Sifat Surat</th>
                             @if (Auth::user()->role == 'admin')
                                <th>Akasi</th>
                             @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_surat}}</td>
                                <td>{{ $item->tgl_surat}}</td>
                                <td>{{ $item->perihal}}</td>
                                <td>{{ $item->no_adm}}</td>
                                <td>{{ $item->tgl_adm}}</td>
                                <td>{{ $item->distribusi}}</td>
                                <td>{{ $item->tindak_lanjut}}</td>
                                <td>{{ $item->status}}</td>
                                <td>{{ $item->sifat}}</td>
                                 @if (Auth::user()->level == 'admin')
                                 <td>
                                     <a href="{{ route('surat.edit',$item->id) }}" class="btn btn-info">
                                         <i class="fa fa-pencil-alt"></i>
                                     </a>
                                     <form action="{{ route('surat.destroy',$item->id) }}" method="post" class="d-inline">
                                         @csrf
                                         @method('delete')

                                         <button class="btn btn-danger">
                                             <i class="fa fa-trash"></i>
                                         </button>
                                     </form>
                                 </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="11">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>

    </div>
@endsection
