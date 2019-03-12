<h2>Discount</h2>
<form method="POST" action="hero.php?module=form_discount">
	<input type="submit" value="Tambah Diskon">
</form>
<table>
	<tr><th>No</th><th>Total</th><th>Diskon</th><th>Aksi</th></tr>
	<?php
	include "config/koneksi.php";

	$query = "SELECT * FROM discount ORDER BY discount_id ASC";
	$tampil = mysqli_query($konek, $query);
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr><td>".$no."</td>";
		echo "<td>".$r['total']."</td>";
		echo "<td>".$r['discount']."%</td>";
		echo "<td><a href='hero.php?module=edit_discount&id=".$r['discount_id']."'>Edit</a> | "; 
		echo "<a href='hero.php?module=hapus_discount&id=".$r['discount_id']."'>Hapus</a></td>";

		echo "</tr>";
		$no++;
	}

	 // echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
	?>
</table>