<?php
include "config/koneksi.php";

if (isset($_POST['username'])) {

$username = $_POST['username'];
$password = md5($_POST['password']);

// $query = "SELECT * FROM seller WHERE username = '$username' AND password = '$password'";
// $login = mysqli_query($konek, $query);
// $ketemu = mysqli_num_rows($login);
// $data = mysqli_fetch_array($login);

// $res = array(); 

// if($ketemu > 0){
// 	// session_start();

// 	// $_SESSION['namaadmin'] = $data['username'];
// 	// $_SESSION['passadmin'] = $data['password'];
// 	echo "Berhasil";
// 	while($row = mysqli_fetch_array($login)){
// 			 				array_push($res, array(
								

// 				 					"$seller_id" => $row['seller_id'],
// 				 					"$username" => $row['username'],
// 				 					"$email" => $row['email'],
// 				 					"$telephone" => $row['telephone'],
// 				 					"$city" => $row['city'])
// 			 				);

// 			 				// print $row['username'];
// 			 			}

// 			 			$rows['object_name'][] = $r;
// 			 			echo "Berhasil2";
			 				
// 			 			print json_encode($res);

// 	// header("location:hero.php?module=item");


// }else{
// 	echo "Login Gagal! Username dan Password tidak benar<br>";
// 	echo "<a href=\"form_login.php\">Ulangi Lagi</a>";
// }

// mysqli_close($konek);



	// $order_id = $_GET['orderId'];

			// $sql = "SELECT * FROM orders JOIN seller ON orders.seller_id_fk = seller.seller_id WHERE orders.order_id = $order_id";

			$sql = "SELECT * FROM seller WHERE username = '$username' AND password = '$password'";

 
 			//Getting result 
 			$result = mysqli_query($konek, $sql); 

			 // if ($result) {
			 // 	echo "Berhasil";
			 // }else{
			 // 	echo "Gagal";
			 // }
			 
			 //Adding results to an array 
			 $res = array(); 
			 
			 while($row = mysqli_fetch_array($result)){
 			// 	array_push($res, array(

 			// 		"seller_id" => $row['seller_id'],
				//  					"username" => $row['username'],
				//  					"email" => $row['email'],
				//  					"telephone" => $row['telephone'],
				//  					"city" => $row['city'])
 			// );

 				$seller = array(
							'seller_id'=>$row['seller_id'], 
							'username'=>$row['username'], 
							'email'=>$row['email'],
							'telephone'=>$row['telephone'],
							'city'=>$row['city']
						);

 					$response['error'] = false; 
 					$response['message'] = 'Login successfull'; 
 					$response['seller'] = $seller; 
 			}
			 // Displaying the array in json format 
 			echo json_encode($response);
			 // echo json_encode($res);
 	}
?>


