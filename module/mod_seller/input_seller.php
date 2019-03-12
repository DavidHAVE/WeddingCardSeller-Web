<?php
session_start();
include "../../config/koneksi.php";

$username = $_SESSION['namaadmin'];
$nama = $_POST['nama'];
$sandi = $_POST['sandi'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$kota = $_POST['kota'];
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

if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak


	$input = "INSERT INTO seller(username, password, email, telephone, city, buyer_amount, banner_url) VALUES ('$nama', '$sandi', '$email', '$telepon', '$kota', '0', '$fotobaru')";

	$sql = mysqli_query($konek, $input);



	if ($sql) {

		$query = "SELECT * FROM seller WHERE username = '$nama'";
		$hasil = mysqli_query($konek, $query);

		if ($hasil) {
		$r = mysqli_fetch_array($hasil);
		$seller_id_fk = $r['seller_id'];


		$today = date("d.m.y");     

		$income_total = 0;
		$month = $today;
		$month_buyer_amount = 0;
		$month_income = 0;
		$month_salary = 0;


				$insert_report = "INSERT INTO report(income_total, month, month_buyer_amount, month_income, month_salary, seller_id_fk) VALUES ('$income_total', '$month', '$month_buyer_amount', '$month_income', '$month_salary', '$seller_id_fk')";

				$sql_report = mysqli_query($konek, $insert_report);

				if ($sql_report) {
					header("location:../../hero.php?module=seller");
				}

		}else{
			echo "Menyimpan di database gagal.";
		}
	}
}else{
	echo "Gambar gagal diupload.";
}
?>