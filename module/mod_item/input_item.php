<?php
session_start();
include "../../config/koneksi.php";
// include "../../config/fungsi_thumbnail.php";

$username = $_SESSION['namaadmin'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
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

// if ($tipe_file != 'image/jpeg' AND $tipe_file != "image/pjpeg") {
	// echo "Upload Gagal, file yang diupload harus bertipe JPG";
// }else{
	// UploadImage($nama_gambar);

	// $gbr_asli = imagecreatefromjpeg($file_upload);
	// $lebar = imageSX($gbr_asli);
	// $tinggi = imageSY($gbr_asli);

	// $thumb_lebar = 110;s
	// $thumb_tinggi = ($thumb_lebar/$lebar) * $tinggi;

	// $gbr_thumb = imagecreatetruecolor($thumb_lebar, $thumb_tinggi);
	// imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

	// imagejpeg($gbr_thumb, $folder . "$thumb_" . $fupload_name);

	// imagedestroy($gbr_asli);
	// imagedestroy($gbr_thumb);

	$input = "INSERT INTO item(name, description, price, image_url) VALUES ('$nama', '$deskripsi', '$harga', '$fotobaru')";

	$sql = mysqli_query($konek, $input);

	if ($sql) {
	header("location:../../hero.php?module=item");
}else{
echo "Menyimpan di database gagal.";
}
}else{
	echo "Gambar gagal diupload.";
}
?>