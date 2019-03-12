<?php
session_start();
include "../../config/koneksi.php";
// include "config/fungsi_thumbnail.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$foto = $_POST['foto'];
// $lokasi_file = $_FILES['fupload'] ['tmp_name'];
// $nama_file = $_FILES['fupload'] ['name'];

$foto = $_FILES['fupload']['name'];
$tmp = $_FILES['fupload']['tmp_name'];

// $acak = rand(1, 99);
// $nama_gambar = $acak.$nama_file;

$query = "SELECT * FROM item WHERE item_id = '$id'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {
$r = mysqli_fetch_array($hasil);


if (empty($tmp)) {
	$edit = "UPDATE item SET name = '$nama',
	description = '$deskripsi',
	price = '$harga'
	WHERE item_id = '$id'";

	$sql = mysqli_query($konek, $edit);
	if ($sql) {
		header("location:../../hero.php?module=item");
	}else{
		echo "Gagal mengubah";
	}
}else{

	unlink("files/$r[image_url]");
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
	$edit = "UPDATE item SET name = '$nama',
	description = '$deksripsi',
	price = '$harga',
	image_url = '$fotobaru'
	WHERE item_id = '$id'";

	$sql = mysqli_query($konek, $edit);
	if ($sql) {
	header("location:../../hero.php?module=item");
}else{
	echo "Gagal mengubah";
}
}else{
	echo "Gagal upload gambar";
}
}
}
?>