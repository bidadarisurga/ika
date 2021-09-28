@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Surat</h1>
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
                <form action="{{ route('surat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="no_surat">No Surat</label>
                        <input type="text" name="no_surat" id="no_surat" placeholder="Masukan nomor surat" value="{{ old('no_surat') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" id="tgl_surat" placeholder="Masukan tanggal surat" value="{{ old('tgl_surat') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" id="perihal" placeholder="Masukan perihal surat" value="{{ old('perihal') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="no_adm">No Administrasi</label>
                        <input type="text" name="no_adm" id="no_adm" placeholder="Masukan No Surat" value="{{ old('no_adm') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_adm">Tanggal Administrasi</label>
                        <input type="text" name="tgl_adm" id="tgl_adm" placeholder="Masukan Tanggal Administrasi" value="{{ old('tgl_adm') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="distribusi">Distribusi</label>
                        <input type="text" name="distribusi" id="distribusi" placeholder="Masukan Distribusi surat" value="{{ old('distribusi') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tindak_lanjut">Tindak Lanjut</label>
                        <input type="text" name="tindak_lanjut" id="tindak_lanjut" placeholder="Tidak Lanjut Surat" value="{{ old('tindak_lanjut') }}" class="form-control">
                    </div>

                    <div class="form-group col-5 d-inline-block">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="Tidak Dapat Diproses">Tidak Dapat Diproses</option>
                            <option value="Belum Diproses">Belum Diproses</option>
                            <option value="Dalam Proses">Dalam Diproses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group col-5 d-inline-block">
                        <label for="sifat">Sifat</label>
                        <select name="sifat" class="form-control">
                            <option value="Biasa">Biasa</option>
                            <option value="Rahasia">Rahasia</option>
                            <option value="Segera">Segera</option>
                            <option value="Penting">Penting</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
