<?php
include 'db.php';
session_start();
// if ($_SESSION['status_login'] != true) {
//      echo '<script>window.location="login.php"</script>';
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyraa Hobby Shop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@600&display=swap" rel="stylesheet">

    <style>
        @media print {
            .logout {
                display: none;
            }

            .produk {
                display: none;
            }

            .kategori {
                display: none;
            }

            .profil {
                display: none;
            }

            .dashboard {
                display: none;
            }

            .tambah,
            .status,
            .aksi,
            .aksi-db,
            .status-db {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!--header-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Kyraa Hobby Shop</a></h1>
            <ul>
                <li><a href="dashboard.php" class="dashboard">Dashboard</a></li>
                <li><a href="profil.php" class="profil">Profil</a></li>
                <li><a href="data-kategori.php" class="kategori">Data Kategori</a></li>
                <li><a href="data-produk.php" class="produk">Data Produk</a></li>
                <li><a href="logout.php" class="logout">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--Content-->
    <div class="section">
        <div class="container">
            <h3>Data Produk</h3>
            <form action="" method="POST">

               <!-- <input  type="submit" name="cetakpdf" value="Tampilkan Data User"><br> -->
               <a href="cetakpdf.php" target="_blank" name="cetakpdf">Cetak PDF Disini!</a><br>
                <!-- <input type="submit" name="pdfphp" value="Cetak"> -->
            </form>
            <?php
            //  if (isset($_POST['cetakpdf'])) {
            //      include("pdf.php");
            //  }
            if (isset($_POST['pdfphp'])) {
                header("location:pdf.php");
            }
            ?>
            <div class="box">
                <p><a href="tambah-produk.php" class="tambah">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th class="status">Status</th>
                            <th width="150px" class="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($row = mysqli_fetch_array($produk)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                    <td> <a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="produk/<?php echo $row['product_image'] ?>" width="50px" height="50px"></a></td>
                                    <td class="status-db"><?php echo ($row['product_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                    <td class="aksi-db">
                                        <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('yakin mau dihapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - Kyraa Hobby Shop.</small>
        </div>
    </footer>
</body>

</html>