<!DOCTYPE html>
<html lang="en">
<head>
    <title>GRACE</title>
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
                    <ol class="breadcrumb mb-4"></ol>

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-10">Grace</h1>
                                </div>
                            </div>

                            <?php
                            include "include/config.php";

                            if (isset($_POST['Simpan'])) {
                                $graceID = $_POST['graceID'];
                                $graceKOTA = $_POST['graceKOTA'];
                                $destinasiKODE = $_POST['destinasiKODE'];
                                $fotoFILE = $_FILES['fotoFILE']['name'];  // Baris yang diperbaiki
                                $file_tmp = $_FILES["fotoFILE"]["tmp_name"];
                                
                                // connect database
                                $koneksi = mysqli_query($connection, "INSERT INTO grace1 VALUES ('$graceID', '$graceKOTA', '$destinasiKODE', '$fotoFILE')");
                                
                            }

                            $datakategori = mysqli_query($connection, "select * from destinasi");
                            ?>

                            <!-- awal row -->
                            <div class="row">
                                <div class="col-md-10 mx-auto">
                                    <div class="card text">
                                        <div class="card-header bg-secondary text-white">
                                            Grace's Form
                                        </div>
                                        <div class="card-body">
                                            <!-- awal form -->
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="graceID">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Alamat" name="graceKOTA">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Kode Destinasi</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="destinasiKODE" id="destinasiKODE">
                                                            <option value="">Pilih Kode Destinasi</option>
                                                            <?php
                                                            $datakategori = mysqli_query($connection, "SELECT * FROM destinasi");
                                                            while ($row = mysqli_fetch_array($datakategori)) {
                                                            ?>
                                                                <option value="<?php echo $row["destinasiKODE"] ?>">
                                                                    <?php echo $row["destinasiKODE"] . ' - ' . $row["destinasiKODE"] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                            <label for="file" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                            <input type="file" id="file" name="fotoFILE">
                                                </div>
                                                        </div>


                                                <div class="form-group row">
                                                    <div class="col-sm-7">
                                                        <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                                                        <input type="reset" class="btn btn-danger" value="Batal" name="Batal">
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- akhir form -->
                                        </div>
                                        <div class="card-footer bg-secondary"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir row -->

                            <!-- awal table -->
                            <div class="card text mt-4 mb-4 text-center">
                                <div class="card-header bg-secondary text-white">
                                    Grace's Input Results
                                </div>
                                

                                    <table class="table table-info table-striped table table-hover">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kota</th>
                                            <th scope="col">Kode Destinasi</th>
                                            <th scope="col">Foto Destinasi</th>

                                            <th colspan="2" style="text-align:center">Aksi</th>
                                        </tr>
                                        <tbody>
                                            <?php 
                                            if (isset($_POST["kirim"])) {
                                                $search = $_POST['search'];
                                                $query = mysqli_query($connection, "SELECT * FROM grace1 WHERE graceID LIKE '%" . $search . "%'");
                                            } else {
                                                $query = mysqli_query($connection, "SELECT * FROM grace1");
                                            }
                                            
                                            $nomor = 1;
                                            
                                            while ($row = mysqli_fetch_array($query))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $nomor;?></td>
                                                <td><?php echo $row['graceID'];?></td>
                                                <td><?php echo $row['graceKOTA'];?></td>
                                                <td><?php echo $row['destinasiKODE'];?></td>
                                                <td>
                                                <?php if (!empty($row) && isset($row['fotoFILE']) && is_file("images/" . $row['fotoFILE'])) { ?>
                                                    <img src="images/<?php echo $row['fotoFILE'] ?>" width="80">
                                                <?php } else {
                                                    echo "<img src='images/noimage.jpeg' width='80'>";
                                                } ?>
                                                    </td>
                                                                        
                                                <td width="5px">
                                                    <a href="edittravel.php?ubah=<?php echo $row["graceID"]?>" class="btn btn-success btn-sm" title="edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td width="5px">
                                                    <a href="hapustravel.php?hapus=<?php echo $row["graceID"]?>" class="btn btn-danger btn-sm" title="hapus">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6a.5.5 0 0 0-.5-.5Z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $nomor =$nomor + 1; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="table-container" ;>
                <?php include "include/footer.php"; ?>
            </div>
        </div>
    </div>
    <?php include "include/scriptjs.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>
</html>
