<?php 
require 'function.php'; 

if ( isset($_POST["register"]) ) {
    
    if ( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="registrasi.css">
</head>
<body>
    <div class="container">

        <h1 class="halaman">Halaman Registrasi</h1>

<form action="" method="post">

    <ul>
        <li>
            <label for="username"></label>
            <input class="input1" type="text" name="username" id="username" placeholder="username">
        </li>
        <li>
            <label for="password"></label>
            <input class="input1" type="password" name="password" id="password" placeholder="password">
        </li>
        <li>
            <label for="password2"></label>
            <input class="input1" type="password" name="password2" id="password2" placeholder="konfirmasi password">
        </li>
        <li>
            <button type="submit" name="register">Register!</button>
        </li>
    </ul>

</form>

</div>
</body>
</html>