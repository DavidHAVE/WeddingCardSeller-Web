<?php
session_start();
include "config/koneksi.php";

$query = "SELECT * FROM item WHERE item_id = '$_GET[id]'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {
$r = mysqli_fetch_array($hasil);

if ($r['image_url']=="") {
	$hapus = "DELETE FROM item WHERE item_id = '$_GET[id]'";
	mysqli_query($konek, $hapus);
	header("location:hero.php?module=item");
}
else{
	unlink("files/$r[image_url]");
	// unlink("../../foto_item/small_$r[image_url]");

	$hapus = "DELETE FROM item WHERE item_id = '$_GET[id]'";
	mysqli_query($konek, $hapus);
	header("location:hero.php?module=item");
}
}else{
	echo "Gagal Menghapus";
}

?>