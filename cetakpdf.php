<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyraa Hobby Shop</title>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="script.js"></script>
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
        </div>
    </header>
    <!--Content-->
    <div id="content">
        <div class="section">
            <div class="container">
                <h3>Data Produk</h3>
                <button onclick="generatePDF()">Download pdf</button>
                <div class="box">
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th width="60px">No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Gambar</th>

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
    </div>
    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - Kyraa Hobby Shop.</small>
        </div>
    </footer>
</body>

</html>