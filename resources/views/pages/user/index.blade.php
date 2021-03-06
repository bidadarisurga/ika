@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DATA User</h1>
                @if (Auth::user()->role == 'admin')
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data User
                </a>
                @endif
                {{-- <a href="/view" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Download Pdf
                </a> --}}
        </div>

        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>level</th>
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
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->role}}</td>
                                 @if (Auth::user()->role == 'admin')
                                 <td>
                                     <a href="{{ route('user.edit',$item->id) }}" class="btn btn-info">
                                         <i class="fa fa-pencil-alt"></i>
                                     </a>
                                     <form action="{{ route('user.delete',$item->id) }}" method="post" class="d-inline">
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
