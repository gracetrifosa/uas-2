<!DOCTYPE html>
<html>

<?php
include "include/config.php";

if (isset($_POST['Simpan'])) {
    $destinasiKODE = $_POST['destinasikode'];
    $destinasiNAMA = $_POST['destinasinama'];
    $kategoriNAMA = $_POST['kategorinama'];


    $insert_query = "INSERT INTO destinasi VALUES ('$destinasiKODE', '$destinasiNAMA', '$kategoriNAMA')";
    if (mysqli_query($connection, $insert_query)) {
        echo "Data berhasil disimpan.";
    } 
    else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }
}

if (isset($_POST["KirimNama"])) {
    $searchNama = $_POST['SearchNama'];

    $query = mysqli_query($connection, "SELECT destinasi * FROM destinasi
            WHERE hotelNAMA LIKE '%$searchNama%'");
} 

else if (isset($_POST["KirimAlamat"])) {
    $searchAlamat = $_POST['SearchAlamat'];

    $query = mysqli_query($connection, "SELECT hotel.* FROM hotel 
            WHERE hotelALAMAT LIKE '%$searchAlamat%'");
} 

else {
    $query = mysqli_query($connection, "SELECT hotel.* FROM hotel");
}

$nomor = 1; 

$hotelKODE = $_GET["ubah"];
$editkategori = mysqli_query ($connection, "select * from hotel
  where user_id = '$hotelKODE'");
$rowedit = mysqli_fetch_array($editkategori);
?>




<head>
    <title>KATEGORI WISATA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
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
                        <h1 class="mt-4">Edit Kategori Wisata</h1>   
                        <ol class="breadcrumb mb-4">
                           
                        </ol>

<body>

    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10 ">
            <form method="POST">

                <div class="mb-3 row">
                    <label for="kodehotel" class="col-sm-2 col-form-label">Kode Hotel</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="hotelkode" placeholder="Kode Hotel" value="<?php echo $rowedit ["hotelKODE"]?>"readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="hotelnama" class="col-sm-2 col-form-label">Nama Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="hotelnama" placeholder="Nama Hotel">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="hotelalamat" class="col-sm-2 col-form-label">Alamat Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="hotelalamat" placeholder="Alamat Hotel">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-2 style="margin-bottom: 20px;></div>
                    <div class="col-sm-7">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                        <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                    </div>
                </div>

            </form>



            <?php
            if (mysqli_num_rows($query) > 0) {
            ?>
                <div class="jumbotron mt-10 mt-4">
                    <h1 class="display-10">Data Entri Hotel</h1>
                    <table class="table">

<thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Hotel</th>
        <th scope="col">Nama Hotel</th>
        <th scope="col">Alamat Hotel</th>
        <th colspan="2" style="text-align: center">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $row['hotelKODE']; ?></td>
            <td><?php echo $row['hotelNAMA']; ?></td>
            <td><?php echo $row['hotelALAMAT']; ?></td>

                            <td width="10px">
                            <a href="editkategori.php?ubah=<?php echo $row["hotelKODE"]?>" class ="btn btn-success btn-sm" title=" edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            <td width="10px">
                            <a href="hapuskategori.php?id=<?php echo $row["hotelKODE"]; ?>" class="btn btn-danger btn-sm" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser-fill" viewBox="0 0 16 16">
                            <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                            </svg>
                            </td>
                            </tr>
                            </td>
        </tr>
    <?php $nomor = $nomor + 1;
    } ?>
</tbody>

                    </table>
                </div>
            <?php } else {
                echo "";
            } ?>

        </div>
        </div>
                </main>
                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <?php include "include/scriptjs.php"; ?>
    </body>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    </body>

    </html>