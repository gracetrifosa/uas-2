<!-- edit_photo.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Photo Destinasi Wisata</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

<?php
include "include/config.php";

if (isset($_GET['ubah'])) {
    $kode_foto = $_GET['ubah'];

    $query = mysqli_query($connection, "SELECT * FROM fotodestinasi WHERE kodefoto='$kode_foto'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "Kode foto tidak diberikan.";
    exit;
}

if (isset($_POST['Simpan'])) {
    $kodefoto = $_POST['inputkode'];
    $namafoto = $_POST['inputnama'];

    // Handle photo update
    if ($_FILES['file']['size'] > 0) {
        $namafile = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

        // PERIKSA EKSTENSI FILE HARUS JPG ATAU jpg
        if (($ekstensifile == "jpg") or ($ekstensifile == "JPG")) {
            move_uploaded_file($file_tmp, 'images/' . $namafile);
            mysqli_query($connection, "UPDATE fotodestinasi SET fotodestinasiKODE='$kodefoto', fotodestinasiNAMA='$namafoto', namafile='$namafile' WHERE kodefoto='$kode_foto'");
            header("location:photodestinasi.php");
        } else {
            echo "Ekstensi file harus JPG atau jpg.";
        }
    } else {
        mysqli_query($connection, "UPDATE fotodestinasi SET fotodestinasiKODE='$kodefoto', fotodestinasiNAMA='$namafoto', namafile='$namafile' WHERE kodefoto='$kode_foto'");
        header("location:photodestinasi.php");
    }
}
?>

<div class="row">
    <div class="col-sm-1"></div>

    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Edit Photo Destinasi Wisata</h1>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodefoto" name="inputkode" placeholder="Kode Photo" maxlength="4" value="<?php echo $data['fotodestinasiKODE']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Photo" value="<?php echo $data['fotodestinasiNAMA']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Photo Wisata</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file">
                    <p class="help-block">Field ini digunakan untuk unggah file</p>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
                    <a href="photodestinasi.php" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-1"></div>
</div>

</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>
