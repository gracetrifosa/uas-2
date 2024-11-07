<?php
include "include/config.php";
if (isset($_GET['hapus'])) {
    $kodeFoto = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM fotodestinasi WHERE kodefoto = '$kodeFoto'");
    header("location:photodestinasi.php");
}
?>

