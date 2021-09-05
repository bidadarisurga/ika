@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Profile {{ $item->name }}</h1>
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
                <form action="{{ route('user.update',$item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" placeholder="Nama" value="{{ $item->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{  $item->email }}" class="form-control">
                    </div>

                    @if (Auth::user()->role == 'admin')
                        <div class="form-group">
                            <label for="level">level</label>
                            <input type="text" name="role" id="level" placeholder="level" value="{{  $item->role }}" class="form-control">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
