<?php
session_start();
include "config/koneksi.php";

$query = "SELECT * FROM orders WHERE order_id = '$_GET[order_id]'";
$hasil = mysqli_query($konek, $query);
$r = mysqli_fetch_array($hasil);

if ($hasil) {
	$hapus = "DELETE FROM orders WHERE order_id = '$_GET[order_id]'";
	$sql = mysqli_query($konek, $hapus);
	if ($sql) {
		header("location:hero.php?module=monitor");
	}else{
		echo "Gagal menghapus";
	}
}else{
	echo "Sduah terhapus";
}
?>