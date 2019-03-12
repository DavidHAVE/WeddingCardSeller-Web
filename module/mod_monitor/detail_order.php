<html>
<head>
	<title>Wedding Card</title>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/foundation.css" />
  <script src="../../js/vendor/modernizr.js"></script>
</head>
<body>

<?php
include "config/koneksi.php";

$edit = "SELECT * FROM orders JOIN seller
ON orders.seller_id_fk = seller.seller_id WHERE order_id='$_GET[order_id]'";

$hasil = mysqli_query($konek, $edit);
$r = mysqli_fetch_array($hasil);

  // $query = "SELECT username, full_name_o, city, order_time, payment_completed FROM [order] JOIN seller
  // ON [order].seller_id_fk = seller.seller_id ORDER BY ASC";

?>

<h2>Detail Order</h2>
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

<form id="image-form" method="POST" action="module/mod_monitor/update_order.php" enctype="multipart/form-data" data-abide>
	<table width=100% cellpadding="8">
		<input type="hidden" name="id" value="<?php echo $r['order_id']; ?>" required>
		<input type="hidden" name="foto" value="<?php echo $r['image_url']; ?>" required>
	<tr>
		<td>Nama Panjang Laki-laki</td>
		<td>
			<div class="columns medium-6">
			<input type="text" name="fullNameM" value="<?php echo $r['full_name_m']; ?>" required></td>
			<small class="error">Nama harus diisi</small>
		</div>
	</tr>
	<tr>
		<td>Nama Panggilan Laki-laki</td>
<div class="columns medium-6">
		<td><textarea name="nickNameM"><?php echo $r['nick_name_m']; ?></textarea></td>
</div>
	</tr>
    <tr>
    <td>Nama Ayah Laki-laki</td>
<div class="columns medium-6">
    <td><textarea name="fatherFullNameM"><?php echo $r['father_full_name_m']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Nama Ibu Laki-laki</td>
<div class="columns medium-6">
    <td><textarea name="motherNameM"><?php echo $r['mother_name_m']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Alamat Orang Laki-laki</td>
<div class="columns medium-6">
    <td><textarea name="parentAddressM"><?php echo $r['parent_address_m']; ?></textarea></td>
</div>
  </tr>
  <tr>
    <td>Nama Panjang Perempuan</td>
    <td>
      <div class="columns medium-6">
      <input type="text" name="fullNameW" value="<?php echo $r['full_name_w']; ?>" required></td>
      <small class="error">Nama harus diisi</small>
    </div>
  </tr>
  <tr>
    <td>Nama Panggilan Perempuan</td>
<div class="columns medium-6">
    <td><textarea name="nickNameW"><?php echo $r['nick_name_w']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Nama Ayah Prempuan</td>
<div class="columns medium-6">
    <td><textarea name="fatherFullNameW"><?php echo $r['father_full_name_w']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Nama Ibu Perempuan</td>
<div class="columns medium-6">
    <td><textarea name="motherNameW"><?php echo $r['mother_name_w']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Alamat Orang Tua Perempuan</td>
<div class="columns medium-6">
    <td><textarea name="parentAddressW"><?php echo $r['parent_address_w']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Hari dan Tanggal</td>
    <td>
      <div class="columns medium-6">
      <input type="text" name="dayAndDate" value="<?php echo $r['day_and_date']; ?>" required></td>
      <small class="error">Nama harus diisi</small>
    </div>
  </tr>
      <tr>
    <td>Jam/td>
<div class="columns medium-6">
    <td><textarea name="time"><?php echo $r['wedding_time']; ?></textarea></td>
</div>
  </tr>
  <tr>
    <td>Tempat</td>
<div class="columns medium-6">
    <td><textarea name="place"><?php echo $r['place']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Total Kartu Undangan</td>
<div class="columns medium-6">
    <td><textarea name="weddingCardQuantity"><?php echo $r['wedding_card_quantity']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Tanggal Pemesanan</td>
<div class="columns medium-6">
    <td><textarea name="orderTime"><?php echo $r['order_time']; ?></textarea></td>
</div>
  </tr>
   <tr>
    <td>Biaya Total</td>
<div class="columns medium-6">
    <td><textarea name="orderPrice"><?php echo $r['order_price']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Nama Panjang Pemesan</td>
    <td>
      <div class="columns medium-6">
      <input type="text" name="fullNameO" value="<?php echo $r['full_name_o']; ?>" required></td>
      <small class="error">Nama harus diisi</small>
    </div>
  </tr>
  <tr>
    <td>Nama Panggilan Pemesan</td>
<div class="columns medium-6">
    <td><textarea name="nickNameO"><?php echo $r['nick_name_o']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Email Pemesan</td>
<div class="columns medium-6">
    <td><textarea name="emailO"><?php echo $r['email_o']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Nomor Telepon Pemesan</td>
<div class="columns medium-6">
    <td><textarea name="telephoneO"><?php echo $r['telephone_o']; ?></textarea></td>
</div>
  </tr>
    <tr>
    <td>Penjual</td>
<div class="columns medium-6">
    <td><textarea name="username" disabled=""><?php echo $r['username']; ?></textarea></td>
</div>
  </tr>
      <tr>
    <td>Desain</td>
    <td>
      <div class="columns medium-6">
      <input type="file" name="fupload">
    </div>
    </td>
  </tr>
<!-- 	<tr>
		<td>Harga</td>
		<div class="columns medium-6">
		<td><input type="text" name="harga" value="<?php echo $r['price']; ?>" required></td>
		<small class="error">Harga harus diisi</small>
	</div>
	</tr> -->
	
<!-- 	<tr>
		<td>Foto</td>
		<td>
			<div class="columns medium-6">
			<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			<input type="file" name="fupload">
		</div>
		</td>
	</tr> -->
	</table>
	
	
    <div class="row">
    	<div class="columns large-7 medium-12">
    					<a href="hero.php?module=monitor"><input type="button" value="Batal" class="button small right warning"></a>
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
