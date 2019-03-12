<?php
session_start();
include "../../config/koneksi.php";

$username = $_SESSION['namaadmin'];
$id = $_POST['id'];
$nama = $_POST['nama'];
$sandi = md5($_POST['sandi']);
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$kota = $_POST['kota'];
$foto = $_POST['foto'];
// $lokasi_file = $_FILES['fupload'] ['tmp_name'];
// $nama_file = $_FILES['fupload'] ['name'];

$foto = $_FILES['fupload']['name'];
$tmp = $_FILES['fupload']['tmp_name'];

// $acak = rand(1, 99);
// $nama_gambar = $acak.$nama_file;

$query = "SELECT * FROM seller WHERE seller_id = '$id'";
$hasil = mysqli_query($konek, $query);

if ($hasil) {
$r = mysqli_fetch_array($hasil);

if (empty($tmp)) {
	$edit = "UPDATE seller SET username = '$nama',
	password = '$sandi',
	email = '$email',
	telephone = '$telepon',
	city = '$kota'
	WHERE seller_id = '$id'";

	$sql = mysqli_query($konek, $edit);

    if ($sql) {
		header("location:../../hero.php?module=seller");
	}else{
		echo "Gagal mengubah";
	}
}else{

	unlink("files/$r[banner_url]");
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
	$edit = "UPDATE seller SET username = '$nama',
	password = '$sandi',
	email = '$email',
	telephone = '$telepon',
	city = '$kota',
	banner_url = '$fotobaru'
	WHERE seller_id = '$id'";

	$sql = mysqli_query($konek, $edit);
	if ($sql) {
	header("location:../../hero.php?module=seller");
}else{
	echo "Gagal mengubah";
}
}else{
	echo "Gagal upload gambar";
}
}
}
?>