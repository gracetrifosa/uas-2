<!DOCTYPE html>
<html>
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['useremail']))
        header ("location:login.php");
    ?>
    <?php include "include/head.php"; ?>

    <main>
    <body class="sb-nav-fixed">
        <?php include "include/menubar.php"; ?>
        <div id="layoutSidenav">
        <?php include "include/menunav.php"; ?>
            <div id="layoutSidenav_content">

        <main>
            <div class="col-sm-10">
                        
                        <ol class="breadcrumb mb-4">
                        </ol>

 
<?php
include "include/config.php";
if (isset($_POST['Simpan'])) {
    $kategoriKODE = $_POST['inputKategoriKode'];
    $kategoriNAMA = $_POST['inputKategoriNama'];
    $kategoriKET = $_POST['inputKategoriKeterangan'];
    $kategoriREFERENCE = $_POST['inputKategoriReference'];
 
    mysqli_query($connection, "INSERT INTO kategoriwisata VALUES ('$kategoriKODE',  '$kategoriNAMA',  '$kategoriKET', '$kategoriREFERENCE')");
    header("location:kategoriwisata.php");
}
 

$query = mysqli_query($connection, "SELECT * FROM kategoriwisata");
?>
 
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <title>Kategori Wisata</title>
</head>
 
<?php include "include/head.php"; ?>
 
<body>
<div class="ml-2">
    <!-- <?php include "include/navbar.php"; ?>
    <div id="layoutSidenav"> -->
        <?php include "include/menu.php"; ?>

 
            
 
                <!--ini bagian kerja kita -->
                <div class="row">
                    <!-- <div class="col-sm-1"></div> -->

                    <div class="col-sm-10 mx-auto">
                        <h1 class="mt-4 mb-4">Kategori Wisata</h1>
                        <form method="POST" class="mx-auto form-container style="max-width: 600px">
 
                            <div class="form-group row">
                                <label for="kategoriKODE" class="col-sm-3 col-form-label">Kode Kategori Wisata</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategoriKODE" name="inputKategoriKode" placeholder="Kode Kategori Wisata">
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="kategoriNAMA" class="col-sm-3 col-form-label">Nama Kategori Wisata</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategoriNAMA" name="inputKategoriNama" placeholder="Inputkan nama Kategori Wisata">
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="kategorKET" class="col-sm-3 col-form-label">Keterangan Kategori Wisata</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategoriKET" name="inputKategoriKeterangan" placeholder="Keterangan Kategori Wisata">
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="kategoriREFERENCE" class="col-sm-3 col-form-label">Referensi Kategori Wisata</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategoriREFERENCE" name="inputKategoriReference" placeholder="Referensi Kategori Wisata">
                                </div>
                            </div>
 
                            <input class="btn btn-primary" type="submit" value="Simpan" name="Simpan">
                            <input class="btn btn-primary" type="reset" value="Reset">
 
                        </form>
                       
 
                        <!-- ini akhir pekerjaan kita-->
 
                        <div class  ="jumbotrom mt-5">
                            <h1 class="mt-4 mx-auto" >Hasil Entri Kategori Wisata</h1>
                        </div>
                        <table class="table table-hover table-light mx-auto style="max-width: 600px">
                            <thead class="thead-light">
                                <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kategori</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Keterangan Kategori</th>
                        <th scope="col">Referensi Kategori</th>
                        <th colspan ="2" style="text-align=center">Aksi</th>
                        </tr>
                                </tr>
                            </thead>
 
                            <tbody>
                              <?php
                              $nomor = 1;
                              while ($row = mysqli_fetch_array($query)) {
                                  ?>
                                  <tr>
                                      <td><?php echo $nomor; ?></td>
                                      <td><?php echo $row['kategoriKODE']; ?></td>
                                      <td><?php echo $row['kategoriNAMA']; ?></td>
                                      <td><?php echo $row['kategoriKET']; ?></td>
                                      <td><?php echo $row['kategoriREFERENCE']; ?></td>
                                      
                                      <td width ="5px">
                                      <a href="editkategori.php?ubah=<?php echo $row["destinasiKODE"]?>"
                                        class="btn btn-success btn-sm" tittle ="edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                        </td>

                                        <td width ="5px">
                                        <a href="hapuskategori.php?hapus=<?php echo $row["destinasiKODE"]?>" class="btn btn-danger btn-sm" title="hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                             </a>
    
                                      <!-- <td width="5px">
                                          <a href="kategoriwisataedit.php?ubah=<?php echo $row["kategoriKODE"] ?>"
                                            class="btn btn-success btn-sm" title="edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                          </a>
                                      </td>
 
                                      <td width="5px">
                                          <a href="kategoriwisatahapus.php?hapus=<?php echo $row["kategoriKODE"] ?>"
                                            class="btn btn-danger btn-sm" title="hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                            </svg>
                                          </a>
                                      </td>
                                  </tr> -->
                                  <?php
                                  $nomor = $nomor + 1;
                              }
                              ?>
                            </tbody>
 
                        </table>
 
                        <!-- SAMPE SINI FORM DESTINASI -->
 
                            </div>
                        </div>
            </main>
            <?php include "include/footer.php"; ?>
            </div>
    </div> 
    <?php include "include/scriptjs.php"; ?>
 
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
 
</html>