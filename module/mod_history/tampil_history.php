<h2>Riwayat</h2>
<table>
	<tr><th>No</th><th>Penjual</th><th>Pembeli</th><th>Tanggal Order</th><th>Aksi</th></tr>
	<?php
	include "config/koneksi.php";

	// $query = "SELECT username, full_name_o, city, order_time, payment_completed FROM [order] JOIN seller
	// ON [order].seller_id_fk = seller.seller_id ORDER BY ASC";


	$query = "SELECT orders_history.order_history_id, orders_history.full_name_o, orders_history.order_time, seller.username FROM orders_history JOIN seller ON orders_history.seller_id_fk = seller.seller_id";

	// $query = "SELECT report.report_id, report.income_total, seller.username, seller.city, seller.buyer_amount FROM report JOIN seller ON report.seller_id_fk = seller.seller_id";

	$tampil = mysqli_query($konek, $query);
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr><td>$no</td>
		<td>$r[username]</td>
		<td>$r[full_name_o]</td>
		<td>$r[order_time]</td>
		<td><a href=\"hero.php?module=detail_report&report_id=$r[order_history_id]\">Detail</a>
		</tr>";
		$no++;
	}
	?>
</table>