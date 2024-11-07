<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $destinasiKODE = $_GET["hapus"];
        mysqli_query($connection, "delete from destinasi
        where destinasiKODE = '$destinasiKODE'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='destinasiwisata.php'</script>";
    }
?>