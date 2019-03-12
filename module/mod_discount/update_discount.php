<?php
session_start();
include "../../config/koneksi.php";
// include "config/fungsi_thumbnail.php";

$id = $_POST['id'];
$total = $_POST['total'];
$diskon = $_POST['diskon'];


	$edit = "UPDATE discount SET total = '$total',
	discount = '$diskon'
	WHERE discount_id = '$id'";

	$sql = mysqli_query($konek, $edit);
	if ($sql) {
	header("location:../../hero.php?module=discount");
}else{
	echo "Gagal mengubah";
}
?>