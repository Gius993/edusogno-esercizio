<?php
require_once __DIR__ . '/config.php';

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);



if($_SERVER["REQUEST_METHOD"] === "POST"){
	$sql_select = "SELECT * FROM utenti WHERE email = $email";
	if($result = $conn->query($sql_select)){
		if($result->num_rows == 1){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if(password_verify($password, $row['password'])){
				session_start();
				$_SESSION['loggato'] = true;
				$_SESSION['id'] = $row['id'];
				$_SESSION['email'] = $row['email'];

				Header('location: ./area-privata.php');

			}else{
				echo ' la password non corriponde';
			}
		}else{
			echo 'non ci sono account con questa email';
		}
	}else{
		echo 'errore in fase di login';
	}
	$conn->close();
}

?>
