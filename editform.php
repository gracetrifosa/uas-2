<!DOCTYPE html>
<html lang="en">
<head>
    <title>BERITA</title>
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
                <h1 class="mt-4">Edit Berita</h1>
                    <ol class="breadcrumb mb-4">
                        
                    </ol>

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-15">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-10"></h1>
                                </div>
                            </div>

                            <?php
                            include "include/config.php";

                            if (isset($_POST['Edit'])) {
                                $user_id = $_POST['userid'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $berita = $_POST['berita'];

                                
                                mysqli_query($connection, "update form set firstname ='$firstname', lastname='$lastname', berita='$berita'
                                    where user_id='$user_id'");
                                        header("location:form.php");
                            }
                            $user_id = $_GET["ubah"];
  $editform = mysqli_query ($connection, "select * from form
    where user_id = '$user_id'");
  $rowedit = mysqli_fetch_array($editform);
                            ?>

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <form method="POST">


                                        <div class="mb-3 row">
                                            <label for="user_id" class="col-sm-2 col-form-label">Kode Berita</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="userid" placeholder="No Reservasi" value="<?php echo $rowedit ["user_id"]?>"readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="firstname" class="col-sm-2 col-form-label">Nama Depan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="firstname" placeholder="Nama Depan">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="lastname" class="col-sm-2 col-form-label">Nama Belakang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="lastname" placeholder="Nama Belakang">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="berita" class="col-sm-2 col-form-label">Berita</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="berita" placeholder="Berita">
                                            </div>
                                        </div>


                                       <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                        <input type="submit" name="Edit" class="btn btn-primary mb-3" value="Edit">
                                        <input type="submit" name="Batal" class="btn btn-secondary mb-3" value="Batal">

                                            </div>

                                        
                                        <body>

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-90">

                            
                            </form>

    

        <table class="table table-hover table-secondary">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Reservasi</th>
                    <th scope="col">Nama Depan</th>
                    <th scope="col">Nama Belakang</th>
                    <th scpe="col">Berita</th>
                    <th colspan ="2" stlye="text-align=center">Aksi</th>
                    </tr>
            </thead>

                    <tbody>
                    <?php 
                    if (isset($_POST["kirim"])) {
                    $search = $_POST['search'];
                    $query = mysqli_query($connection, "SELECT form.* FROM form WHERE form  LIKE '%" . $search . "%'");
                    } else {
                    $query = mysqli_query($connection, "SELECT form.* FROM form");
                    }
                    //end pencarian
                    $nomor = 1;

                    while ($row = mysqli_fetch_array($query))
                    {
                    ?>
                    <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row ['user_id'];?></td>
                    <td><?php echo $row ['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row ['berita'];?></td>
                    
                    <td width="5px">                      
                        <a href="edit.php?ubah=<?php echo $row["user_id"]?>"
                            class="btn btn-success btn-sm" title="edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        </td>

                        <td width="5px">
                        <a href="hapusform.php?hapus=<?php echo $row["user_id"]?>"
                            class="btn btn-danger btn-sm" title="hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
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
            <?php include "include/footer.php"; ?>
        </div>
    </div>
    <?php include "include/scriptjs.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>

                
 </html>
