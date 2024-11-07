<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOTEL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
 

<?php include "include/head.php"; ?>

<body class="sb-nav-fixed">
    <?php include "include/menubar.php"; ?>
    <div id="layoutSidenav">
        <?php include "include/menunav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    
                    <ol class="breadcrumb mb-4">

                    </ol>

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-15">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-10">Hotel</h1>
                                </div>
                            </div>

                            <?php
                            include "include/config.php";
                            if (isset($_POST['Simpan'])) {
                                $hotelKODE = $_POST['hotelKODE'];
                                $hotelNAMA = $_POST['hotelNAMA'];
                                $hotelALAMAT = $_POST['hotelALAMAT'];
                                $kategoriKODE = $_POST['kategoriKODE'];
                                mysqli_query($connection, "INSERT INTO hotel VALUES ('$hotelKODE','$hotelNAMA','$hotelALAMAT','$kategoriKODE')");
                                header("location:hotel.php");
                            }
                            $query = mysqli_query($connection, "SELECT * FROM hotel");

                            if (!$query) {
                                die("Query failed: " . mysqli_error($connection));
                            }

                            ?>

 
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
 
<body>
 
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <form method="POST">
 
                <!-- Form untuk menambahkan data hotel -->
                <div class="mb-3 row">
                    <label for="hotelKODE" class="col-sm-2 col-form-label">Kode Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelKODE" name="hotelKODE" placeholder="Kode Hotel">
                    </div>
                </div>
 
                <div class="mb-3 row">
                    <label for="hotelNAMA" class="col-sm-2 col-form-label">Nama Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelNAMA" name="hotelNAMA" placeholder="Nama Hotel">
                    </div>
                </div>
 
                <div class="mb-3 row">
                    <label for="hotelALAMAT" class="col-sm-2 col-form-label">Alamat Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hotelALAMAT" name="hotelALAMAT" placeholder="Alamat Hotel">
                    </div>
                </div>
 
                <div class="mb-3 row">
                    <label for="kategoriKODE" class="col-sm-2 col-form-label">Kode Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategoriKODE" name="kategoriKODE" placeholder="Kode Kategori">
                    </div>
                </div>
 
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                        <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                    </div>
                </div>
            </form>
 
            <!-- Form untuk pencarian berdasarkan nama hotel -->
            <form method="POST" style="margin-top: 20px;">
                <div class="form-group row mb-2">
                    <label for="search_nama" class="col-sm-3">Cari Nama Hotel</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="search" placeholder="Cari Nama Hotel"
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
                    </div>
                    <input type="submit" name="kirim_nama" class="col-sm-1 btn-primary" value="Cari">
                </div>
            </form>
 
       
 
            <!-- Menampilkan hasil pencarian dalam tabel -->
            <div class="jumbotron mt-5">
                <h1 class="display-9">Hasil Entri Data Hotel</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Hotel</th>
                        <th scope="col">Nama Hotel</th>
                        <th scope="col">Alamat Hotel</th>
                        <th scope="col">Kategori Hotel</th>
                        <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
 
                    <?php
                    $nomor = 1;
                    // Periksa apakah $query diatur dan tidak null
                    if ($query && mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row['hotelKODE']; ?></td>
                                <td><?php echo $row['hotelNAMA']; ?></td>
                                <td><?php echo $row['hotelALAMAT']; ?></td>
                                <td><?php echo $row['kategoriKODE']; ?></td>
                                <td width ="5px">
                                      <a href="edithotel.php?ubah=<?php echo $row["hotelKODE"]?>"
                                        class="btn btn-success btn-sm" tittle ="edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                        </td>

                                        <td width ="5px">
                                        <a href="hapushotel.php?hapus=<?php echo $row["hotelKODE"]?>" class="btn btn-danger btn-sm" title="hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                             </a>
                            </tr>
                    <?php
                            $nomor = $nomor + 1;
                        }
                    } else {
                        // Handle the case where no data is found
                        echo '<tr><td colspan="6"></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <?php include "include/footer.php"; ?>
        </div>
    </div>
    <?php include "include/scriptjs.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    </body>
    </table>
    </div>

                       
</html>