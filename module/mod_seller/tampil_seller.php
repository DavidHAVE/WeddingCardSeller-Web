<h2>Seller</h2>
<form method="POST" action="hero.php?module=form_seller">
	<input type="submit" value="Tambah Seller">
</form>
<table>
	<tr><th>No</th><th>Nama</th><th>Password</th><th>Email</th><th>Telepon</th><th>Kota</th><th>Aksi</th></tr>
	<?php
	include "config/koneksi.php";

	$query = "SELECT * FROM seller ORDER BY seller_id ASC";
	$tampil = mysqli_query($konek, $query);
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr><td>$no</td>
		<td>$r[username]</td>
		<td>$r[password]</td>
		<td>$r[email]</td>
		<td>$r[telephone]</td>
		<td>$r[city]</td>
		<td><img src='module/mod_seller/files/".$r['banner_url']."' width='100' height='100'></td>
		<td><a href=\"hero.php?module=edit_seller&id=$r[seller_id]\">Edit</a> |
		<a href=\"hero.php?module=hapus_seller&id=$r[seller_id]\">Hapus</a></td>
		</tr>";
		$no++;
	}
	?>
</table>