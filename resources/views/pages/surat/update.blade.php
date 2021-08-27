@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Surat {{ $item->no_surat }}</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{route('surat.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="no_surat">No Surat</label>
                        <input type="text" name="no_surat" id="no_surat" placeholder="masukan kode dinas" value="{{ $item->no_surat }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" id="tgl_surat" placeholder="masukan kode dinas" value="{{  $item->tgl_surat }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perlihal</label>
                        <input type="text" name="perihal" id="perihal" placeholder="masukan nama dinas" value="{{  $item->perihal }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="no_adm">No Administrasi</label>
                        <input type="text" name="no_adm" id="no_adm" placeholder="masukan nama dinas" value="{{ $item->no_adm }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_adm">tanggal Administrasi</label>
                        <input type="text" name="tgl_adm" id="tgl_adm" placeholder="masukan nama dinas" value="{{ $item->tgl_adm }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="distribusi">Distribusi</label>
                        <input type="text" name="distribusi" id="distribusi" placeholder="masukan nama dinas" value="{{ $item->distribusi }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tindak_lanjut">Tindak Lanjut</label>
                        <input type="text" name="tindak_lanjut" id="tindak_lanjut" placeholder="masukan nama dinas" value="{{ $item->tindak_lanjut }}" class="form-control">
                    </div>

                    <div class="form-group col-5 d-inline-block">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="Tidak Dapat Diproses" {{ $item->status == "Tidak Dapat Diproses" ? 'selected' : '' }}>Tidak Dapat Diproses</option>
                            <option value="Belum Diproses" {{ $item->status == "Belum Diproses" ? 'selected' : '' }}>Belum Diproses</option>
                            <option value="Dalam Proses" {{ $item->status == "Dalam Diproses" ? 'selected' : '' }}>Belum Diproses</option>
                            <option value="Selesai" {{ $item->status == "Selesai" ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="form-group col-5 d-inline-block">
                        <label for="sifat">Sifat</label>
                        <select name="sifat" class="form-control">
                            <option value="Biasa" {{ $item->sifat == "Biasa" ? 'selected' : '' }}>Biasa</option>
                            <option value="Rahasia" {{ $item->sifat == "Rahasia" ? 'selected' : '' }}>Rahasia</option>
                            <option value="Segera" {{ $item->sifat == "Segera" ? 'selected' : '' }}>Segera</option>
                            <option value="Penting" {{ $item->sifat == "Penting" ? 'selected' : '' }}>Penting</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
