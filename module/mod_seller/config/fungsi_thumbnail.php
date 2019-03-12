function Upload Image($fupload_name){
	
	$folder = "files/";

	$file_upload = $folder . $fupload_name;

	move_uploaded_file($_FILES["fupload"] ["tmp_name"], $file_upload);

	$gbr_asli = imagecreatefromjpeg($file_upload);
	$lebar = imageSX($gb_asli);
	$tinggi = imageSY($gb_asli);

	$thumb_lebar = 110
	$tgumb_tinggi = ($thumb_lebar/$lebar) * $tinggi;

	$gbr_thumb = imagecreatetruecolor($thumb_lebar, $thumb_tinggi);
	imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

	imagejpeg($gbr_thumb, $folder . "$thumb_" . $fupload_name);

	imagedestroy($gbr_asli);
	imagedestroy($gbr_thumb);
}