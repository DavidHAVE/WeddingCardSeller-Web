<?php
session_start();
include "../../config/koneksi.php";
// include "../../config/fungsi_thumbnail.php";

$username = $_SESSION['namaadmin'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$lokasi_file = $_FILES['fupload'] ['tmp_name'];
// $tipe_file = $_FILES['fupload'] ['type'];
// $nama_file = $_FILES['fupload'] ['name'];

// $acak = rand(1, 99);
// $nama_gambar = $acak.$nama_file;


$foto = $_FILES['fupload']['name'];
$tmp = $_FILES['fupload']['tmp_name'];

// $acak = rand(1, 99);
// $nama_gambar = $acak.$foto;
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "files/".$fotobaru;
// Proses upload
// $root = getcwd();
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

	$input = "INSERT INTO souvenir(name, price, image_url) VALUES ('$nama', '$harga', '$fotobaru')";

	$sql = mysqli_query($konek, $input);

	if ($sql) {
		header("location:../../hero.php?module=souvenir");
	}else{
		echo "Menyimpan di database gagal.";
	}
	}else{
		echo "Gambar gagal diupload.";
	}
?>