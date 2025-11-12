<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah-tambahan</title>
</head>
<body>
    <h3>Matematika sederhana Tambah</h3>   
    
    <form action="{{route ('tambah-action') }}" method="post">
        @csrf <!--token variabel-->

        <label for="">Angka 1</label>
        <input type="text" placeholder="Masukan Angka" name="angka1" required>
        <br><br>
        <label for="">Angka 2</label>
        <input type="text" placeholder="Masukan Angka" name="angka2" required>
        <br><br>
        <button>Jumlahkan</button>
        
    </form>
    <h2>Jumlahnya adalah :{{ $jumlah ?? 0 }}</h2>

    
</body>
</html>