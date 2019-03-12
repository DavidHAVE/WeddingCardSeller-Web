<?php
session_start();
include "config/koneksi.php";

$query = "SELECT * FROM addon WHERE addon_id = '$_GET[id]'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {

	$r = mysqli_fetch_array($hasil);

	$hapus = "DELETE FROM addon WHERE addon_id = '$_GET[id]'";

	$hasil = mysqli_query($konek, $hapus);


	if ($hasil) {
		header("location:hero.php?module=addon");
	}else{
		echo "Gagal menghapus";
	}

}else{
	echo "Gagal Membaca";
}

?>