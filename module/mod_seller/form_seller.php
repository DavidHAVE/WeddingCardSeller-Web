<html>
<head>
	<title>Wedding Card</title>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wedding Card</title>
  <link rel="stylesheet" href="../../css/foundation.css" />
  <script src="../../js/vendor/modernizr.js"></script>
</head>
<body>

<?php
include "config/koneksi.php";

if(empty($_SESSION['namaadmin']) AND empty($_SESSION['passadmin'])){
	echo "Untuk mengisi item, Anda harus login dahulu. <br>";
	echo "<a href=\"../../form_login.php\"><b>LOGIN</b></a>";
}
else{
?>
	<h2>Tambah Seller</h2>

<form id="image-form" method="POST" action="module/mod_seller/input_seller.php" enctype="multipart/form-data" data-abide>
	<table width=100% cellpadding="8">
		<input type="hidden" name="id" required>
	<tr>
		<td>Nama</td>
		<td>
			<div class="columns medium-6">
			<input type="text" name="nama" required></td>
			<small class="error">Username harus diisi</small>
		</div>
	</tr>
	<tr>
		<td>Password</td>
		<div class="columns medium-6">
		<td><input type="text" name="sandi" required></td>
		<small class="error">Password harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Email</td>
		<div class="columns medium-6">
		<td><input type="text" name="email" required></td>
		<small class="error">Email harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Telepon</td>
		<div class="columns medium-6">
		<td><input type="text" name="telepon" required></td>
		<small class="error">Nomot telepon harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Kota</td>
		<div class="columns medium-6">
		<td><input type="text" name="kota" required></td>
		<small class="error">Kota harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Banner</td>
		<td>
			<div class="columns medium-6">
			<input type="file" name="fupload">
		</div>
		</td>
	</tr>
	</table>
	
	
    <div class="row">
    	<div class="columns large-7 medium-12">
    		<a href="hero.php?module=seller"><input type="button" value="Batal" class="button small right warning"></a>
			<input type="submit" value="Simpan" class="button small right green">
		</div>
	</div>
</form>

<?php
}
?>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>