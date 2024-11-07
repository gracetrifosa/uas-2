<!DOCTYPE html>
<html lang="en">

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

                    <ol class="breadcrumb mb-4">

                    </ol>

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">

                            <div class="jumbotron mt-2">
                                <h1 class="display-12">BERITA</h1>
                                <table class="table">

                                    <form method="POST">
                                        <div class="mb-3">
                                            <div class="form-group row mb-2">
                                                <label for="search" class="col-sm-3">Kode Berita</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Kode Berita">
                                                </div>
                                                <div class="col-sm-1">
                                                    <input type="submit" name="kirim" class="btn btn-success" value="Cari">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table table-hover table-secondary">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Berita</th>
                                                <th scope="col">Nama Depan</th>
                                                <th scope="col">Nama Belakang</th>
                                                <th scope="col">Berita</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'include/config.php';

                                            if (isset($_POST["kirim"])) {
                                                $search = $_POST['search'];
                                                $query = mysqli_query($connection, "SELECT * FROM form WHERE user_id LIKE '%" . $search . "%'");
                                            } else {
                                                $query = mysqli_query($connection, "SELECT * FROM form");
                                            }

                                            if (!$query) {
                                                die(mysqli_error($connection));  // Tampilkan pesan kesalahan jika query gagal
                                            }

                                            $nomor = 1;

                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?></td>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td><?php echo $row['firstname']; ?></td>
                                                    <td><?php echo $row['lastname']; ?></td>
                                                    <td><?php echo $row['namahotel']; ?></td>
                                                </tr>

                                                <?php $nomor = $nomor + 1; ?>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- penutup clas=col-sm-10 -->
                            </div>
                            <!-- penutup clas=row -->

                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

                            <script>
                                $(document).ready(function () {
                                    $('#user_id').select2(
                                        { closeOnSelect: true, allowClear: true, placeholder: 'Pilih Kategori Wisata' }
                                    );
                                });
                            </script>
                        </div>
                    </div>
                </main>
                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <?php include "include/scriptjs.php"; ?>
</body>

</html>
