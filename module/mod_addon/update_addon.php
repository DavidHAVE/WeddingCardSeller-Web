<?php
session_start();
include "../../config/koneksi.php";
// include "config/fungsi_thumbnail.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

// $acak = rand(1, 99);
// $nama_gambar = $acak.$nama_file;

$query = "SELECT * FROM addon WHERE addon_id = '$id'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {
	$r = mysqli_fetch_array($hasil);

	$edit = "UPDATE addon SET name = '$nama',
	price = '$harga'
	WHERE addon_id = '$id'";

	$sql = mysqli_query($konek, $edit);
	if ($sql) {
		header("location:../../hero.php?module=addon");
	}else{
		echo "Gagal mengubah";
	}
}
?>