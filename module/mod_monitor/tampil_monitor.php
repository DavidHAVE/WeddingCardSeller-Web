<h2>Seller</h2>
<table>
	<tr><th>No</th><th>Seller</th><th>Buyer</th><th>Kota</th><th>Tanggal dan Waktu</th><th>Status</th><th>Desain</th><th>Aksi</th></tr>
	<?php
	include "config/koneksi.php";

	// $query = "SELECT username, full_name_o, city, order_time, payment_completed FROM [order] JOIN seller
	// ON [order].seller_id_fk = seller.seller_id ORDER BY ASC";

	$query = "SELECT orders.order_id, orders.full_name_o, orders.order_time, orders.payment_completed, orders.order_time, orders.design_url, seller.username, seller.city FROM orders JOIN seller ON orders.seller_id_fk = seller.seller_id";

	$tampil = mysqli_query($konek, $query);
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr><td>$no</td>
		<td>$r[username]</td>
		<td>$r[full_name_o]</td>
		<td>$r[city]</td>
		<td>$r[order_time]</td>
		<td>$r[payment_completed]</td>
		<td><img src='module/mod_monitor/files/".$r['design_url']."' width='100' height='100'></td>
		<td><a href=\"hero.php?module=detail_order&order_id=$r[order_id]\">Detail</a> |
		<a href=\"hero.php?module=hapus_transaksi&order_id=$r[order_id]\">Hapus</a></td>
		</tr>";
		$no++;
	}
	?>
</table>