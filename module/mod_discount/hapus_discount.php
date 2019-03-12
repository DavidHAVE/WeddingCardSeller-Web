<?php
session_start();
include "config/koneksi.php";

$query = "SELECT * FROM discount WHERE discount_id = '$_GET[id]'";
$hasil = mysqli_query($konek, $query);
$r = mysqli_fetch_array($hasil);

if ($hasil) {
	$hapus = "DELETE FROM discount WHERE discount_id = '$_GET[id]'";
	$sql = mysqli_query($konek, $hapus);
	if ($sql) {
		header("location:/web/hero.php?module=discount");
	}else{
		echo "Gagal menghapus";
	}
}else{
	echo "Sduah terhapus";
}
?>