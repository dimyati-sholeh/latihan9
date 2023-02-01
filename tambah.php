<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
   header("Location: login.php");
   exit;
}

require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {


    
    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
    <link rel="stylesheet" href="tambah.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container col-md-5">

    <h1 class="tambah">Tambah data siswa</h1>    

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">NAMA : </label>
                <input class="form-control" type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nis">NIS : </label>
                <input  class="form-control" type="text" name="nis" id="nis">
            </li>
            <li>
                <label for="email">EMAIL : </label>
                <input  class="form-control" type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input  class="form-control" type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">GAMBAR : </label>
                <input  class="form-control" type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button class="btn btn-primary mt-4" type="submit" name="submit">Tambah Data!!!</button>
            </li>

        </ul>

    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>