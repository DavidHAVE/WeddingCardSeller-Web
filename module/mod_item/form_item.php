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
	echo "<a href=\"/web/form_login.php\"><b>LOGIN</b></a>";
}
else{
?>
	<h2>Tambah Item</h2>


<form id="image-form" method="POST" action="module/mod_item/input_item.php" enctype="multipart/form-data" data-abide>
	<table width=100% cellpadding="8">
<!-- 		<input type="hidden" name="id" value="<?php echo $r['item_id']; ?>" required>
		<input type="hidden" name="foto" value="<?php echo $r['image_url']; ?>" required> -->
	<tr>
		<td>Nama</td>
		<td>
			<div class="columns medium-6">
			<input type="text" name="nama" required></td>
			<small class="error">Nama harus diisi</small>
		</div>
	</tr>
	<tr>
		<td>Deskripsi</td>
	<div class="columns medium-6">
		<td><textarea name="deskripsi"></textarea></td>
	</div>
	</tr>
	<tr>
		<td>Harga</td>
		<div class="columns medium-6">
		<td><input type="text" name="harga" required></td>
		<small class="error">Harga harus diisi</small>
	</div>
	</tr>
	
	<tr>
		<td>Foto</td>
		<td>
			<div class="columns medium-6">
			<input type="file" name="fupload">
		</div>
		</td>
	</tr>
	</table>
	
	
    <div class="row">
    	<div class="columns large-7 medium-12">
    		<a href="hero.php?module=item"><input type="button" value="Batal" class="button small right warning"></a>
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
