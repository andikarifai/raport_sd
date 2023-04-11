<?php
session_start();
include_once('../template/header.php');
include_once('../../../function.php');

if(isset($_GET['kls'])) {
  $klas = $_GET['kls'];
  echo "Nilai variabel kls adalah " . $klas;
} else {
  $klas = null;
}

if(isset($_GET['kd_raport'])) {
  $id = decryptId($_GET['kd_raport']);
  
  // Prepare the SQL statement with parameterized query
  $hapus = "DELETE FROM nilai WHERE kd_raport = ?";
  $stmt = mysqli_prepare($koneksi, $hapus);
  
  // Bind the parameter to the statement
  mysqli_stmt_bind_param($stmt, "i", $id);
  
  // Execute the statement
  if (mysqli_stmt_execute($stmt)) {
    // Redirect user back to index page with kls parameter
    if ($klas) {
      echo "<script>alert('Data berhasil dihapus'); window.location.replace('index.php?kls={$klas}');</script>";
    } else {
      echo "<script>alert('Data berhasil dihapus'); window.location.replace('index.php?kls=null');</script>";
    }
    exit();
  } else {
    echo "Gagal menghapus data";
  }
  
  // Close the statement
  mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($koneksi);
