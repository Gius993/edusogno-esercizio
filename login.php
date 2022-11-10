<?php
require_once __DIR__ . '/config.php';



$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$nome = $conn->real_escape_string($_POST['nome']);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
if($_SERVER['REQUEST_METHOD'] === 'POST'){


	$sql = "SELECT * FROM utenti WHERE email = '$email'";

	if($result = $conn->query($sql)){
		if($result->num_rows == 1){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if(password_verify($password, $row['password'])){
				session_start();

				$_SESSION['loggato'] = true;
				$_SESSION['id'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['nome'] = $row['nome'];

				Header("location: privata.php");
			}else{
				echo 'password non corretta';
			}
		}else{
			echo 'non ci sono account con questa email';
		}
	}echo 'errore nel login';
}

?>