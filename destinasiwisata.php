<!DOCTYPE html>
<html>
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['useremail']))
        header ("location:login.php");
    ?>
    <?php include "include/head.php"; ?>
    <body class="sb-nav-fixed">
        <?php include "include/menubar.php"; ?>
        <div id="layoutSidenav">
        <?php include "include/menunav.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Destinasi Wisata</h1>
                        <ol class="breadcrumb mb-4">
                           
                        </ol>
    <?php
include 'include/config.php';
if(isset($_POST['Simpan']))
{
$destinasiKODE = $_POST['kodedestinasi'];
$destinasiNAMA = $_POST['namadestinasi'];
$destinasiKET = $_POST['destinasiKET'];
$kategoriKODE = $_POST['kodekategori'];
$destinasiFOTO = $_POST['destinasiFOTO'];
$file_tmp=$_FILES["file"]["tmp_name"];


mysqli_query($connection, "insert into destinasi values ('$destinasiKODE', '$destinasiNAMA',  '$destinasiKET',  '$destinasiFOTO','$kategoriKODE')");
header("location:destinasiwisata.php");

 

}
$datakategori = mysqli_query($connection, "select * from kategoriwisata");

 

?>

    <head>
        <title>DESTINASI WISATA</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    </head>
    <body>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <form method="POST">
                    <div class="mb-3 row">
                        <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kodedestinasi" id="kodedestinasi">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namadestinasi" id="namadestinasi">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="destinasiKET" class="col-sm-2 col-form-label">Ket Destinasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="destinasiKET" id="destinasiKET">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
			            <label for="file" class="col-sm-2 col-form-label">Foto Destinasi</label>
			                <div class="col-sm-10">
				                <input type="file" id="file" name="destinasiFOTO">
			                                </div>
		                                </div>

                    <div class="mb-3 row">
                        <label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kodekategori" id="kodekategori">
                                <option>Kode Kategori</option>
                                <?php while($row = mysqli_fetch_array($datakategori))
{
?>
                                <option value="<?php echo $row["kategoriKODE"]?>">
                                    <?php echo $row["kategoriKODE"]?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-secondary">
                            <input type="reset" class="btn btn-success" value="Batal" name="Batal">
                        </div>
                    </div>
                    </div>
                </form>

                
<form method="POST">
    <div class="mb-3">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3">Nama Destinasi</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Destinasi">
            </div>
            <div class="col-sm-1">
                <!-- Perubahan disini: -->
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
      <th scope="col">Keterangan Destinasi</th>
      <th scope="col">Foto Destinasi</th>
      <th scpe="col">Kode Kategori</th>
      <th colspan ="2" stlye="text-align=center" >Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if (isset($_POST["kirim"])) {
        $search = $_POST['search'];
        $query = mysqli_query($connection, "SELECT destinasi.* FROM destinasi WHERE destinasiNAMA LIKE '%" . $search . "%'");
    } else {
        $query = mysqli_query($connection, "SELECT destinasi.* FROM destinasi");
    }
//end pencarian
       $nomor = 1;

       while ($row = mysqli_fetch_array($query))
       {
     ?>
    <tr>
      <td><?php echo $nomor;?></td>
      <td><?php echo $row ['destinasiKODE'];?></td>
      <td><?php echo $row['destinasiNAMA'];?></td>
      <td><?php echo $row['destinasiKET'];?></td>
      <td>
      <?php if (!empty($row) && isset($row['destinasiFOTO']) && is_file("images/" . $row['destinasiFOTO'])) { ?>
                    <img src="images/<?php echo $row['destinasiFOTO'] ?>" width="80">
                <?php } else {
                    echo "<img src='images/noimage.jpeg' width='80'>";
                } ?>
                    
    </td>
      <td><?php echo $row ['kategoriKODE'];?></td>
    <td width ="5px">
      <a href="editdestinasi.php?ubah=<?php echo $row["destinasiKODE"]?>"
      class="btn btn-success btn-sm" tittle ="edit">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
       </td>

       <td width ="5px">
    <a href="hapusdestinasi.php?hapus=<?php echo $row["destinasiKODE"]?>" class="btn btn-danger btn-sm" title="hapus">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
        </svg>
    </a>
</td>
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

        <script
            type="text/javascript"
            scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
    </body>
</html>