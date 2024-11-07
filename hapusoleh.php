<?php
    include "include/config.php";
    if(isset($_GET['hapus']))
    {
        $kodekategori = $_GET["hapus"];
        mysqli_query($connection, "delete from oleholeh
        where olehKODE = '$kodekategori'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
            document.location='oleholeh.php'</script>";
    }
?>