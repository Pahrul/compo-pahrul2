<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create From</title>
</head>
<body>
    <h3>Matematika sederhana</h3>
    <p>Pilih menu Aritmatika</p>
    <a href="aritmatika/tambah">Tambah</a>
    <a href="{{ url('aritmatika/kurang') }}">Kurang</a>
    <a href="{{ route('aritmatika.bagi') }}">Bagi</a>
    <a href="{{ route('aritmatika.kali') }}">kali</a>
    
</body>
</html>