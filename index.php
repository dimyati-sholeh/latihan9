<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
   header("Location: login.php");
   exit;
}

require 'function.php';

$siswa = query("SELECT * FROM siswa");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $siswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="daftar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md">
        
        <h1 class="title">Daftar Siswa</h1>

        <nav class="button mt-3"> 

            <a class="btn btn-danger me-3" href="logout.php">Logout</a>
            
            <a class="btn btn-success" href="tambah.php">Tambah data siswa</a>

        </nav>

        <br>
        
        <form class="d-flex" action="" method="post">
            
            <input class="form-control me-3" type="text" name="keyword" size="90" autofocus 
            placeholder="masukkan keyword pencarian.." autocomplete="off">
            <button class="btn btn-primary" type="submit" name="cari">Cari!</button>
            
        </form>
        <br>
        
        <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
            
            <tr>
                <th>No.</th> 
                <th>Gambar</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            
            <?php $i = 1;?>
            <?php foreach ( $siswa as $row ): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="image/<?php echo $row["gambar"]; ?>" width="80"></td>
                    <td><?= $row["nis"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>" ><i class="bi bi-pencil-square me-2"></i></a> 
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" ><i class="bi bi-trash ms-2"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                
            </table>
        </div> 
        </div>   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</body>
</html>