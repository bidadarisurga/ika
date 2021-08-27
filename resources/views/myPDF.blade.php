<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th{
            font-size: 10px
        }
        td{
            font-size: 10px
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">No Administrasi</th>
                    <th scope="col">Tanggal Administarasi</th>
                    <th scope="col">Distribusi</th>
                    <th scope="col">Tindak Lanjut</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sifat</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($data as $item)
                    <tr>
                        <td scope="row">{{$no++}}</td>
                        <td>{{ $item->no_surat}}</td>
                        <td>{{ $item->tgl_surat}}</td>
                        <td>{{ $item->perihal}}</td>
                        <td>{{ $item->no_adm}}</td>
                        <td>{{ $item->tgl_adm}}</td>
                        <td>{{ $item->distribusi}}</td>
                        <td>{{ $item->tindak_lanjut}}</td>
                        <td>{{ $item->status}}</td>
                        <td>{{ $item->sifat}}</td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
