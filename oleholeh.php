<!DOCTYPE html>
<html lang="en">
<head>
    <title>OLEH-OLEH</title>
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
                                    <h1 class="display-10">Pusat Oleh-Oleh</h1>
                                </div>
                            </div>

                            <?php
                            include "include/config.php";

                            if (isset($_POST['Simpan'])) {
                                $olehKODE = $_POST['kodeoleh'];
                                $olehNAMA = $_POST['namaoleh'];
                                $olehJENIS = $_POST['jenisoleh'];
                                $fotoolehFILE = $_FILES['fotooleh'];
                                $file_tmp=$_FILES["file"]["tmp_name"];

                                mysqli_query($connection, "INSERT INTO oleholeh VALUES ('$olehKODE', '$olehNAMA', '$olehJENIS', '$fotoolehFILE')");
                            }
                            ?>

            <div class="mx-auto">
                <div class="card mb-3">
                    <div class="card-header text-white bg-secondary">
                    Oleh-Oleh Khas Terkini
                        </div>
                            <div class="card-body">
                                <form action="" method="POST">

                            <div class="mb-3 row">
                                            <label for="user_id" class="col-sm-2 col-form-label">Kode Oleh-Oleh</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="kodeoleh" placeholder="Kode Oleh-Oleh">
                                            </div>
                                        </div>

                            <div class="mb-3 row">
                                        <label for="user_id" class="col-sm-2 col-form-label">Nama Oleh-Oleh</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="namaoleh" placeholder="Nama Oleh-Oleh">
                                            </div>
                                        </div>

                            <div class="mb-3 row">
                                        <label for="user_id" class="col-sm-2 col-form-label">Jenis Oleh-Oleh</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="jenisoleh" placeholder="Jenis Oleh-Oleh">
                                            </div>
                                        </div>

                            <div class="form-group row">
			                            <label for="file" class="col-sm-2 col-form-label">Foto Oleh-Oleh</label>
			                            <div class="col-sm-10">
				                            <input type="file" id="file" name="fotooleh">
			                                </div>
		                                </div>

    


                                        <div class="form-group row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-7">
                                                <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                                                <input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
                                            </div>
                                        </div>
                                    </form>
                                     
                        </div>
                        </div>
                        </div>



            <!-- membuat tabel -->
            <div class="card mb-3">
                <div class="card-header text-white bg-dark">
                    Hasil Data Oleh-Oleh
                        </div>
                            
                        <div class="card-body">
                        <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Oleh-Oleh</th>
                        <th scope="col">Nama Oleh-Oleh</th>
                        <th scope="col">Jenis Oleh-Oleh</th>
                        <th scope="col">Foto Oleh-Oleh</th>
                        <th scope="col">Aksi</th>
                        </tr>

                     
                        
                    </thead>
                    <tbody>
                    <?php 
                    if (isset($_POST["kirim"])) {
                    $search = $_POST['search'];
                    $query = mysqli_query($connection, "SELECT oleholeh.* FROM oleholeh WHERE oleholeh  LIKE '%" . $search . "%'");
                    } else {
                    $query = mysqli_query($connection, "SELECT oleholeh.* FROM oleholeh");
                    }
                    //end pencarian
                    $nomor = 1;

                    while ($row = mysqli_fetch_array($query))
                    {
                    ?>
                    <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row ['olehKODE'];?></td>
                    <td><?php echo $row['olehNAMA'];?></td>
                    <td><?php echo $row ['olehJENIS'];?></td>
                 


                    <td>
                <?php if (!empty($row) && isset($row['fotoolehFILE']) && is_file("images/" . $row['fotoolehFILE'])) { ?>
                    <img src="images/<?php echo $row['fotoolehFILE'] ?>" width="80">
                <?php } else {
                    echo "<img src='images/noimage.jpeg' width='80'>";
                } ?>
                    </td>
          
            
                    <td width ="5px">
                    <a href="editoleh.php?ubah=<?php echo $row["olehKODE"]?>"
                    class="btn btn-success btn-sm" tittle ="edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    </td>

                    <td width ="5px">
                    <a href="hapusoleh.php?hapus=<?php echo $row["olehKODE"]?>" class="btn btn-danger btn-sm" title="hapus">
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
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="table-container" ;">
            <?php include "include/footer.php"; ?>
        </div>
    </div>
    <?php include "include/scriptjs.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>

                    </table>
                        </div>

                       
</html>

