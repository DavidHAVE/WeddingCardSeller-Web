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

$edit = "SELECT * FROM seller WHERE seller_id='$_GET[id]'";
$hasil = mysqli_query($konek, $edit);
$r = mysqli_fetch_array($hasil);

?>

<h2>Edit Seller</h2>
<!-- <form method= \"POST\" name=\"update_seller.php"\">
<input type=\"hydden\" name=\"id\" value-\"$r[seller_id]\">
	Nama : <input type=\"text\" name= \"nama\" value=\"$r[useername]\">
	Email : <input type=\"text\" name=\"email\" value=\"$r[email]\">
    Sandi : <input type=\"text\" name=\"sandi\" value=\"$r[password]\">
	Jenis Kelamin : <input type=\"text\" name=\"kelamin\" value=\"$r[gender]\">
	Kota : <input type=\"text\" name=\"kota\" value=\"$r[city]\">

<input type=\"submit\" value=\"Update\">
<input type=\"button\" value=\"Batal\">
</form>"; -->


<form id="image-form" method="POST" action="module/mod_seller/update_seller.php" enctype="multipart/form-data" data-abide>
	<table width=100% cellpadding="8">
		<input type="hidden" name="id" value="<?php echo $r['seller_id']; ?>" required>
	<tr>
		<td>Nama</td>
		<td>
			<div class="columns medium-6">
			<input type="text" name="nama" value="<?php echo $r['username']; ?>" required></td>
			<small class="error">Username harus diisi</small>
		</div>
	</tr>
	<tr>
		<td>Sandi</td>
		<div class="columns medium-6">
		<td><input type="text" name="sandi" value="<?php echo $r['password']; ?>" required></td>
		<small class="error">Password harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Email</td>
		<div class="columns medium-6">
		<td><input type="text" name="email" value="<?php echo $r['email']; ?>" required></td>
		<small class="error">Email harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Telepon</td>
		<div class="columns medium-6">
		<td><input type="text" name="telepon" value="<?php echo $r['telephone']; ?>" required></td>
		<small class="error">Nomor telepon harus diisi</small>
	</div>
	</tr>
		<tr>
		<td>Kota</td>
		<div class="columns medium-6">
		<td><input type="text" name="kota" value="<?php echo $r['city']; ?>" required></td>
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
			<input type="submit" value="Ubah" class="button small right green">
		</div>
	</div>
</form>


<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>