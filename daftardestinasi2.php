<!DOCTYPE html>
<html>
<?php
ob_start();
session_start();
if (!isset($_SESSION['useremail']))
    header("location:login.php");
?>
<?php include "include/head.php"; ?>

<body class="sb-nav-fixed">
    <?php include "include/menubar.php"; ?>
    <div id="layoutSidenav">
        <?php include "include/menunav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4"></ol>
                    <?php
                    include 'include/config.php';
                    ?>
                    <head>
                        <title>DESTINASI WISATA</title>
                        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
                    </head>
                    <body>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="jumbotron mt-2">
                                    <h1 class="display-12">Kategori Wisata</h1>
                                    <table class="table">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <div class="form-group row mb-2">
                                                    <label for="search" class="col-sm-3">Kode Destinasi</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Kode Destinasi">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="submit" name="kirim" class="btn btn-success" value="Cari">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table table-hover table-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kode Destinasi</th>
                                                    <th scope="col">Nama Destinasi</th>
                                                    <th scope="col">Kode Kategori</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if (isset($_POST["kirim"])) {
                                                    $search = $_POST['search'];
                                                    $query = mysqli_query($connection, "SELECT destinasi.*, kategoriwisata.kategoriNAMA FROM destinasi 
                                                        LEFT JOIN kategoriwisata ON destinasi.kategoriKODE = kategoriwisata.kategoriKODE 
                                                        WHERE destinasi.destinasiKODE LIKE '%" . $search . "%'");
                                                } else {
                                                    $query = mysqli_query($connection, "SELECT destinasi.*, kategoriwisata.kategoriNAMA FROM destinasi 
                                                        LEFT JOIN kategoriwisata ON destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
                                                }
                                                //end pencarian
                                                $nomor = 1;
                                                while ($row = mysqli_fetch_array($query))
                                                {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $nomor;?></td>
                                                        <td><?php echo $row['destinasiKODE'];?></td>
                                                        <td><?php echo $row['destinasiNAMA'];?></td>
                                                        <td><?php echo $row['kategoriNAMA'];?></td>
                                                    </tr>
                                                <?php $nomor =$nomor + 1; ?>
                                                <?php
                                                } 
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- penutup clas=col-sm-10 -->
                                </div>
                                <!-- penutup clas=row -->
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        $('#kodeKategori').select2(
                                            {closeOnSelect: true, allowClear: true, placeholder: 'Pilih Kategori Wisata'}
                                        );
                                    });
                                </script>
                            </div>
                        </main>
                        <?php include "include/footer.php"; ?>
                    </div>
                </div>
                <?php include "include/scriptjs.php"; ?>
            </body>
        </html>
