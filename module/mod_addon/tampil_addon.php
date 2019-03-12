<h2>Add On</h2>
<form method="POST" action="hero.php?module=form_addon">
	<input type="submit" value="Tambah Item">
</form>
<table>
	<tr><th>No</th><th>Gambar</th><th>Nama</th><th>Harga</th><th>Aksi</th></tr>
	<?php
	include "config/koneksi.php";

	$query = "SELECT * FROM addon ORDER BY addon_id ASC";
	$tampil = mysqli_query($konek, $query);
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr><td>".$no."</td>";
		echo "<td>".$r['name']."</td>";
		echo "<td>".$r['price']."</td>";
		echo "<td><a href='hero.php?module=edit_addon&id=".$r['addon_id']."'>Edit</a>"; 
		echo " | ";
		echo "<a href='hero.php?module=hapus_addon&id=".$r['addon_id']."'>Hapus</a></td>";
		echo "</tr>";
		$no++;
	}

	 // echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
	?>
</table>