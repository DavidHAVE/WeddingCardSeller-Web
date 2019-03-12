<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Card House</title>
  <link rel="icon" href="img/logo.png"/>
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>
<body>

  <?php
session_start();
if(empty($_SESSION['namaadmin']) AND empty($_SESSION['passadmin'])){
  echo "Untuk masuk, Anda harus login dahulu. <br>";
  echo "<a href=\"/web/form_login.php\"><b>LOGIN</b></a>";
}
else{
?>

  <div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">

    <nav class="tab-bar show-for-small">
      <section class="tab-bar-section">
        <img src="" style="margin-left:50px">
      </section>
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon"
        href="#"><span></span></a>
      </section>
    </nav>

    <!-- top bar -->
  <div class="sticky">
  <nav class="top-bar hide-for-small" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a class="#">Card House</a></h1>
      </li>
      <!-- <li class="toggle-topbar menu-icon">
        <a href="#"><span>Menu</span></a>
      </li> -->
    </ul>
    <section class="top-bar-section">
      <ul class="right">
        <li class="active"><a href="logout.php">Logout</a></li>
      </ul>
      <ul class="right">
        <li><a href="hero.php?module=history">History</a></li>
      </ul>
    </section>
  </nav>
</div>

<aside class="left-off-canvas-menu">
  <ul class="off-canvas-list">
    <!-- style="background:#008CBA" -->
    <li><a href="hero.php?module=item"><img src="img/item_48.png">Item</a></li>
    <li><a href="hero.php?module=seller"><img src="img/seller_48.png">Seller</a></li>
    <li><a href="hero.php?module=monitor"><img src="img/monitor_48.png">Monitor</a></li>
    <li><a href="hero.php?module=discount"><img src="img/discount_48.png">Discount</a></li>
    <li><a href="hero.php?module=report"><img src="img/report_48.png">Report</a></li>
    <li><a href="hero.php?module=souvenir"><img src="img/souvenir_48.png">Souvenir</a></li>
    <li><a href="hero.php?module=addon"><img src="img/addon_48.png">Add On</a></li>
    <li><a href="hero.php?module=history"><img src="img/history_48.png">History</a></li>
	<li><a href="logout.php"><img src="img/out_50.png"> Log Out</a></li>
  </ul>
</aside>


<section class="main-section">
  <aside class="columns medium-3 large-2 hide-for-small"
  style="position:fixed; padding:0; height:100%">
  <!-- <div class="hide-for-small-only"> -->
  <div class="icon-bar three-up vertical">

    <a class="item" href="hero.php?module=item">
      <img src="img/item_48.png">
      <label>Item</label>
    </a>
	  <a class="item" href="hero.php?module=seller">
      <img src="img/seller_48.png">
      <label>Seller</label>
    </a>
     <a class="item" href="hero.php?module=monitor">
      <img src="img/monitor_48.png">
      <label>Monitor</label>
    </a>
     <a class="item" href="hero.php?module=discount">
      <img src="img/discount_48.png">
      <label>Discount</label>
    </a>
     <a class="item" href="hero.php?module=souvenir">
      <img src="img/souvenir_48.png">
      <label>Souvenir</label>
    </a>
    <a class="item" href="hero.php?module=report">
      <img src="img/report_48.png">
      <label>Report</label>
    </a>
     <a class="item" href="hero.php?module=addon">
      <img src="img/addon_48.png">
      <label>Add On</label>
    </a>
     <a class="item" href="hero.php?module=addon">
      <img src="img/history_48.png">
      <label>History</label>
    </a>
  </div>

</aside>

<content class="columns medium-9 medium-offset-3 large-10 large-offser-2">
  <div style="min-height:400px">

    <?php
      if($_GET['module']=='item'){
        include "module/mod_item/tampil_item.php";
      }elseif ($_GET['module']=='seller') {
        include "module/mod_seller/tampil_seller.php";
      }elseif ($_GET['module']=='monitor') {
        include "module/mod_monitor/tampil_monitor.php";
      }elseif ($_GET['module']=='discount') {
        include "module/mod_discount/tampil_discount.php";
      }elseif ($_GET['module']=='report') {
        include "module/mod_report/tampil_report.php";
      }elseif ($_GET['module']=='souvenir') {
        include "module/mod_souvenir/tampil_souvenir.php";
      }elseif ($_GET['module']=='addon') {
        include "module/mod_addon/tampil_addon.php";
      }elseif ($_GET['module']=='history') {
        include "module/mod_history/tampil_history.php";
      }

      elseif ($_GET['module']=='form_item') {
        include "module/mod_item/form_item.php";
      }elseif ($_GET['module']=='input_item') {
        include "module/mod_item/input_item.php";
      }elseif ($_GET['module']=='edit_item') {
        include "module/mod_item/edit_item.php";
      }elseif ($_GET['module']=='update_item') {
        include "module/mod_item/update_item.php";
      }elseif ($_GET['module']=='hapus_item') {
        include "module/mod_item/hapus_item.php";
      }
      elseif ($_GET['module']=='form_seller') {
        include "module/mod_seller/form_seller.php";
      }elseif ($_GET['module']=='input_seller') {
        include "module/mod_seller/input_seller.php";
      }elseif ($_GET['module']=='edit_seller') {
        include "module/mod_seller/edit_seller.php";
      }elseif ($_GET['module']=='update_seller') {
        include "module/mod_seller/update_seller.php";
      }elseif ($_GET['module']=='hapus_seller') {
        include "module/mod_seller/hapus_seller.php";
      }
      elseif ($_GET['module']=='detail_order') {
        include "module/mod_monitor/detail_order.php";
      }elseif ($_GET['module']=='hapus_transaksi') {
        include "module/mod_monitor/hapus_transaksi.php";
      }
       elseif ($_GET['module']=='form_discount') {
        include "module/mod_discount/form_discount.php";
      }elseif ($_GET['module']=='input_discount') {
        include "module/mod_discount/input_discount.php";
      }elseif ($_GET['module']=='edit_discount') {
        include "module/mod_discount/edit_discount.php";
      }elseif ($_GET['module']=='update_discount') {
        include "module/mod_discount/update_discount.php";
      }elseif ($_GET['module']=='hapus_discount') {
        include "module/mod_discount/hapus_discount.php";
      }
       elseif ($_GET['module']=='detail_report') {
        include "module/mod_report/detail_report.php";
      }elseif ($_GET['module']=='hapus_report') {
        include "module/mod_report/hapus_report.php";
      }
       elseif ($_GET['module']=='form_souvenir') {
        include "module/mod_souvenir/form_souvenir.php";
      }elseif ($_GET['module']=='input_souvenir') {
        include "module/mod_souvenir/input_souvenir.php";
      }elseif ($_GET['module']=='edit_souvenir') {
        include "module/mod_souvenir/edit_souvenir.php";
      }elseif ($_GET['module']=='update_souvenir') {
        include "module/mod_souvenir/update_souvenir.php";
      }elseif ($_GET['module']=='hapus_souvenir') {
        include "module/mod_souvenir/hapus_souvenir.php";
      }
      elseif ($_GET['module']=='form_addon') {
        include "module/mod_addon/form_addon.php";
      }elseif ($_GET['module']=='input_addon') {
        include "module/mod_addon/input_addon.php";
      }elseif ($_GET['module']=='edit_addon') {
        include "module/mod_addon/edit_addon.php";
      }elseif ($_GET['module']=='update_addon') {
        include "module/mod_addon/update_addon.php";
      }elseif ($_GET['module']=='hapus_addon') {
        include "module/mod_addon/hapus_addon.php";
      }
       elseif ($_GET['module']=='detail_history') {
        include "module/mod_history/detail_history.php";
      }elseif ($_GET['module']=='hapus_history') {
        include "module/mod_history/hapus_history.php";
      }
    ?>

  <!--   <div class="row" style="margin-top:20px">
    	<div class="columns large-12">
    		<h3><i class="fi-page-edit"></i>&nbsp; Tambah Pahlawan</h3>
    	</div>
    </div>

    <div class="row">
    <div class="columns large-12">

      <! <div id="messages">
        <span id="message-filler"></span>
      </div> 

      <! form
    <form id="image-form" action="#" data-abide>
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
      <! <input type="submit" value="Tambah" class="button right small" style="margin-right:50px">
      <button id="submitImage" enabled type="submit" title="Add an image">
        Send
      </button>
</div>
</div
    </form>
    </div>
    </div> -->

<!-- <table>
  <thead>
    <tr>
      <th>Nama</th>
      <th>Kalori</th>
      <th>Karbohidrat</th>
      <th>Protein</th>
      <th>Lemak</th>
      <th>Kualitas</th>
    </tr>
  </thead>
</table> -->

</div>
<div style="clear:both"></div>

<footer>
  <hr>
  <p align="center"></p>
</footer>
</content>

</section>
<a class="exit-off-canvas"></a>
</div>
</div>
<!-- </div> -->

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
