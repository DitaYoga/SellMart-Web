<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container mt-3">
        <h3>Daftar Tanaman</h3>
        <a href="{{ url('admin/tambah') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm">Logout</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Photo</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tanaman as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->name }}</td>
                    <td>{{ Str::limit($t->deskripsi, 50, ' ...') }}</td>
                    <td>{{ $t->price }}</td>
                    <td><img class="img" src="{{ asset('/image/'.$t->photo) }}" style="width:120px"></td>
                    <td>{{ $t->stok }}</td>
                    <td>
                        <a href="{{ url('admin/edit/'.$t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url('admin/delete/'.$t->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>