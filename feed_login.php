<?php
	include "config/koneksi.php";
				$username = $_POST['username'];
				$password = md5($_POST['password']); 

				// echo "'$username'";
				// echo "'$password'";


	 					// $seller_id;
	 					// $username;
	 					// $email;
	 					// $telephone;
	 					// $city;


				$sql = "SELECT username, password FROM seller WHERE username = '$username' AND password = '$password'";

				//Getting result 
	 			 	 

				$res = array(); 


	 			if ($result = mysqli_query($konek, $sql)) {
	 				if ($rows = mysqli_num_rows($result)> 0) {

	 					echo "'$rows'";

						//Adding results to an array 
						// $res = array(); 
						 
						// while($row = mysqli_fetch_array($result)){

						// echo "'$row[username]'";

	 					// $seller_id = $row['seller_id'];
	 					// $username = $row['username'];
	 					// $email = $row['email'];
	 					// $telephone = $row['telephone'];
	 					// $city = $row['city'];

	 					// 	$seller = array(
							// 	'seller_id'=>$row['seller_id'], 
							// 	'username'=>$row['username'], 
							// 	'email'=>$row['email'],
							// 	'telephone'=>$row['telephone'],
							// 	'city'=>$row['city']
							// );
	 					// }

	 							 
				 
						while($row = mysqli_fetch_array($result)){
			 				array_push($res, array(
								
				 					"$seller_id" => $row['seller_id'],
				 					"$username" => $row['username'],
				 					"$email" => $row['email'],
				 					"$telephone" => $row['telephone'],
				 					"$city" => $row['city'])
			 				);
			 			}
						 //Displaying the array in json format 
						 echo json_encode($res);

				 	}else{
				 		echo "Gagal";
				 	}
				 }
	 		// }
?>

