<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
   header("Location: login.php");
   exit;
}

require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data siswa berdasarkan id
$sw = query("SELECT * FROM siswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
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
    <title>Ubah data siswa</title>
    <link rel="stylesheet" href="ubah.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container col-md-5">

    <h1 class="tambat">Tambah data siswa</h1>    

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $sw["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $sw["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">NAMA : </label>
                <input class="form-control" type="text" name="nama" id="nama" required value="<?= $sw["nama"]; ?>">
            </li>
            <li>
                <label for="nis">NIS : </label>
                <input class="form-control" type="text" name="nis" id="nis" value="<?= $sw["nis"]; ?>">
            </li>
            <li>
                <label for="email">EMAIL : </label>
                <input class="form-control" type="text" name="email" id="email" value="<?= $sw["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input class="form-control" type="text" name="jurusan" id="jurusan" value="<?= $sw["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">GAMBAR : </label> <br>
                <img src="image/<?= $sw['gambar']; ?>" width="90"> <br>
                <input class="form-control mt-3" type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button class="btn btn-primary mt-4" type="submit" name="submit">Ubah Data!!!</button>
            </li>

        </ul>

    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>