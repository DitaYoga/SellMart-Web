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
        <h3>Form Tambah Tanaman</h3>
        <form action="{{route('proses_edit', $tanaman->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $tanaman->name }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $tanaman->deskripsi }}">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $tanaman->price }}">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo" value="{{ $tanaman->photo }}">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" id="stok" value="{{ $tanaman->stok }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>