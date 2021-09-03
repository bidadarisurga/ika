@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Log Activity Lists</h1>
                {{-- @if (Auth::user()->level == 'admin') --}}
                {{-- <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Surat
                </a> --}}
                {{-- <a href="/view" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Download Pdf
                </a> --}}
            {{-- @endif --}}
        </div>

        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Subject</th>
                            <th>URL</th>
                            <th>Method</th>
                            <th>Ip</th>
                            <th width="300px">User Agent</th>
                            <th>User Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->subject }}</td>
                                <td class="text-success">{{ $item->url }}</td>
                                <td><label class="label label-info">{{ $item->method }}</label></td>
                                <td class="text-warning">{{ $item->ip }}</td>
                                <td class="text-danger">{{ $item->agent }}</td>
                                <td>{{ $item->user_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">
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
