<?php
function UploadImage($fupload_name){
	
	$folder = "files/";

	$file_upload = $folder . $fupload_name;

	// move_uploaded_file($_FILES["fupload"] ["tmp_name"], $file_upload);
	move_uploaded_file($fupload_name, $file_upload);

	$gbr_asli = imagecreatefromjpeg($file_upload);
	$lebar = imageSX($gbr_asli);
	$tinggi = imageSY($gbr_asli);

	$thumb_lebar = 110;
	$thumb_tinggi = ($thumb_lebar/$lebar) * $tinggi;

	$gbr_thumb = imagecreatetruecolor($thumb_lebar, $thumb_tinggi);
	imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

	imagejpeg($gbr_thumb, $folder . "$thumb_" . $fupload_name);

	imagedestroy($gbr_asli);
	imagedestroy($gbr_thumb);
}
?>