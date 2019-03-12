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

$edit = "SELECT * FROM discount WHERE discount_id='$_GET[id]'";
$hasil = mysqli_query($konek, $edit);
$r = mysqli_fetch_array($hasil);

?>

<h2>Edit Discount</h2>
<!-- <form method= \"POST\" name=\"update_item.php\">
<input type=\"hidden\" name=\"id\" value-\"$r[item_id]\">
Judul : <input type=\"text\" name=\"nama\" value=\"$r[name]\">
Deskripsi : <textarea name=\"deskripsi\">$r[description]</textarea>
Harga : <input type=\"text\" name=\"harga\" value=\"$r[price]\">
Ganti Gambar : <input type=\"file\" name=\"fupload\">
<input type=\"submit\" value=\"Update\">
<input type=\"button\" value=\"Batal\">
</form>";
 -->

<!--  <form id="image-form" action="#" data-abide>
    <table width="100%">
    	<tr>
    		<td>Nama</td>
    		<td>
    			<div class="columns medium-6">
    				<input type="text" id="judulInput" placeholder="Judul" required>
            <small class="error">Nama harus diisi</small>
    			</div>
    		</td>
    	</tr>
    	<tr>
    		<td>Deskripsi</td>
    		<td>
    			<div class="columns medium-6">
    				<input type="text" id="informasiInput" placeholder="Informasi" required>
            <small class="error">Deskripsi harus diisi</small>
    			</div>
    		</td>
    	</tr>
      <tr>
        <td></td>
        <td>
          <div class="columns medium-6">
            <input id="mediaCapture" type="file" hidden accept="image/*,capture=camera">
            <small class="error">Gambar harus ditambah</small>
          </div>
        </td>
      </tr>
    </table>

    <div class="row">
      <div class="columns large-7 medium-12">
    	<input type="reset" value="Reset" class="button small right warning">
      <input type="submit" value="Tambah" class="button right small" style="margin-right:50px">
      <button id="submitImage" enabled type="submit" title="Add an image">
        Send
      </button>
</div>
</div
</form> -->

<form id="image-form" method="POST" action="module/mod_discount/update_discount.php" enctype="multipart/form-data" data-abide>
	<table width=100% cellpadding="8">
		<input type="hidden" name="id" value="<?php echo $r['discount_id']; ?>" required>
	<tr>
		<td>Nama</td>
		<td>
			<div class="columns medium-6">
			<input type="text" name="total" value="<?php echo $r['total']; ?>" required></td>
		</div>
	</tr>
    <tr>
    <td>Diskon</td>
    <td>
      <div class="columns medium-6">
      <input type="text" name="diskon" value="<?php echo $r['discount']; ?>" required></td>
    </div>
  </tr>
	</table>
	
    <div class="row">
    	<div class="columns large-7 medium-12">
    	<a href="hero.php?module=discount"><input type="button" value="Batal" class="button small right warning"></a>
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
