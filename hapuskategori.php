<?php
include "include/config.php";

if (isset($_GET['hapus'])) {
    $destinasiKODE = $_GET["hapus"];
    
    // Membuat prepared statement untuk melakukan penghapusan
    $stmt = mysqli_prepare($connection, "DELETE FROM destinasi WHERE destinasiKODE = ?");
    mysqli_stmt_bind_param($stmt, 's', $destinasiKODE);
    mysqli_stmt_execute($stmt);

    // Memeriksa apakah penghapusan berhasil
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('DATA BERHASIL DIHAPUS'); document.location='kategoriwisata.php'</script>";
    } else {
        $error = mysqli_stmt_error($stmt);
        echo "<script>alert('GAGAL MENGHAPUS DATA: $error'); document.location='kategoriwisata.php'</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    // Redirect jika parameter 'hapus' tidak tersedia
    header("location:kategoriwisata.php");
}
?>
