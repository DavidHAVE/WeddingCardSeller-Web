<h2>Laporan</h2>
<table>
	<tr><th>No</th><th>Seller</th><th>Total Pembeli</th><th>Total Pemasukan<th>Kota</th><th>Aksi</th></tr>
	<?php
	include "config/koneksi.php";

	// $query = "SELECT username, full_name_o, city, order_time, payment_completed FROM [order] JOIN seller
	// ON [order].seller_id_fk = seller.seller_id ORDER BY ASC";

	$query = "SELECT report.report_id, report.income_total, seller.username, seller.city, seller.buyer_amount FROM report JOIN seller ON report.seller_id_fk = seller.seller_id";

	$tampil = mysqli_query($konek, $query);
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr><td>$no</td>
		<td>$r[username]</td>
		<td>$r[buyer_amount]</td>
		<td>$r[income_total]</td>
		<td>$r[city]</td>
		<td><a href=\"hero.php?module=detail_report&report_id=$r[report_id]\">Detail</a>
		</tr>";
		$no++;
	}
	?>
</table>