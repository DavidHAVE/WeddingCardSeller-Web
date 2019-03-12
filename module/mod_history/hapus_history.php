<?php
session_start();
include "config/koneksi.php";

$query = "SELECT * FROM report WHERE report_id = '$_GET[report_id]'";
$hasil = mysqli_query($konek, $query);
$r = mysqli_fetch_array($hasil);

if ($hasil) {
	$hapus = "DELETE FROM report WHERE report_id = '$_GET[report_id]'";
	$sql = mysqli_query($konek, $hapus);
	if ($sql) {
		header("location:/web/hero.php?module=report");
	}else{
		echo "Gagal menghapus";
	}
}else{
	echo "Sduah terhapus";
}
?>