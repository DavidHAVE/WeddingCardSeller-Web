<?php
session_start();
include "../../config/koneksi.php";
// include "config/fungsi_thumbnail.php";

// $total = $_POST['total'];
// $diskon = $_POST['diskon'];

if (isset($_POST['id'])) {

				$order_id = $_POST['id'];
				$full_name_m = $_POST['fullNameM'];
				$nick_name_m = $_POST['nickNameM'];
				$father_full_name_m = $_POST['fatherFullNameM'];
				$mother_name_m = $_POST['motherNameM'];
				$parent_address_m = $_POST['parentAddressM'];
				$full_name_w = $_POST['fullNameW'];
				$nick_name_w = $_POST['nickNameW'];
				$father_full_name_w = $_POST['fatherFullNameW'];
				$mother_name_w = $_POST['motherNameW'];
				$parent_address_w = $_POST['parentAddressW'];

				$day_and_date = $_POST['dayAndDate'];
				$wedding_time = $_POST['time'];
				$place = $_POST['place'];
				$wedding_card_quantity = $_POST['weddingCardQuantity'];
				$order_time = $_POST['orderTime'];
				$order_price = $_POST['order_price'];
				$full_name_o = $_POST['fullNameO'];
				$nick_name_o = $_POST['nickNameO'];
				$email_o = $_POST['emailO'];
				$telephone_o = $_POST['telephoneO'];


$foto = $_POST['foto'];
// $lokasi_file = $_FILES['fupload'] ['tmp_name'];
// $nama_file = $_FILES['fupload'] ['name'];

$foto = $_FILES['fupload']['name'];
$tmp = $_FILES['fupload']['tmp_name'];

// $acak = rand(1, 99);
// $nama_gambar = $acak.$nama_file;

$query = "SELECT * FROM orders WHERE order_id = '$order_id'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {
$r = mysqli_fetch_array($hasil);
$design_url = $r['design_url'];

if (empty($tmp)) {


	$edit = "UPDATE orders SET full_name_m = '$full_name_m',
	nick_name_m = '$nick_name_m',
	father_full_name_m = '$father_full_name_m',
	mother_name_m = '$mother_name_m',
	parent_address_m = '$parent_address_m',
	full_name_w = '$full_name_w',
	nick_name_w = '$nick_name_w',
	father_full_name_w = '$father_full_name_w',
	mother_name_w = '$mother_name_w',
	parent_address_w = '$parent_address_w',
	day_and_date = '$day_and_date',
	wedding_time = '$wedding_time',
	place = '$place',
	wedding_card_quantity = '$wedding_card_quantity',
	order_time = '$order_time',
	order_price = '$order_price',
	full_name_o = '$full_name_o',
	nick_name_o = '$nick_name_o',
	email_o = '$email_o',
	telephone_o = '$telephone_o'
	WHERE order_id = '$order_id'";


	$sql = mysqli_query($konek, $edit);
	if ($sql) {
		header("location:../../hero.php?module=monitor");
	}else{
		echo "Gagal mengubah";
	}

}else{

	// $query = "SELECT design_url FROM orders WHERE order_id = '$id'";
	// $hasil = mysqli_query($konek, $query);

	// if ($hasil) {
	// $r = mysqli_fetch_array($hasil);
if (empty($design_url)) {

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "files/".$fotobaru;

// Proses upload
// $root = getcwd();
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak


	$edit = "UPDATE orders SET full_name_m = '$full_name_m',
	nick_name_m = '$nick_name_m',
	father_full_name_m = '$father_full_name_m',
	mother_name_m = '$mother_name_m',
	parent_address_m = '$parent_address_m',
	full_name_w = '$full_name_w',
	nick_name_w = '$nick_name_w',
	father_full_name_w = '$father_full_name_w',
	mother_name_w = '$mother_name_w',
	parent_address_w = '$parent_address_w',
	day_and_date = '$day_and_date',
	wedding_time = '$wedding_time',
	place = '$place',
	wedding_card_quantity = '$wedding_card_quantity',
	order_time = '$order_time',
	order_price = '$order_price',
	full_name_o = '$full_name_o',
	nick_name_o = '$nick_name_o',
	email_o = '$email_o',
	telephone_o = '$telephone_o',
	design_url = '$fotobaru'
	WHERE order_id = '$order_id'";


	$sql = mysqli_query($konek, $edit);
	if ($sql) {
		header("location:../../hero.php?module=monitor");
	}else{
		echo "Gagal mengubah";
	}
	}else{
		echo "Gagal upload gambar";
	}

}else{

	unlink("files/$r[design_url]");
	// UploadImage($nama_gambar);
	// $acak = rand(1, 99);
	// $nama_gambar = $acak.$foto;
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "files/".$fotobaru;

// Proses upload
// $root = getcwd();
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak


	$edit = "UPDATE orders SET full_name_m = '$full_name_m',
	nick_name_m = '$nick_name_m',
	father_full_name_m = '$father_full_name_m',
	mother_name_m = '$mother_name_m',
	parent_address_m = '$parent_address_m',
	full_name_w = '$full_name_w',
	nick_name_w = '$nick_name_w',
	father_full_name_w = '$father_full_name_w',
	mother_name_w = '$mother_name_w',
	parent_address_w = '$parent_address_w',
	day_and_date = '$day_and_date',
	wedding_time = '$wedding_time',
	place = '$place',
	wedding_card_quantity = '$wedding_card_quantity',
	order_time = '$order_time',
	full_name_o = '$full_name_o',
	nick_name_o = '$nick_name_o',
	email_o = '$email_o',
	telephone_o = '$telephone_o',
	design_url = '$fotobaru'
	WHERE order_id = '$order_id'";


	$sql = mysqli_query($konek, $edit);
	if ($sql) {
		header("location:../../hero.php?module=monitor");
	}else{
		echo "Gagal mengubah";
	}
	}else{
		echo "Gagal upload gambar";
	}
}

}
}
}
?>