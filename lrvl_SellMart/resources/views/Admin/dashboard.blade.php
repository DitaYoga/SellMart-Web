<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welocome Admin</h1><br>
    <a href="{{ url('/logout') }}">
        <button type="submit">Logout</button>
    </a>
    <a href="{{ url('/admin/tanaman') }}">Tanaman</a>
</body>
</html>