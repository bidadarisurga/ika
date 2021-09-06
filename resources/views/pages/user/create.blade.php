@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
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
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="name" id="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukan Email" value="{{ old('email') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="role">Level</label>
                        <input type="text" name="role" id="role" placeholder="ex: super admin, admin, user" value="{{ old('role') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" placeholder="Masukan Password" value="{{ old('password') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
