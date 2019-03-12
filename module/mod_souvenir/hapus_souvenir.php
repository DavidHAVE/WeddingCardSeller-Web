<?php
session_start();
include "config/koneksi.php";

$query = "SELECT * FROM souvenir WHERE souvenir_id = '$_GET[id]'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {
$r = mysqli_fetch_array($hasil);

if ($r['image_url']=="") {
	$hapus = "DELETE FROM souvenir WHERE souvenir_id = '$_GET[id]'";
	mysqli_query($konek, $hapus);
	header("location:hero.php?module=souvenir");
}
else{
	unlink("files/$r[image_url]");
	// unlink("../../foto_item/small_$r[image_url]");

	$hapus = "DELETE FROM souvenir WHERE souvenir_id = '$_GET[id]'";
	mysqli_query($konek, $hapus);
	header("location:hero.php?module=souvenir");
}
}else{
	echo "Gagal Menghapus";
}

?>