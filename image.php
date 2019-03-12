<?php 
	
	//Constants for database connection
	// define('DB_HOST','localhost');
	// define('DB_USER','root');
	// define('DB_PASS','');
	// define('DB_NAME','wedding card');

	include "config/koneksi.php";

	//We will upload files to this folder
	//So one thing don't forget, also create a folder named uploads inside your project folder i.e. MyApi folder
	// define('UPLOAD_PATH', 'uploads/');
	
	//connecting to database 
	// $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Unable to connect');
	

	//An array to display the response
	$response = array();

	//if the call is an api call 
	if(isset($_GET['apicall'])){
		
		//switching the api call 
		switch($_GET['apicall']){
			
			//if it is an upload call we will upload the image
			case 'uploadpic':
				
				//first confirming that we have the image and tags in the request parameter
				if(isset($_FILES['pic']['name'])){


					// $tags = $_POST['tags'];
					$lokasi_file = $_FILES['pic'] ['tmp_name'];



					$foto = $_FILES['pic']['name'];
					$tmp = $_FILES['pic']['tmp_name'];

					  
					// Rename nama fotonya dengan menambahkan tanggal dan jam upload
					$fotobaru = date('dmYHis').$foto;
					// Set path folder tempat menyimpan fotonya
					$path = "uploads/".$foto;
					// Proses upload
					// $root = getcwd();
					if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak


						$input = "INSERT INTO images(image) VALUES ('$foto')";

						$sql = mysqli_query($konek, $input);

						if ($sql) {
							$query = "SELECT * FROM images WHERE image = '$foto'";
							$tampil = mysqli_query($konek, $query);
							$r=mysqli_fetch_array($tampil);

							$image_id = $r['image_id'];

							if ($tampil) {
								$response['error'] = false; 
				 				$response['message'] = 'Read successfull'; 
				 				$response['image_id'] = $image_id; 
							}

						}else{
						// echo "Menyimpan di database gagal.";
								$response['error'] = true; 
				 				$response['message'] = 'Insert unsuccessfull'; 
						}
						}else{
							// echo "Gambar gagal diupload.";
								$response['error'] = true; 
				 				$response['message'] = 'Upload unsuccessfull'; 
						}
				}else{
					$response['error'] = true;
					$response['message'] = "Required params not available";
				}

				echo json_encode($response);
					
					//uploading file and storing it to database as well 
				// 	try{
				// 		move_uploaded_file($_FILES['pic']['tmp_name'], UPLOAD_PATH . $_FILES['pic']['name']);
				// 		$stmt = $conn->prepare("INSERT INTO images (image, tags) VALUES (?,?)");
				// 		$stmt->bind_param("ss", $_FILES['pic']['name'],$_POST['tags']);
				// 		if($stmt->execute()){


				// 				//query to get images from database
				// 				$stmt = $conn->prepare("SELECT image_id FROM images WHERE image = '$_FILES['pic']['name']'");
				// 				$stmt->execute();
				// 				$stmt->bind_result($image_id, $image, $tags);
								
				// 				$images = array();

				// 				//fetching all the images from database
				// 				//and pushing it to array 
				// 				while($stmt->fetch()){
				// 					$temp = array();
				// 					$temp['image_id'] = $image_id; 

				// 					array_push($images, $temp);
				// 				}
								
				// 				//pushing the array in response 
				// 				$response['error'] = false;
				// 				$response['images'] = $images; 


				// 			// $response['error'] = false;
				// 			$response['message'] = 'File uploaded successfully';
				// 		}else{
				// 			throw new Exception("Could not upload file");
				// 		}
				// 	}catch(Exception $e){
				// 		$response['error'] = true;
				// 		$response['message'] = 'Could not upload file';
				// 	}
					
				// }else{
				// 	$response['error'] = true;
				// 	$response['message'] = "Required params not available";
				// }
			
			break;
			
			//in this call we will fetch all the images 
			case 'getpics':
		

				//getting server ip for building image url 
				$server_ip = gethostbyname(gethostname());
									
					if (isset($_POST['imageId'])) {

						$image_id = $_POST['imageId'];

						$sql = "SELECT * FROM images WHERE image_id = '$image_id'";

			 
			 			//Getting result 
			 			$result = mysqli_query($konek, $sql); 

				
						 //Adding results to an array 
						 $res = array(); 

						 if ($result) {
						 
							 while($row = mysqli_fetch_array($result)){
				 			// 	array_push($res, array(

				 			// 		"seller_id" => $row['seller_id'],
								//  					"username" => $row['username'],
								//  					"email" => $row['email'],
								//  					"telephone" => $row['telephone'],
								//  					"city" => $row['city'])
				 			// );

				 				$image = array(
											'image_id'=>$row['image_id'],
											'image'=>$row['image']
										);

				 				$response['error'] = false; 
				 				$response['message'] = 'Read successfull'; 
				 				$response['image'] = $image; 
				 			}
				 		}else{
			 				$response['error'] = true; 
			 				$response['message'] = 'Read unsuccessfull'; 
			 			}
				 // Displaying the array in json format 
	 			// echo json_encode($response);
				 // echo json_encode($res);
	 				}
	 			


				//query to get images from database
				// $stmt = $conn->prepare("SELECT image_id, image, tags FROM images");
				// $stmt->execute();
				// $stmt->bind_result($image_id, $image, $tags);
				
				// $images = array();

				// //fetching all the images from database
				// //and pushing it to array 
				// while($stmt->fetch()){
				// 	$temp = array();
				// 	$temp['image_id'] = $image_id; 
				// 	$temp['image'] = 'http://' . $server_ip . '/MyApi/'. UPLOAD_PATH . $image; 
				// 	$temp['tags'] = $tags; 
					
				// 	array_push($images, $temp);
				// }
				
				// //pushing the array in response 
				// $response['error'] = false;
				// $response['images'] = $images; 
			break; 
			
			default: 
				$response['error'] = true;
				$response['message'] = 'Invalid api call';
		}
		
	}else{
		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}
	
	//displaying the response in json 
	header('Content-Type: application/json');
	echo json_encode($response);
	
?>