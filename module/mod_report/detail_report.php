<html>
<head>
	<title>Wedding Card</title>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/foundation.css" />
  <script src="../../js/vendor/modernizr.js"></script>
</head>
<body>

<h2>Detail Laporan</h2>
<table>
<tr><th>No</th><th>Seller</th><th>Bulan</th><th>Total Pembeli</th><th>Pemasukan Bulanan<th>Total Pemasukan<th>Kota</th><th>Aksi</th></tr>

<?php
include "config/koneksi.php";

    $query = "SELECT report.report_id, report.income_total, report.month, report.month_buyer_amount, report.month_income, report.month_salary, seller.username, seller.city FROM report JOIN seller ON report.seller_id_fk = seller.seller_id WHERE report_id = '$_GET[report_id]'";

  $tampil = mysqli_query($konek, $query);
  $no = 1;
  while ($r=mysqli_fetch_array($tampil)){
    echo "<tr><td>$no</td>
    <td>$r[username]</td>
    <td>$r[month]</td>
    <td>$r[month_buyer_amount]</td>
    <td>$r[month_salary]</td>
    <td>$r[month_income]</td>
    <td>$r[city]</td>
    <td><a href=\"hero.php?module=hapus_report&report_id=$r[report_id]\">Hapus</a>
    </tr>";
    $no++;
  }

?>
</table>


<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>
