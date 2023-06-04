<?php
require 'functions2.php';
include 'db.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User berhasil ditambahkan!');
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
    <title>Register | Kyraa Hobby Shop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@600&display=swap" rel="stylesheet">

</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Register</h2>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required="" class="input-control" />


            <label for="email">Email</label>
            <input type="email" name="email" id="email" required="" class="input-control" />

            <label for="notelp">No Telp</label>
            <input type="text" name="notelp" id="notelp" required="" class="input-control" />

            <label for="address">Address</label>
            <input type="text" name="address" id="address" required="" class="input-control" />


            <label for="username">Username</label>
            <input type="text" name="username" id="username" required="" minLength="6" class="input-control" />


            <label for="password">Password</label>
            <input type="password" name="password" id="password" required="" minLength="6" class="input-control" />

            <label for="password2">Konfirmasi Password</label>
            <input type="password" name="password2" id="password2" required="" minLength="6" class="input-control" />

            <p>Sudah punya akun? <a href="login.php">Masuk</a></p>

            <button type="submit" name="register" class="btn">daftar</button>
        </form>
    </div>
</body>

</html>