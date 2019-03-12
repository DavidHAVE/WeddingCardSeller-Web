<?php
session_start();
include "../../config/koneksi.php";

$username = $_SESSION['namaadmin'];
$total = $_POST['total'];
$discount = $_POST['discount'];

	$input = "INSERT INTO discount(total, discount) VALUES ('$total', '$discount')";

	$sql = mysqli_query($konek, $input);

	if ($sql) {
		header("location:../../hero.php?module=discount");
	}else{
		echo "Menyimpan di database gagal.";
	}

?>