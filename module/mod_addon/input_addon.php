<?php
session_start();
include "../../config/koneksi.php";
// include "../../config/fungsi_thumbnail.php";

$username = $_SESSION['namaadmin'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];


	$input = "INSERT INTO addon(name, price) VALUES ('$nama', '$harga')";

	$sql = mysqli_query($konek, $input);

	if ($sql) {
		header("location:../../hero.php?module=addon");
	}else{
		echo "Menyimpan di database gagal.";
	}
?>